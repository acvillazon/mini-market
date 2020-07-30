<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SaleModel');
		$this->load->model('ProductModel');
		$this->load->model('UsuarioModel');
		$this->load->library('session');
		$this->load->library('form_validation');
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

		$info['products']= $this->ProductModel->list(); /// return empty array on failure
		$info['users']= $this->UsuarioModel->list(); /// return empty array on failure

		$info['content'] = 'sale/index';
		$this->load->view('layouts/index', $info);
	}

	public function SalesValidation(){
		$validate['user_id']=['numeric','required'];
		$validate['product_id']=['numeric','required'];
		$validate['quantity_sales']=['numeric','required','min_length[1]'];
		$validate['total']=['numeric','required','min_length[1]'];

		return $validate;
	}


	public function store()
	{
		$this->form_validation->reset_validation();
		$sell = json_decode($this->input->post('sell'),true);

		$validate=$this->SalesValidation();
		$this->form_validation->set_rules('user_id','User',$validate['user_id']);
		$this->form_validation->set_rules('product_id','Type',$validate['product_id']);
		$this->form_validation->set_rules('quantity_sales','Price',$validate['quantity_sales']);
		$this->form_validation->set_rules('total','Total',$validate['total']);

		foreach ($sell as $key => $value) {
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'product_id' => $value['id_product'],
				'quantity_sales' => $value['quantity'],
				'total' => $value['total']
			);

			$this->form_validation->set_data($data);

			if(!$this->form_validation->run()){
				$this->setSession('Internal error, the sale was not made successfully','alert-danger');
				return 500;
			}else{
				try {
					foreach ($sell as $key => $value) {
						$this->SaleModel->insert_register($value);
					}
					
					$this->setSession('The sale was made successfully','alert-warning');
					return 200;
				} catch (Exception $e) {
					$this->setSession('The sale was not made successfully','alert-danger');
					return 500;
				}
			}
		}
	}
	
	public function statistics()
	{
		$info=$this->loadMessageSession();
		$info['content'] = 'sale/statistics';
		$this->load->view('layouts/index',$info);
	}
	
	public function average()
	{
		$avg_date = $this->SaleModel->average_date();
		$avg_total = $this->SaleModel->average_total();

		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
					'avg_date' => $avg_date,
					'avg_total' => $avg_total,
                    'text' => 'Data',
                    'type' => 'success'
            )));
	}

	public function selling(){

		$best_selling = $this->SaleModel->best_selling();

		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(array(
				'best_selling' => $best_selling,
				'text' => 'Data',
				'type' => 'success'
		)));
	}

	public function selling_income(){

		$best_selling_income = $this->SaleModel->best_selling_income();

		return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode(array(
				'best_selling_income' => $best_selling_income,
				'text' => 'Data',
				'type' => 'success'
		)));
	}
}
