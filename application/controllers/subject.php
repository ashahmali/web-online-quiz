<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

	
	public function index()
	{
		$data['title'] = ucfirst('Subject Management'); // Capitalize the first letter
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header', $data);
			$data['heading'] = 'Subjects Management';
			$this->load->view('pages/admin_start', $data);
			$this->load->view('pages/admin_subject_new', $data);
			$this->load->view('pages/admin_subjects', $data);
			$this->load->view('pages/admin_finish', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$this->load->view('templates/header', $data);
			//validate credentials

			//create and update user session

			//validate user role and load the proper profile view
			

			$this->load->view('templates/footer', $data);
			
		}

	}
}
