<?php
class Option_model extends CI_Model {

	public function getbyQuestion($question_id=""){
		$data = array();
		log_message('question_id', $question_id);
		if(isset($question_id) && $question_id != ""){
			$this->db->select('OPTION.idOPTION,OPTION.sDescription,bCorrectAnswer');
			$this->db->from('OPTION');
			$array = array('QUESTION_idQUESTION' => $question_id);
			$this->db->where($array); 
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
	            foreach ($query->result_array() as $row) {
	                $data[] = $row;
	            }
	        }
    	}
        return $data;
	}
	
}
?>