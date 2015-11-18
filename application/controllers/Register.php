<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->view('template/head');
	}

	public function index(){
		$this->load->helper('form');
		$this->load->view('register/index');
		$this->load->view('template/foot');
	}

	public function status(){
		$this->load->database();
		$this->load->model("user_model");
		$regis = array(
			"name" => $this->input->post("name"),
			"username" => $this->input->post("username"),
			"email" => $this->input->post("email"),
			"password" => $this->input->post("password"),
		);

		if($this->input->post()){
			$this->load->view('register/status');
			$this->user_model->add($regis);
			$this->load->view('template/foot');
		} else{
			show_404();
		}
	}
}
