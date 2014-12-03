<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
        $this->load->model("users_model");
		$this->load->model("question_model");
        $this->load->library("pagination");
	}

	public function index(){
		if ($this->session->userdata('ROLE_idROLE') == 2){
			$this->load->view('templates/header');
			$this->load->view('pages/admin_home');
			$this->load->view('templates/footer');
		} else {
			 log_message('error', 'you do not have permission to be here!');
		}
		
		
	}
	
	
	public function manage_users(){
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

	public function questions($sub = ""){
		
		if ($_POST) {
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('add_que', 'Question', 'required|xss_clean');
			$this->form_validation->set_rules('dd_add_que_sub', 'Subject', 'required');
			$this->form_validation->set_rules('answers', 'Answers', 'required');
			
			if($this->form_validation->run() == TRUE){
				$question['sQuestion'] = $this->input->post('add_que');
				$question['SUBJECT_idSUBJECT'] = $this->input->post('dd_add_que_sub');
				
				if($qid = $this->question_model->add_question($question)){
					$opt_no = $this->input->post('answers_counter');
					
					for ($i=1; $i<=$opt_no; $i++) { 
						$inp_fld = "answer_".$i."_hidden";
						$options = array(
							'QUESTION_idQUESTION'=> $qid,
							'bCorrectAnswer' => ($this->input->post('answers') === $this->input->post($inp_fld))?1:0,
							'sDescription' => $this->input->post($inp_fld),
						);
						
						echo ($this->question_model->add_options($options))?"Option $i Successfully Added":"Option $i could not Added";
					}
					
					
					$data['q_added'] = "Question Successfully added";
				}else{
					$data['q_added'] = "Question not succefully added";
				}
			}
			
		}
		
		$data["subjects"] = $this->question_model->get_subjects();
		
		$config = array();
			// sets the base url for pagination purpose
	    $config["base_url"] = base_url() . "admin/index";
			// sets the total number of items to the number of user in the database.
	    $config["total_rows"] = $this->users_model->users_count();
			// sets the number of items to be displauyed per page
	    $config["per_page"] = 20;
	    $config["uri_segment"] = 3;
		
	 	$this->pagination->initialize($config);
	 
	    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		
		
		$data['questions'] = $this->question_model->get_ques_by_sub($sub, $config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		
		
		
		
		$data['heading'] = 'Questions Management';
		$this->load->view('templates/header', $data);
		//$this->load->view('templates/modal', $data);
		
		//$this->load->view('pages/admin_start', $data);
		$this->load->view('pages/admin_questions', $data);
		$this->load->view('pages/admin_question_new', $data);
		//$this->load->view('pages/admin_finish', $data);

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
		//$this->load->view('templates/modal', $data);
		
		//$this->load->view('pages/admin_start', $data);
		$this->load->view('pages/admin_quizzes', $data);
		$this->load->view('pages/admin_quiz_new', $data);
		//$this->load->view('pages/admin_finish', $data);
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
