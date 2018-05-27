<?php

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper(['url', 'form']);
		$this->load->model('Login_model', 'login', true);
	}

	public function index()
	{
		if (!$_POST) {
			$input = (object) $this->login->getDefaultValues();
		} else {
			$input = (object) $this->input->post();
		}

		if (!$this->login->validate()) {
			$this->load->view('login/form', compact('input'));
			return;
		}

		if (!$this->login->run($input)) {
			$this->session->set_flashdata('error_message', 'Username atau Password salah!');
			redirect('login');
		} else {
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->login->logout();
		redirect('tamu');
	}

}
