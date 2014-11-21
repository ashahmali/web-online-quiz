<?php
class Users_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}
	
	public function register_user($details){
		return $this->db->insert('user', $details);
	}
	
}
?>