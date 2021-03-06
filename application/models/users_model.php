<?php
class Users_model extends CI_Model {
	
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
		$this->db->cache_on();
		$query = $this->db->get('SUBJECT');
		foreach ($query->result_array() as $k => $v) {
			$subjects[$k] = $v;
		}
		$this->db->cache_off();
		return $subjects;
		
	}
	
	public function check_duplicate_email($email){
		return ($query = $this->db->get_where('USER', array('sEmail' => $email))) ? $query->num_rows() : FALSE;
	}
	
	
	
	public function find_user($person){
		// A query to select user and their subject.
		$query = "select USER.*, SUBJECT.* from USER inner join USER_has_SUBJECT ON USER.idUSER = USER_has_SUBJECT.USER_idUser inner join SUBJECT on USER_has_SUBJECT.SUBJECT_idSUBJECT = SUBJECT.idSubject where USER.sEmail = '".$person['sEmail'];
		$query .=  "' AND USER.sPassword ='".$person['sPassword']."';";
		
		$logged_in_user = $this->db->query($query);
		
		// return user data or false if not exist
		return ($logged_in_user->num_rows() > 0) ? $logged_in_user->row_array() : FALSE;
		
	}
	
	public function users_count() {
        return $this->db->count_all("USER");
    }
	
	public function fetch_users($limit, $start) {
		$this->db->select("USER.*");
		$this->db->select("SUBJECT.*");
		$this->db->from("USER");
		$this->db->join('USER_has_SUBJECT', 'USER.idUSER = USER_has_SUBJECT.USER_idUSER', 'inner');
		$this->db->join('SUBJECT', 'SUBJECT.idSUBJECT = USER_has_SUBJECT.SUBJECT_idSUBJECT', 'inner');
		$this->db->where(array('ROLE_idROLE' => 1));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
}
?>