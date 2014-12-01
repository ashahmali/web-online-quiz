<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
        $this->load->model("users_model");
        $this->load->library("pagination");
	}

	
	public function index(){
		/*
		 * The aim of this section is for admin to manage users in way of activating their membership,
		 * The role id for the logged in user is checked to be sure it is admin role.
		 * Test takers are listed
		 */

		$data['title'] = ucfirst('User Management'); // Capitalize the first letter

		if ($this->session->userdata('ROLE_idROLE') == 2){
			$this->load->view('templates/header', $data);
			$data['heading'] = 'Users Management';
			
			$config = array();
			// sets the base url for pagination purpose
	        $config["base_url"] = base_url() . "admin/index";
			// sets the total number of items to the number of user in the database.
	        $config["total_rows"] = $this->users_model->users_count();
			// sets the number of items to be displauyed per page
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
			
			// $config['prev_link'] = "";
			// $config['prev_tag_open'] = '<a class="col-xs-2 text-center"><i class="fa fa-chevron-right">';
			// $config['prev_tag_close'] = '</i></a>';
// 			
			// $config['next_link'] = "";
			// $config['next_tag_open'] = '<a class="col-xs-2 text-center"><i class="fa fa-chevron-left">';
			// $config['next_tag_close'] = '</i></a>';
			
			
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$data["users"] = $this->users_model->fetch_users($config["per_page"], $page);
        	$data["links"] = $this->pagination->create_links();
			
			
				
			$this->load->view('pages/user_mang', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('users/def_page');
			
		}

	}

	public function questions(){
		$data['heading'] = 'Questions Management';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/modal', $data);
		
		$this->load->view('pages/admin_start', $data);
		$this->load->view('pages/admin_questions', $data);
		$this->load->view('pages/admin_question_new', $data);
		$this->load->view('pages/admin_finish', $data);
		$this->load->view('templates/footer', $data);
	}

	public function new_aswer(){
		if (isset($_POST) && isset($_POST['counter'])) {
            $counter = $_POST['counter'];
            $data['counter'] = $counter;
			$this->load->view('pages/admin_question_new_simple',$data);
        } 
       
	}

	public function quizzes(){
		$data['heading'] = 'Quizzes';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/modal', $data);
		
		$this->load->view('pages/admin_start', $data);
		$this->load->view('pages/admin_quizzes', $data);
		$this->load->view('pages/admin_quiz_new', $data);
		$this->load->view('pages/admin_finish', $data);
		$this->load->view('templates/footer', $data);
	}

	public function question_detail(){
		if (isset($_POST) && isset($_POST['id'])) {
            $question_id = $_POST['id'];
            //We need to get question details here

            //get statement

            //get answers

            $data['question_id'] = $question_id;
			$this->load->view('pages/admin_question_detail',$data);
        }
	}

	public function quiz_detail(){
		if (isset($_POST) && isset($_POST['id'])) {
            $quiz_id = $_POST['id'];
            //We need to get Quiz details here



            $data['quiz_id'] = $quiz_id;
			$this->load->view('pages/admin_quiz_detail',$data);
        }
	}
}
