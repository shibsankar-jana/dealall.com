<?php

class Home_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	
	public function login($param){
		
		$query = $this->db->where("username", $param['username']);
		$query = $this->db->where("password", $param['password']);
		$query = $this->db->get("user");
		return $query;
	}
	
	
	 
	public function GetProduct(){
		
		$res = $this->db->query("select * from product limit 0, 6");
		return $res;
	}
	
	public function GetDatabylimit($param){
		
		$this->db->limit($param['limit'], $param['start']);
		$query = $this->db->get($param['table']);
		return $query;
	}
	
	public function GetData($table){
		
		$query = $this->db->get($table);
		return $query;
	}
	
	public function addData($table, $data){
		
		$res = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	
	public function editData($param, $data){
		
		$query = $this->db->where($param['field_name'], $param['field_value']);
		$this->db->update($param['table'], $data); 
		
		return $query;
	}
	
	public function GetDatabyId($param){
		
		$query = $this->db->where($param['field_name'], $param['field_value']);
		$query = $this->db->get($param['table']);
		
		return $query;
	}
	
	public function DeleteDatabyId($param){
		
		$query = $this->db->where($param['field_name'], $param['field_value']);
		$query = $this->db->delete($param['table']);
		return $query;
	}
	
}