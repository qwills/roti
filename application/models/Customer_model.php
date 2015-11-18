<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public $cust_id;
	public $cust_name;
	public $cust_status;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	# get all customer data
	public function show_users(){
		$query = $this->db->get('customer');
		return $query;
	}

	# add a new user
	public function add($data){
		$this->db->insert('customer',array('cust_name'=>$data));	
	}

	# delete a user by id
	public function delete($data){
		$this->db->delete('customer',array('cust_id'=>$data));	
	}

	// public function add($name,$username,$email,$password){
	// 	$data = array(
	// 		'name'=>$name,
	// 		'username'=>$username,
	// 		'email'=>$email,
	// 		'password'=>$password,
	// 	);
	// 	$this->db->insert('user',$data);
	// }
}
