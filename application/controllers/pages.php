<?php

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('test_model');
	}

	public function view($page = 'home'){
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')){
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('includes/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('includes/footer', $data);

		}

	public function homecredit(){
		$data['roles'] = $this->test_model->get_roles();

		$this->load->view('includes/header');
		$this->load->view('pages/about', $data);
		$this->load->view('includes/footer');
	}

	public function homecreditarg(){
		$data['role'] = $this->test_model->get_one(2);

		$this->load->view('includes/header');
		$this->load->view('pages/home', $data);
		$this->load->view('includes/footer');
	}
}