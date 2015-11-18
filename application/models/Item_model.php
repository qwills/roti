<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

	public $item_name;
	public $item_price1;
	public $item_price2;
	private $active;
	private $create_time;

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	# get item name, price 1 and price 2
	public function show_items(){
		$this->db->select('item_name, item_price1, item_price2');
		return $this->db->get('item');
	}

	# get item_price1 and item_price2 based on item_name
	public function get_name($name){
		$sql = "SELECT item_price1,item_price2 FROM item WHERE item_name = ?";
		return $this->db->query($sql, array($name));
	}

	# add a row of item
	public function add($item_name,$item_price1,$item_price2){
		$data = array(
			'item_name'=>$item_name,
			'item_price1'=>$item_price1,
			'item_price2'=>$item_price2,
		);
		$this->db->insert('item',$data);
	}

	# delete a user by id
	public function delete($data){
		$this->db->delete('item',array('item_name'=>$data));	
	}

	# update only price 1
	public function p1_update($p1,$name){
		$sql = "UPDATE item SET item_price1 = ? WHERE item_name = ?";
		$this->db->query($sql, array($p1,$name));
	}

	# update both price
	public function price_update($p1,$p2,$name){
		$sql = "UPDATE item SET item_price1 = ?, item_price2 = ?  WHERE item_name = ?";
		$this->db->query($sql, array($p1,$p2,$name));
	}
}
