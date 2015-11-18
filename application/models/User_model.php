<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public $name;
	public $username;
	public $email;
	public $password;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function show_users(){
		$query = $this->db->get('user');
		return $query;
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

	public function add(array $data){
		$this->db->insert('user',$data);	
	}

}
