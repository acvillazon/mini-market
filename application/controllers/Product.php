<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->library('session');
	}

	/**
	 * Mecanismo para guardar los mensajes de alert, usando flashdata.
	*/
	public function setSession($message,$class='alert-info', $addToMessage=null){
		if($addToMessage){
			$addToMessage['message']=array();
			$addToMessage['class']=$class;
			array_push($addToMessage['message'],$message);
			$this->session->set_flashdata('message', $addToMessage);
		}else{
			$info['message']=array();
			$info['class']=$class;
			array_push($info['message'],$message);
			$this->session->set_flashdata('message', $info);
		}
	}

	/**
	 * Esta funcion se deberia llamar en todas los metodos que devulevan una view, así
	 * si existe algun mensaje de alert pendiente, será mostrado
	 */
	public function loadMessageSession(){
		$info['message']=array();

		if($this->session->flashdata('message')!=null){
			$data=$this->session->flashdata('message');

			if(isset($data['message'])){
				$info['class']=$data['class'];
				array_push($info['message'],$data['message']);
			}
		}

		return $info;
	}
	
	
	public function index()
	{
		$info = $this->loadMessageSession();

		$info['products'] = $this->ProductModel->list();
		
		if(count($info['products'])==0){
			$info['class']='alert-warning';
			if(isset($info['message'][0])){
				array_push($info['message'][0],'There are no products, the stock is empty'); 
			}else{
				array_push($info['message'],array('There are no products, the stock is empty')); 
			}
		}
				
		$info['content'] = 'product/index';
		$this->load->view('layouts/index', $info);
	}
	
	public function create()
	{
		$info = $this->loadMessageSession();

		$info['type_products'] = $this->ProductModel->getTypes();

		if(count($info['type_products'])==0){
			$info['class']='alert-warning';
			if(isset($info['message'][0])){
				array_push($info['message'][0],'There are no type of products registered'); 
			}else{
				array_push($info['message'],array('There are no type of products registered')); 
			}
		}

		$info['content'] = 'product/create';
		$this->load->view('layouts/index', $info);
	}
	
	public function store()
	{
		$response = $this->ProductModel->store_product();

		if(!is_array($response) && $response){
			$this->setSession('A new product was added','alert-success');
		}else{
			$this->setSession('Internal error, the product was not registered','alert-danger');
			redirect('/product/create');
		}

		redirect('/product/index');
	}
	
	public function edit($id=null)
	{
		if(!$id || !is_numeric($id)){
			$this->setSession('The parameter ID is required in the URL','alert-danger');
			redirect('/product');
		}

		$result = $this->ProductModel->getProduct($id);

		if(!$result){
			$this->setSession('ID invalid, the operation has been rejected','alert-danger');
			redirect('/product');
		}

		$info = $this->loadMessageSession();
		
		$info['type_products'] = $this->ProductModel->getTypes();
		$info['product']=$result;
		$info['content'] = '/product/edit';
		$this->load->view('layouts/index', $info);
	}
	
	public function update($id=null)
	{
		if(!$id || !is_numeric($id)){
			$this->setSession('The parameter ID is required in the URL','alert-danger');
			redirect('/product');
		}

		$result = $this->ProductModel->update_product($id);

		if(!$result || is_array($result)){
			$this->setSession('Internal error, The product with ID: '.$id.' was not updated','alert-danger');
			redirect('product/edit/'.$id);
		}

		$this->setSession('The product with ID: '.$id.' has been updated','alert-success');
		redirect('/product');
	}
	
	public function delete($id)
	{
		if(!$id || !is_numeric($id)){
			$this->setSession('The parameter ID is required in the URL','alert-danger');
			redirect('product');
		}

		$result = $this->ProductModel->delete_product($id);

		if(!$result || is_array($result)){
			$this->setSession('The product with ID: '.$id.' was not deleted','alert-danger');
		}else{
			$this->setSession('The product with ID: '.$id.' has been deleted','alert-warning');
		}

		redirect('/product');
	}

	////////////API
	public function getProducts()
	{
		$products = $this->ProductModel->list();

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'products' => $products,
                    'text' => 'Data',
                    'type' => 'success'
            )));
	}
	
	public function getProduct($id=null)
	{
		if(!$id){
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'error' => 'The ID is required for the operation',
                    'text' => 'Data',
                    'type' => 'success'
            )));
		}

		$product = $this->ProductModel->getProduct($id);

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'product' => $product,
                    'text' => 'Data',
                    'type' => 'success'
            )));
		
	}
	
	public function getTypes()
	{
		$types = $this->ProductModel->getTypes();

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'types' => $types,
                    'text' => 'Data',
                    'type' => 'success'
            )));
		
	}
	
	public function update_api()
	{
		$product =json_decode($this->input->post('product'));

		if((int)$product->id_product<=0){
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'types' => 'ID invalid',
                    'text' => 'Data',
                    'type' => 'success'
			)));
		}

		print_r($product);

		$result = $this->ProductModel->update_product_api($product);

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'types' => $result,
                    'text' => 'Data',
                    'type' => 'success'
            )));
	}

}
