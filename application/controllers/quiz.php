<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

	
	public function index()
	{
		$data['heading'] = '';
		$data['showQuizNav'] = true;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/testtaker_start', $data);
		$this->load->view('pages/testtaker_quiz', $data);
		$this->load->view('pages/testtaker_finish', $data);
		$this->load->view('templates/footer', $data);
	
	}

	
}
