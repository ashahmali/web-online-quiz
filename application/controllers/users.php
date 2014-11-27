<?php

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('form_validation');
	}
	
	public function register(){
		$reg_errors =array(); //intializes an array for possible errors
		$data['title'] = ucfirst('register'); // Capitalize the first letter
		
		/**
		 * Validating user input
		 */
		 if($_POST){
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[50]|xss_clean');
			$this->form_validation->set_rules('family_name', 'Family Name', 'trim|required|max_length[50]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('password_confirm', 'Password', 'trim');
			$this->form_validation->set_rules('dd_register', 'Subject', 'trim|required');
			
			/**
			 * checking whether the confirm password field matches the password
			 */
			if ($this->input->post('password') !== $this->input->post('password_confirm')){
				$reg_errors[] = "Your passwords do not match";
			}
			
			if ($this->form_validation->run() == TRUE){
				$user_detail = array(
					'sFirstName' => $this->input->post('first_name'),
					'sSurname' => $this->input->post('family_name'),
					'sPassword' => $this->input->post('password'),
					'sEmail' => $this->input->post('email'),
					'ROLE_idROLE' => 1,
				);
			// grabs the value from the select subject list
			$user_subject = $this->input->post('dd_register');
			
			/**
			 * check the database to see if the user already exists
			 */
			 if($this->users_model->check_duplicate_email($user_detail['sEmail'])){
			 	$reg_errors[] = "This user appear to already exist in our database";
			 }
			
			// insert a record into the database.
			$id = $this->users_model->register_user($user_detail);
			
			/**
			 * check if a the record was succesfully insrted and update the subject
			 */
			 if ($id){
			 	if($this->users_model->add_user_subject($id, $user_subject)){
			 		// subject has been updated and now redirect to default page
			 		$data['title'] = ucfirst('Welcome');
			 		$this->load->view('templates/header', $data);
					$this->load->view('pages/def_page', $data);
					$this->load->view('templates/footer');
					exit();
			 	}else{
			 		// could not update user subject.
			 		// delete the inserted record
			 		$reg_errors[] = "A problem occurred, we could not update your subject.";
			 	}
			 }else{
			 	$reg_errors[] = "A problem occurred, we could not register you.";
			 }
			
		 	}
		 }
		
		/**
		 * Fetches subject option data from the DB
		 */
		$data['drop_option'] = $this->users_model->fetch_subject();
		
		/*
		 * loads the header, main page and and footer, passing data
		 * @argument $data.
		 */
		$data['reg_errors'] = $reg_errors;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/register', $data);
		$this->load->view('templates/footer');
		
		
		
		
	}
	
	public function login($user){
		// collect usr data
		
		// check for null character
		
		// load helper file
		
		// check if the user exists
		
		// log the user in
	}
	
	
}