<?php

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
	}
	
	public function register(){
		if($_POST){
			// perform validation on the data provided
			// send them to the the model, checking for true and then sending to the database.
		}else{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/register');
			$this->load->view('templates/footer');
		}
	}
	
	
}