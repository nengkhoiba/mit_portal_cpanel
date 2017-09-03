<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('main/login.php');
	}

	/* public function login(){
		$this->load->view('main/login.php');
	} */
	
	
}