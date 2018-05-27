<?php

class Admin extends CI_Controller {

	public function __construct()
	{
		header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	    $method = $_SERVER['REQUEST_METHOD'];
	    if($method == "OPTIONS") {
	        die();
	    }
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$login = $this->session->userdata('login');
		if (!$login) {
			redirect('login');
		}
	}

	public function index()
	{
		$name = $this->session->userdata('name');
		echo "<p> Selamat Datang <strong>$name</strong>, Anda sekarang berada di halaman Admin.</p>";
		echo anchor('logout', 'Logout');
	}

	public function profile()
	{
		$username = $this->session->userdata('username');
		if (!$_POST) {
			$data['user'] = $this->db->where('username', $username)
							->get('users')
							->row();
			$this->load->view('admin/profile', $data);
		} else {
			$input = (object) $this->input->post();
			$this->db->set('name', $input->name);
			$this->db->set('username', $input->username);
			$this->db->set('password', md5($input->password));
			$this->db->insert('users');
		}
	}

	public function test()
	{
		$input = (object) $this->input->post();
		$data = [
			'name' => $input->name,
			'username' => $input->username,
			'password' => md5($input->password)
		];

		$this->db->insert('users', $data);

	}

}
