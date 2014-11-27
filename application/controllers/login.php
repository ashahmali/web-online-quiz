<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{

		// if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		// {
		// 	// Whoops, we don't have a page for that!
		// 	show_404();
		// }

		$data['title'] = ucfirst('Login'); // Capitalize the first letter
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->load->library('session');

		if ($this->form_validation->run() == FALSE)
		{
			$data['showMenu'] = false;
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login', $data);
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
