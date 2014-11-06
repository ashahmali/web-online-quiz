<?php
class Test_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function get_roles($weight=1){
		if($weight = 1){
			$query = $this->db->get('role');
			return $query->result_array();
		}
	}

	public function get_one($arg){
		$query = $this->db->get_where('role', array('weight' => $arg));
		return $query->row_array();
	}
}