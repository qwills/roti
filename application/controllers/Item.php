<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->model("item_model");
		$this->load->view('template/head');
	}

	public function index(){
		$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
		$this->load->view('item/index',$data);
		$this->load->view('template/foot');
	}

	# add a new item to database
	public function add(){
		$item_name = $this->input->post("item_name");
		$item_price1 = $this->input->post("item_price1");
		$item_price2 = $this->input->post("item_price2");
		if($item_name && $item_price1){
			$this->item_model->add($item_name, $item_price1, $item_price2);
		} else {
			show_404();
		}
	}

	# edit current item in database
	public function edit($name){
		$clean = $this->security->xss_clean($name); 
		if($clean){
			$data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
			$data['clean'] = $clean;
			$data['result'] = $this->item_model->get_name($clean)->row();
			$this->load->view('item/edit',$data);
			$this->load->view('template/foot');
		} else {
			show_404();
		}
	}

	# change item prices 
	public function change(){
		$i_name = $this->input->post('item_name');
		$item_price1 = $this->input->post('item_price1');
		$item_price2 = $this->input->post('item_price2');
		if($item_price1){
			if($item_price2){
				$this->item_model->price_update($item_price1,$item_price2,$i_name);				
			} else {
				$this->item_model->p1_update($item_price1,$i_name);	
			}
		} else {
			show_404();
		}
		
	}

	# delete selected item based on its name
	public function delete(){
		$name = $this->input->post('item_name');
		if($name){
			$this->item_model->delete($name);
		} else {
			show_404();
		}
	}
}