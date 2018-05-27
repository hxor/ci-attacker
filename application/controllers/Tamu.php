<?php
/**
 * Created by PhpStorm.
 * User: Kiddie
 * Date: 22/05/2018
 * Time: 23:31
 */

class Tamu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		echo '<p>Halaman Tamu.</p>';
		echo '<p>' . anchor('login', 'Login') . '</p>';
	}
}
