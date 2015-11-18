<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->view('template/head');
	}

	public function index(){
		$this->load->helper('form');
		$this->load->view('welcome/index');
		$this->load->view('template/foot');
	}

	public function home(){
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$this->load->view('welcome/home',$data);
		$this->load->view('template/foot');	
	}
}
