<?php

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
	}
	
	public function register(){
		$reg_errors =array(); //intializes an array for possible errors
		$data['title'] = ucfirst('register'); // Capitalize the first letter
		$data['showMenu'] = false;
		$id = 0;
		
		
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
					'sPassword' => $hash = $this->encrypt->sha1($this->input->post('password')),
					'sEmail' => $this->input->post('email'),
					'ROLE_idROLE' => 1,
				);
			// grabs the value from the select subject list
			$user_subject = $this->input->post('dd_register');
			
			//print_r($this->users_model->check_duplicate_email($user_detail['sEmail']));
			
			/**
			 * check the database to see if the user already exists
			 */
			 if($this->users_model->check_duplicate_email($user_detail['sEmail'])){
			 	$reg_errors[] = "This user appear to already exist in our database";
			 }
			
			// insert a record into the database.
			
			if(empty($reg_errors)){
				$id = $this->users_model->register_user($user_detail);
			}
			
			/**
			 * check if a the record was succesfully insrted and update the subject
			 */
			 if (!empty($id) || empty($reg_errors)){
			 	if($this->users_model->add_user_subject($id, $user_subject)){
			 		// subject has been updated and now redirect to default page
			 		$data['title'] = ucfirst('Welcome');
			 		$this->load->view('templates/header', $data);
					$this->load->view('pages/def_page', $data);
					$this->load->view('templates/footer');
					//exit();
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
		$this->output->enable_profiler(FALSE);	
		/*
		 * loads the header, main page and and footer, passing data
		 * @argument $data.
		 */
		$data['reg_errors'] = $reg_errors;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/register', $data);
		$this->load->view('templates/footer');
		
		
		
		
	}
	
	public function login(){
		$this->load->helper('user_helper');
		// setting the page title here
		$data['title'] = ucfirst("User Login");
		$person = array();
		$data['login_errors'] = "";
		
		
		if($_POST){
			// collect usr data
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			// check for null character
			if($this->form_validation->run() == TRUE){
				$person['sEmail'] = $this->input->post('email');
				$person['sPassword'] = $hash = $this->encrypt->sha1($this->input->post('password'));
				
				// check if the user exists
				$user_data = ($this->users_model->find_user($person)) ? $this->users_model->find_user($person) : FALSE;
				
				if($user_data){
					//print_r($user_data);
					// load helper file to log the user in
					$this->session->set_userdata($user_data);
					if ($this->session->userdata('ROLE_idROLE') == 1){
						redirect('users/def_page');
					}else{
						redirect('admin');
					}
				}else{
					$data['login_errors'] = "Wrong Email/Password Combination";
				}
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/login', $data);
		$this->load->view('templates/footer');
	}
	
	public function def_page(){
		$data['title'] = "User Page";
		$this->load->view('templates/header', $data);
		print_r($this->session->all_userdata());
		echo "you are";
		$this->load->view('templates/footer');
	}

	public function all(){
		$this->load->view('pages/admin_users');
	}

	public function detail(){

		//validate if user is a test taker
		$data['heading'] = 'Hello '. 'Eduardo';
		
		//load user details template
		$this->load->view('templates/header', $data);
		$this->load->view('pages/testtaker_start', $data);
		$this->load->view('pages/testtaker_detail', $data);
		$this->load->view('pages/testtaker_finish', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function home(){
		if ($this -> session -> userdata('ROLE_idROLE') == 2) {
			redirect('admin', 'refresh');
		}else{
			redirect('users/detail', 'refresh');
		}
	}
	
	/**
	 * logout function
	 */
	public function logout()
	{
		$user_data = array();
		$this->session->set_userdata($user_data);
		redirect('users/login');
	}
}