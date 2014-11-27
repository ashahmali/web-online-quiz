<?php
class Users_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}
	
	public function register_user($details){
		if($this->db->insert('USER', $details)){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
	}
	
	public function add_user_subject($id, $details){
		return ($this->db->insert('USER_has_SUBJECT', array('USER_idUSER' => $id, 'SUBJECT_idSUBJECT' => $details))) ? TRUE : FALSE; 
	}
	
	public function fetch_subject(){
		$subjects = array();
		$query = $this->db->get('SUBJECT');
		foreach ($query->result_array() as $k => $v) {
			$subjects[$k] = $v;
		}
		
		return $subjects;
		
	}
	
	public function check_duplicate_email($email){
		return ($query = $this->db->get('SUBJECT')) ? TRUE : FALSE;
	}
	
	
	
	public function user_exist($user){
		// select from data user
		
		// return whether the user exist
	}
	
}
?>