<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Api extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function ProductValidation(){
		$validate['name']=['alpha_numeric_spaces','required','min_length[2]','max_length[50]'];
		$validate['type_id']=['numeric','required','min_length[1]','callback_correct_type'];
		$validate['price']=['numeric','required','min_length[1]'];
		$validate['quantity']=['numeric','required','min_length[1]'];

		return $validate;
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

	////////////API
	public function getProducts()
	{
		$products = $this->ApiModel->list();

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

		$product = $this->ApiModel->getProduct($id);

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
		$types = $this->ApiModel->getTypes();

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
		$code=200;
		$product =json_decode($this->input->post('product'));

		$validate=$this->ProductValidation();
		$this->form_validation->set_rules('name','Name',$validate['name']);
		$this->form_validation->set_rules('type_id','Type',$validate['type_id']);
		$this->form_validation->set_rules('price','Price',$validate['price']);
		$this->form_validation->set_rules('quantity','Quantity',$validate['quantity']);

		$this->form_validation->set_value('price',$product->price);
		$this->form_validation->set_value('quantity',$product->quantity);
		$this->form_validation->set_value('type_id',$product->type_id);
		$this->form_validation->set_value('name_product',$product->name_product);

		if(!$this->form_validation->run()){
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
					'types' => 'Data invalid',
                    'text' => 'Data',
                    'type' => 'success'
			)));
		}

		if((int)$product->id_product<=0){
			return $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode(array(
					'types' => 'ID invalid',
                    'text' => 'Data',
                    'type' => 'success'
			)));
		}

		$result = $this->ApiModel->update_product_api($product);

		if(is_array($result) || !$result){
			$code=500;
		}

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header($code)
            ->set_output(json_encode(array(
					'types' => $result,
                    'text' => 'Data',
                    'type' => 'success'
            )));
	}
	
	public function create_api()
	{
		$code=200;
		$product =json_decode($this->input->post('product'));

		$validate=$this->ProductValidation();
		$this->form_validation->set_rules('name','Name',$validate['name']);
		$this->form_validation->set_rules('type_id','Type',$validate['type_id']);
		$this->form_validation->set_rules('price','Price',$validate['price']);
		$this->form_validation->set_rules('quantity','Quantity',$validate['quantity']);

		$this->form_validation->set_value('price',$product->price);
		$this->form_validation->set_value('quantity',$product->quantity);
		$this->form_validation->set_value('type_id',$product->type_id);
		$this->form_validation->set_value('name',$product->name);

		if(!$this->form_validation->run()){
			return $this->output
			->set_content_type('application/json')
			->set_status_header(500)
			->set_output(json_encode(array(
					'types' => 'Data invalid',
					'text' => 'Data',
					'type' => 'success'
			)));
		}

		$result = $this->ApiModel->create_product_api($product);

		if(is_array($result) || !$result){
			$code=500;
		}

		return $this->output
				->set_content_type('application/json')
				->set_status_header($code)
				->set_output(json_encode(array(
						'types' => $result,
						'text' => 'Data',
						'type' => 'success'
			)));

	}

}
