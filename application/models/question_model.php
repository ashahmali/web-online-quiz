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
	
	public function add_test($test)	
	{
		return ($this->db->insert('TEST', $test))?$this->db->insert_id():FALSE;
	}
	
	public function add_test_sub_rship($test_sub_rel)	
	{
		return ($this->db->insert('TEST_has_SUBJECT', $test_sub_rel))?$this->db->insert_id():FALSE;
	}
	
	public function fetch_tests($sub='', $limit, $offset)
	{
		$data = array();
		$this->db->select('TEST.*');
		$this->db->select('SUBJECT.*');
		$this->db->from('TEST');
		$this->db->join('TEST_has_SUBJECT', 'TEST.idTEST = TEST_has_SUBJECT.TEST_idTEST', 'inner');
		$this->db->join('SUBJECT', 'TEST_has_SUBJECT.TEST_idTEST = SUBJECT.idSUBJECT', 'inner');
		$this->db->like('SUBJECT.idSUBJECT', $sub);
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
	
	public function tests_count()
	{
		return $this->db->count_all("TEST");
	}
	
	public function question_count()
	{
		return $this->db->count_all("QUESTION");
	}
}
?>