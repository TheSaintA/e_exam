<?php 

class Student_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($student_id){
    	$q = $this->db->where('id',$student_id)
    				  ->get('student_tb');
    	return $q->row()->paper_id;
    }
    public function getPaper($paper_id){
    	$q = $this->db->select('*')
    					->where('id',$paper_id)
    					->get('page_tb');
    	return $q->result();
    }
    public function getConfiguration($paper_id){
    	$q = $this->db->select('*')
    				  ->where('page_id',$paper_id)
    				  ->get('configuration_tb');
    	return $q->result();
    }
    public function getQuestions($paper_id,$attempted_questions){
                    $q = $this->db->select('*')
                      ->order_by('id','RANDOM')
                      ->where('page_id',$paper_id)
                      ->where_not_in('id',$attempted_questions)
                      ->limit(1)
                      ->get('question_bank_tb');
        return $q->result();

    }
    public function getAttemptedQuestions($paper_id,$student_id){
          $q = $this->db->select('question_id')
                        ->where(['student_id'=>$student_id,'paper_id'=>$paper_id])
                        ->get('record_tb');
        return $q->result();
    }
    public function getData($table){
        $q = $this->db->select('*')
                      ->get($table);
        return $q->result();
    }
    public function getDataById($id,$table){
        $q = $this->db->select('*')
                      ->where('id',$id)
                      ->get($table);
        return $q->result();
    }
    public function getPaperName($id){
     $q = $this->db->select('*')
                      ->where('id',$id)
                      ->get('page_tb');
        return $q->row()->page_name;   
    }
    public function update_record($data){
        unset($data['answer']);
        $q = $this->db->select('*')
                      ->where(['paper_id'=>$data['paper_id'],'question_id'=>$data['question_id'],'student_id'=>$data['student_id']])
                      ->get('record_tb');
        if ($q->num_rows()) {
            return FALSE;
        }else{
            return $this->db->insert('record_tb',$data);
        }
    }
    public function insert_data($table,$data){
        return $this->db->insert($table,$data);
    }
    public function check_question($question_id,$answer){
        $q = $this->db->where(['id' => $question_id, 'correct_answer' => $answer])
            ->get('question_bank_tb');
        if($q->num_rows()){
            $result = 'correct';
        }else{
            $result = 'wrong';
        }
        return $result;
    }
    public function count_questions($paper_id){
        return $this->db->where('page_id',$paper_id)
                        ->count_all_results('question_bank_tb');
    }
    public function count_response_questions($paper_id,$student_id){
        return $this->db->where(['paper_id'=>$paper_id,'student_id'=>$student_id])
                        ->count_all_results('record_tb');
    }
}


 ?>