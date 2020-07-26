<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{	
	public function index()
	{
		$info['content'] = 'dashboard/index';
		$this->load->view('layouts/index', $info);
	}
}
