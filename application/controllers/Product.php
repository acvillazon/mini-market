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
		$this->load->library('form_validation');


		$validate = $this->ProductValidation();
		$this->form_validation->set_rules('name','Name',$validate['name']);
		$this->form_validation->set_rules('type_id','Type',$validate['type_id']);
		$this->form_validation->set_rules('price','Price',$validate['price']);
		$this->form_validation->set_rules('quantity','Quantity',$validate['quantity']);
	}

	public function ProductValidation(){
		$validate['name']=['alpha_numeric_spaces','required','min_length[2]','max_length[50]'];
		$validate['type_id']=['numeric','required','min_length[1]','callback_correct_type'];
		$validate['price']=['numeric','required','min_length[1]'];
		$validate['quantity']=['numeric','required','min_length[1]'];

		return $validate;
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

	public function correct_type($str)
	{
		if ((int)$str == -1)
		{
			$this->form_validation
				->set_message('correct_type', 'The Product type is invalid, please choose a type');
			return false;
		}
		return true;
	}
	
	public function store()
	{
		if(!$this->form_validation->run()){
			$info['type_products'] = $this->ProductModel->getTypes();
			$info['content'] = 'product/create';
			return $this->load->view('layouts/index', $info);
		}

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

		if(!$this->form_validation->run()){
			$info['type_products'] = $this->ProductModel->getTypes();
			$info['content'] = 'product/edit';
			return $this->load->view('layouts/index', $info);
		}
		
		$result = $this->ProductModel->update_product($id);

		if(!$result || is_array($result)){
			$this->setSession('Internal error, The product with ID: '.$id.' was not updated','alert-danger');
			redirect('product/edit');
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

		if($result[1]==0 || !$result[0]){
			$this->setSession('The product with ID: '.$id.' was not deleted','alert-danger');
		}else{
			$this->setSession('The product with ID: '.$id.' has been deleted','alert-warning');
		}

		redirect('/product');
	}
}
