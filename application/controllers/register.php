<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/register
	 *	- or -  
	 * 		http://example.com/index.php/register/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

	// public function view($page = 'register')
	public function index()
	{

		// if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		// {
		// 	// Whoops, we don't have a page for that!
		// 	show_404();
		// }

		$data['title'] = ucfirst('register'); // Capitalize the first letter
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			$data['showMenu'] = false;
			$this->load->view('templates/header', $data);
			
			//get available subjects 
			$dataDD['options'] = array('Algebra' => 1, 'Artificial Intelligence' => 2,'Web Development' => 3);
			$dataDD['default'] = 'Select a subject...';
			$dataDD['id'] = 'dd_register';
			
			//build drop down
			$ddhtml = $this->load->view('templates/dropdown',$dataDD, true);
			log_message('info', $ddhtml);
			$data['dd_subject'] = $ddhtml;

			$this->load->view('pages/register', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$this->load->view('templates/header', $data);
			$this->load->view('registrationsuccess');
			$this->load->view('templates/footer', $data);
			
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */