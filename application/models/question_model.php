<?php
class Question_model extends CI_Model {
	
	public function get_subjects()	
	{
		$data = array();
		$query = $this->db->get("SUBJECT");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
		
	}
	
	public function get_ques_by_sub($sub = '', $limit, $offset)
	{
		$data = array();
		$this->db->select('*');
		$this->db->from('QUESTION');
		$this->db->like('SUBJECT_idSUBJECT', $sub);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	public function add_question($question)
	{
		return ($this->db->insert('QUESTION', $question))?$this->db->insert_id():FALSE;
	}
	
	public function add_options($option)
	{
		return ($this->db->insert('OPTION', $option))?$this->db->insert_id():FALSE;
	}
}
?>