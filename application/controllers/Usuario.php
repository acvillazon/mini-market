<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuarioModel');
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
		$info= $this->loadMessageSession();

		$info['users'] = $this->UsuarioModel->list();

		if(count($info['users'])==0){
			$info['class']='alert-warning';
			if(isset($info['message'][0])){
				array_push($info['message'][0],'There are no users registered'); 
			}else{
				array_push($info['message'],array('There are no users registered')); 
			}
		}
		
		$info['content'] = 'usuario/index';
		$this->load->view('layouts/index', $info);
	}
	
	public function show($id=null)
	{
		if(!$id || !is_numeric($id)){
			redirect('/usuario');
		}

		$user = $this->UsuarioModel->user($id);
		
		if(!$user){
			$this->setSession("Internal error, it was not possible getting the user's data","alert-danger");
			redirect('/usuario');			
		}else{
			$info['content'] = 'usuario/show';
			$info['user'] = $user;
			$this->load->view('layouts/index', $info);
		}		
	}

	public function create()
	{
		$info = $this->loadMessageSession();
		$info['content'] = 'usuario/create';
		$this->load->view('layouts/index', $info);
	}
	
	public function store()
	{		
		$response = $this->UsuarioModel->store_user();

		if(!is_array($response) && $response){
			$this->setSession('A new user was added','alert-success');
		}else{

			if($response==false){
				$this->setSession('The user was not saved, an internal error happened','alert-danger');
			} elseif($response['code'] == 1062){
				$this->setSession('Email has already been used','alert-warning');
			}

			redirect('/usuario/create');
		}

		redirect('/usuario');
	}
	
	public function edit($id=null)
	{
		if(!$id || !is_numeric($id)){
			$this->setSession('The parameter ID is required in the URL','alert-danger');
			redirect('/usuario');
		}

		$response = $this->UsuarioModel->user($id);

		if(is_array($response) || !$response){
			$this->setSession('Internal error, ID invalid, the operation has been rejected','alert-danger');
			redirect('/usuario');
		}

		$info =$this->loadMessageSession();
		$info['content'] = 'usuario/edit';
		$info['user'] = $response;
		$this->load->view('layouts/index', $info);
	}
	
	public function update($id=null)
	{
		if(!$id || !is_numeric($id)){
			$this->setSession('The parameter ID is required in the URL','alert-danger');
			redirect('/usuario');
		}

		$response = $this->UsuarioModel->edit_user($id);

		if(!is_array($response) && $response){
			$this->setSession('The user was updated successfully','alert-success');
		}else{
			if($response['code'] == 1062){
				$this->setSession('Email has already been used','alert-danger');
			} elseif($response==false ){
				$this->setSession('The user was not updated, an internal error happened','alert-danger');
			}

			redirect('/usuario/edit/'.$id);
		}

		redirect('/usuario');
	}

	public function delete($id=null)
	{
		if(!$id || !is_numeric($id)){
			$this->setSession('The parameter ID is required in the URL','alert-danger');
			redirect('/usuario');
		}

		$response = $this->UsuarioModel->delete_user($id);

		if(!$response || is_array($response)){
			$this->setSession('The user with ID: '.$id.' was not deleted','alert-danger');
		}else{
			$this->setSession('The user with ID: '.$id.' has been deleted','alert-warning');
		}

		redirect('/usuario');
	}
}
