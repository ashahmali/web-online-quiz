<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model("users_model");
		$this -> load -> model("question_model");
		$this -> load -> library("pagination");
		
	}

	public function index() {
		$this->checkSession();
		if ($this -> session -> userdata('ROLE_idROLE') == 2) {
			$this -> load -> view('templates/header');
			$this -> load -> view('pages/admin_home');
			$this -> load -> view('templates/footer',$this->dataCustom);
		} else {
			log_message('error', 'you do not have permission to be here!');
		}

	}

	public function manage_users() {
		/*
		 * The aim of this section is for admin to manage users in way of activating their membership,
		 * The role id for the logged in user is checked to be sure it is admin role.
		 * Test takers are listed
		 */

		$data['title'] = ucfirst('User Management');
		// Capitalize the first letter
		$this->checkSession();
		if ($this -> session -> userdata('ROLE_idROLE') == 2) {
			$this -> load -> view('templates/header', $data);
			$data['heading'] = 'Users Management';

			$config = array();
			// sets the base url for pagination purpose
			$config["base_url"] = base_url() . "admin/index";
			// sets the total number of items to the number of user in the database.
			$config["total_rows"] = $this -> users_model -> users_count();
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

			$this -> pagination -> initialize($config);

			$page = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;

			$data["users"] = $this -> users_model -> fetch_users($config["per_page"], $page);
			$data["links"] = $this -> pagination -> create_links();

			$this -> load -> view('pages/user_mang', $data);
			$this -> load -> view('templates/footer',$this->dataCustom);
		} else {
			redirect('users/def_page');

		}

	}

	public function questions($sub = "") {

		$this->checkSession();
		if ($_POST) {
			
			$this -> load -> library('form_validation');

			$this -> form_validation -> set_rules('add_que', 'Question', 'required|xss_clean');
			$this -> form_validation -> set_rules('dd_add_que_sub', 'Subject', 'required');
			$this -> form_validation -> set_rules('answers', 'Answers', 'required');

			if ($this -> form_validation -> run() == TRUE) {
				$question['sQuestion'] = $this -> input -> post('add_que');
				$question['SUBJECT_idSUBJECT'] = $this -> input -> post('dd_add_que_sub');

				if ($qid = $this -> question_model -> add_question($question)) {
					$opt_no = $this -> input -> post('answers_counter');

					for ($i = 1; $i <= $opt_no; $i++) {
						$inp_fld = "answer_" . $i . "_hidden";
						$options = array('QUESTION_idQUESTION' => $qid, 'bCorrectAnswer' => ($this -> input -> post('answers') === $this -> input -> post($inp_fld)) ? 1 : 0, 'sDescription' => $this -> input -> post($inp_fld), );

						echo($this -> question_model -> add_options($options)) ? "Option $i Successfully Added" : "Option $i could not Added";
					}

					$data['q_added'] = "Question Successfully added";
				} else {
					$data['q_added'] = "Question not succefully added";
				}
			}

		}

		$data["subjects"] = $this -> question_model -> get_subjects();

		$config = array();
		// sets the base url for pagination purpose
		$config["base_url"] = base_url() . "admin/questions";
		// sets the total number of items to the number of user in the database.
		$config["total_rows"] = $this -> question_model -> question_count();
		// sets the number of items to be displauyed per page
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this -> pagination -> initialize($config);

		$page = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;

		$data['questions'] = $this -> question_model -> get_ques_by_sub($sub, $config["per_page"], $page);
		$data["links"] = $this -> pagination -> create_links();

		$data['heading'] = 'Questions Management';
		$this -> load -> view('templates/header', $data);
		//$this->load->view('templates/modal', $data);

		//$this->load->view('pages/admin_start', $data);
		$this -> load -> view('pages/admin_questions', $data);
		$this -> load -> view('pages/admin_question_new', $data);
		//$this->load->view('pages/admin_finish', $data);

		$this -> load -> view('templates/footer', $this->dataCustom);
	}

	public function new_aswer() {
		if (isset($_POST) && isset($_POST['counter'])) {
			$this->checkSession();
			$counter = $_POST['counter'];
			$data['counter'] = $counter;
			$this -> load -> view('pages/admin_question_new_simple', $data);
		}

	}

	public function quizzes() {
		$this->checkSession();
		if ($_POST) {
			/**
			 * set validation rules for the question form.
			 */
			$this -> form_validation -> set_rules('qq_name', 'Quiz Name', 'required|xss_clean');
			$this -> form_validation -> set_rules('dd_subject_questions', 'Subject', 'required|integer');
			$this -> form_validation -> set_rules('qq_time', 'Time', 'required|integer');
			$this -> form_validation -> set_rules('qq_no_ques', 'No. of Question', 'required|xss_clean|integer');
			$this -> form_validation -> set_rules('qq_passmark', 'Passmark', 'required|integer');
			$this -> form_validation -> set_rules('qq_retake', 'No. of Retake', 'required|integer');
			
			/**
			 * checks if any of the vlidation rule has be violated.
			 * passes the field values to an array, if validation test is passed.
			 */
			if ($this -> form_validation -> run() == TRUE) {
				$test = array('sTestName' => $this -> input -> post('qq_name'), 'iTime' => $this -> input -> post('qq_time'), 'iQuestions' => $this -> input -> post('qq_no_ques'), 'iPassmark' => $this -> input -> post('qq_passmark'), 'iRetake' => $this -> input -> post('qq_passmark'), );
				
				// fetches the id of the just added test..
				$test_id = ($id = $this -> question_model -> add_test($test)) ? $id : '';
				
				//adds the relationship between between subject and test.
				if ($test_id) {
					$test_sub_rel = array('TEST_idTEST' => $test_id, 'SUBJECT_idSUBJECT' => $this -> input -> post('dd_subject_questions'), );
					if ($this -> question_model -> add_test_sub_rship($test_sub_rel)) {
						$data['add_test_feedback'] = "Successfuly Added";
					}
				}

			}
		}

		/*
		 * Fetches subjects from the db and lists them in a paginated view
		 */
		$data["subjects"] = $this -> question_model -> get_subjects();

		$config = array();
		// sets the base url for pagination purpose
		$config["base_url"] = base_url() . "admin/quizzes";
		// sets the total number of items to the number of user in the database.
		$config["total_rows"] = $this -> question_model -> tests_count();
		// sets the number of items to be displauyed per page
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this -> pagination -> initialize($config);

		$page = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;

		$data['tests'] = $this -> question_model -> fetch_tests($sub = '', $config["per_page"], $page);
		$data["links"] = $this -> pagination -> create_links();

		$data['heading'] = 'Quizzes';
		$this -> load -> view('templates/header', $data);
		//$this->load->view('templates/modal', $data);

		//$this->load->view('pages/admin_start', $data);
		$this -> load -> view('pages/admin_quizzes', $data);
		$this -> load -> view('pages/admin_quiz_new', $data);
		//$this->load->view('pages/admin_finish', $data);
		$this -> load -> view('templates/footer', $this->dataCustom);
	}

	public function question_detail() {
		if (isset($_POST) && isset($_POST['id'])) {
			$this->checkSession();
			$question_id = $_POST['id'];

			//We need to get question details here
			$this->load->model('question_model');
			$questionData = $this -> question_model -> questionDetail($question_id);

			$data['questionData'] = $questionData;
			$this -> load -> view('pages/admin_question_detail', $data);
		}
	}
	
	public function add_subject()
	{
		
		$this->checkSession();
		if (isset($_POST)){
			
			$this->form_validation->set_rules('add_subject', 'Subject Field', 'required|xss_clean');
			
			if ($this -> form_validation -> run() == TRUE) {
				$sub = array('sName' => $this->input->post('add_subject'),);
				
				if($this->question_model->add_subject($sub)){
					$data['add_sub_fb'] = "Subject Successfully added";
				}else{
					$data['add_sub_fb'] = "Subject Could not be added";
				}
			}
		}
		$data['subjects'] = ($this->question_model->get_subjects())?$this->question_model->get_subjects():array();
		$data['heading'] = 'Add Subject';
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/add_subject', $data);
		$this -> load -> view('templates/footer',$this->dataCustom);
	}

	public function quiz_detail() {
		if (isset($_POST) && isset($_POST['id'])) {
			$this->checkSession();
			$quiz_id = $_POST['id'];
			//We need to get Quiz details here
			$this->load->model('quiz_model');
			$quizData = $this -> quiz_model -> quizDetail($quiz_id);

			if(isset($quizData) && count($quizData) > 0){
				$data['quizData'] = $quizData[0];
				$this -> load -> view('pages/admin_quiz_detail', $data);
			}
		}	
	}

	private function checkSession(){
		if ($this -> session -> userdata('ROLE_idROLE') == 2) {
			$this->dataCustom['showAdminMenu'] = true;
		}else{
			$this->dataCustom['showAdminMenu'] = false;
		}
	}

}
