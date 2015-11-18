<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model("customer_model");
		$this->load->view('template/head');
	}

	public function index(){
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$this->load->view('customer/index',$data);
		$this->load->view('template/foot');
	}

	public function check(){
		$name = $this->input->post("name");
		if($name){
			$this->customer_model->add($name);
		} else {
			show_404();
		}
	}

	public function show(){
		$q = $this->customer_model->show_users();

		foreach ($q->result() as $row)
		{
		        echo $row->customer_name."<br>";
		}
	}

	public function delete(){
		$id = $this->input->post('cust_id');
		if($id){
			$this->customer_model->delete($id);
		} else {
			show_404();
		}
	}
}
