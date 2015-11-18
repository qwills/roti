<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("item_model");
		$this->load->view('template/head');
	}

	public function index(){
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$this->load->view('invoice/index',$data);
		$this->load->view('template/foot');
	}

	public function add(){
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$data['items'] = array();
		$q = $this->item_model->show_items();
		foreach ($q->result() as $row){

		}
		$this->load->view('invoice/add',$data);
		$this->load->view('template/foot');	
	}

	public function test(){
		$q = $this->item_model->show_items();
		$data['res'] = $q->result_array();
		$this->load->view('invoice/test',$data); 
	}
}