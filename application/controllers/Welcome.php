<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('template/head');
		$this->load->view('welcome/index');
		$this->load->view('template/foot');
	}
}
