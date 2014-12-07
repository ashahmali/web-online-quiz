<?php
class Quiz_model extends CI_Model {
	
	var $idTEST = 0;
	var $sTestName =  '';
	var $iTime = 0;
	var $iQuestions = 0;
	var $iPassmark = 0;
	var $iRetake = 0;

	function __construct($subject="",$id="")
    {
        // Call the Model constructor
   //      parent::__construct();
   //      $data =	$this->getbySubjectandID($subject);

   

        
    }

	// public function fetch_tests($sub='', $limit, $offset)
	// {
	// 	$data = array();
	// 	$this->db->select('TEST.*');
	// 	$this->db->select('SUBJECT.*');
	// 	$this->db->from('TEST');
	// 	$this->db->join('TEST_has_SUBJECT', 'TEST.idTEST = TEST_has_SUBJECT.TEST_idTEST', 'inner');
	// 	$this->db->join('SUBJECT', 'TEST_has_SUBJECT.TEST_idTEST = SUBJECT.idSUBJECT', 'inner');
	// 	$this->db->like('SUBJECT.idSUBJECT', $sub);
	// 	$this->db->limit($limit, $offset);
	// 	$query = $this->db->get();
		
	// 	if ($query->num_rows() > 0) {
 //            foreach ($query->result_array() as $row) {
 //                $data[] = $row;
 //            }
 //            return $data;
 //        }
 //        return false;
	// }

	public function getbySubjectandID($subject="",$quiz_id=""){
		$data = array();
		log_message('subject', $subject);
		log_message('quiz_id', $quiz_id);
		if(isset($subject) && $subject != "" &&
			isset($quiz_id) && $quiz_id != ""){
				$this->db->select('TEST.*');
				$this->db->from('TEST');
				$this->db->join('TEST_has_SUBJECT', 'TEST.idTEST = TEST_has_SUBJECT.TEST_idTEST', 'inner');
				$this->db->join('SUBJECT', 'TEST_has_SUBJECT.SUBJECT_idSUBJECT = SUBJECT.idSUBJECT', 'inner');
				$array = array('SUBJECT.idSUBJECT' => $subject, 'TEST.idTEST' => $quiz_id);

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

	public function prepareData($data){
		$output = null;
		if(isset($data)){
			if(is_array($data) && !empty($data)){
				foreach ($variable as $element) {
					$output[] = $this->prepareData($element);
				}
				
			}else if(is_object($data)){
				$output['idTEST'] = $data['idTEST'];
				$output['sTestName'] =  $data['sTestName'];
				$output['iTime'] = $data['iTime'];
				$output['iQuestions'] = $data['iQuestions'];
				$output['iPassmark'] = $data['iPassmark'];
				$output['iRetake'] = $data['iRetake'];
			}
		}
		return $output;
	}
	
	public function startQuiz($idTest,$idUser){

		if(isset($idTest) && isset($idUser)){
			$date = date("Y-m-d H:i:s");
			$this->db->set('TEST_idTEST', $idTest); 
			$this->db->set('USER_idUSER', $idUser); 
			$this->db->set('dTestDate', $date);//date('Y-m-d', strtotime($when)));
			
			$this->db->insert('TEST_has_USER'); 
		}
	}

	public function updateTime($idTest,$idUser,$timestamp){
		
		//$this->db->set('stopTime', $timestamp); 
		$data = array('stopTime' => $timestamp);

		$this->db->where('TEST_idTEST', $idTest); 
		$this->db->where('USER_idUSER', $idUser); 
		$this->db->update('TEST_has_USER', $data); 
	}

	//get quiz detail
	public function quizDetail($quizID){
		$data = array();
		$this->db->select('*');
		$this->db->from('TEST');
		$whereClause = array("idTEST" => $quizID);
		$this->db->where($whereClause);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;  
	}

	public function saveUserAnswer($idTest,$idUser,$questionId,$answerId){
		if(isset($idTest) && isset($idUser) && isset($questionId) && isset($answerId)){
			$date = date("Y-m-d H:i:s");
			$this->db->set('QUESTION_idQUESTION', $questionId ); 
			$this->db->set('TEST_has_USER_TEST_idTEST', $idTest); 
			$this->db->set('TEST_has_USER_USER_idUSER', $idUser); 
			$this->db->set('TEST_has_USER_dTestDate', $date); 
			$this->db->set('OPTION_idOPTION', $answerId);
			
			$this->db->insert('TEST_has_QUESTION'); 
		}


	}

	public function evaluateQuiz($idTest,$idUser,$correctAnswers,$wrongAnswers,$grade,$timestamp){
		
		//$this->db->set('stopTime', $timestamp); 
		$data = array('iGrade' => $grade,
					'iCorrect' => $correctAnswers,
					'iIncorrect' => $wrongAnswers);

		$this->db->where('TEST_idTEST', $idTest); 
		$this->db->where('USER_idUSER', $idUser); 
		$this->db->where('dTestDate', $timestamp); 

		$this->db->update('TEST_has_USER', $data); 
	}
}
?>