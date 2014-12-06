<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

	
	public function showQuiz($subject = "",$quiz_id = "")
	{
		$data['heading'] = '';
		$data['showMenu'] = false;
		if(isset($subject) && $subject != "" &&
			isset($quiz_id) && $quiz_id != ""){
			
			log_message('subject', $subject);
			log_message('quiz_id', $quiz_id);
			$CI =& get_instance();
         	$CI->load->model('question_model');
         	$CI->load->model('quiz_model');
			$quizData = $CI->quiz_model->getbySubjectandID($subject,$quiz_id);

			//log_message('quizData[0]',$quizData[0]);
			//get quiz info
			if(!empty($quizData) && count($quizData) > 0){
	   			// $quiz->idTEST = $data[0]['idTEST'];
				// $quiz->sTestName =  $data[0]['sTestName'];
				// $quiz->iTime = $data[0]['iTime'];
				$quiz['iQuestions'] = $quizData[0]['iQuestions'];
				// $quiz->iPassmark = $data[0]['iPassmark'];
				// $quiz->iRetake = $data[0]['iRetake'];
	        }

	        //get quiz questions
	        if(isset($quiz)){
	        	
	        	$CI->load->model('question_model');
	        	$CI->load->model('option_model');
				$questionsModel = $CI->question_model;//->get_ques_by_sub($subject,,0);
				$questions = $questionsModel->get_ques_by_sub($subject,$quiz['iQuestions'],0);
				log_message('questions', $questions);

				//get quiz answers
				$data['questions'] = array();
				foreach ($questions as $question) {
					$options = $CI->option_model->getbyQuestion($question['idQUESTION']);
					$newQuestion['id'] = $question['idQUESTION'];
					$newQuestion['statement'] = $question['sQuestion'];
					$newQuestion['options'] = array();
					foreach ($options as $opt) {
						$newOption['id'] = $opt['idOPTION']; 
						$newOption['description'] = $opt['sDescription'];
						array_push($newQuestion['options'], $newOption);
					}
					array_push($data['questions'], $newQuestion);
				}

				//var_dump($data['questions']);
				$idUser = $this->session->userdata('idUSER');
				$this->session->set_userdata('TEST_idTEST',$quiz_id);
				$date = new DateTime();
				$this->session->set_userdata('dTestDate',$date);
				$this->load->model('quiz_model');
				$this->quiz_model->startQuiz($quiz_id,$idUser);
				$data['showQuizNav'] = true;
				$data['questionsCount'] = $quiz['iQuestions'];
				$sessionArray = $this->session->userdata('answers');
				$data['answers'] = $sessionArray;
				$data['timer'] =  $this->calculateRemainingTimer($quizData[0]['iTime']);
			}
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/testtaker_start', $data);
			if(isset($quiz)){
				$this->load->view('pages/testtaker_quiz', $data);
			}else{
				$this->load->view('pages/testtaker_quiz_error');
			}
			$this->load->view('pages/testtaker_finish', $data);

		
		}
		else{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/testtaker_start', $data);
			$this->load->view('pages/testtaker_quiz_error', $data);
			$this->load->view('pages/testtaker_finish', $data);
		}
		$this->load->view('templates/footer', $data);
	
	}

	public function timer(){
		if(isset($_POST['duration'])){
			// $values = array();
			// $idTest = $this->session->userdata('TEST_idTEST');
			// $idUser = $this->session->userdata('idUSER');
			$this->session->set_userdata('timer',$_POST['duration']);
			// if(isset($idTest) && isset($idUser)){
			// 	$date = new DateTime();
			// 	$timestamp = $date->getTimestamp(); 
			// 	//$this->load->model('quiz_model');
			// 	//$this->quiz_model->updateTime($idTest,$idUser,$timestamp);
			// 	//$values["start"] = "";
			// 	//$values["end"] = $timestamp;
			// }
		}
		//return json_encode($values);
	}

	public function evaluate(){
		
	}

	public function save_answer($value = ''){
		
		if(isset($value) || isset($_POST['newAnswer'])){

			$objective = (isset($value) && $value != '') ? $value : $_POST['newAnswer'];
			//split value
			$pieces = explode('_',$objective);
			
			if(isset($pieces) && count($pieces) > 1)
			{
				$question = $pieces[0];
				$answer = $pieces[1];
				//uppdate associateive aaray in the session
				$sessionArray = $this->session->userdata('answers');
				if(isset($sessionArray) && $sessionArray){
					$sessionArray[$question] = $answer;
				}else{
					$sessionArray = array();
					$sessionArray[$question] = $answer;
				}
				//var_dump($sessionArray);
				log_message('answers',$sessionArray);
				$this->session->set_userdata('answers',$sessionArray);
			}

		}
	}


	private function calculateRemainingTimer($originalTime){
		$remainingTime = $originalTime * 60 * 1000;
		$time = $this->session->userdata('timer');
		if (isset($time) && $time != "") {
			$remainingTime = $time;
		}
		return $remainingTime;
	}
}
