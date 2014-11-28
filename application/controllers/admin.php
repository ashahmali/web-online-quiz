<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	
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
			$this->load->view('templates/header', $data);
			$data['heading'] = 'Users Management';
			$this->load->view('pages/admin_start', $data);
			$this->load->view('pages/admin_users', $data);
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
