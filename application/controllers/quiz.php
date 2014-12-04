<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

	
	public function index()
	{
		$data['heading'] = '';
		$data['showQuizNav'] = true;
		$data['showMenu'] = false;
		$data['questions'] = array(
				'Question 1' => array('Answer 1 Question 1','Answer 2 Question 1','Answer 3 Question 1'),
				'Question 2' => array('Answer 1 Question 2','Answer 2 Question 2','Answer 3 Question 2'),
				'Question 3' => array('Answer 1 Question 3','Answer 2 Question 3','Answer 3 Question 3')
			);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/testtaker_start', $data);
		$this->load->view('pages/testtaker_quiz', $data);
		$this->load->view('pages/testtaker_finish', $data);
		$this->load->view('templates/footer', $data);
	
	}

	
}
