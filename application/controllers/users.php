<?php

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
	}
	
	public function register(){
		echo "i amhere";
		$data['title'] = 'Register';
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/register');
		$this->load->view('templates/footer');

	}
	
	
}