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
