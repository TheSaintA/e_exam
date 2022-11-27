<?php 

class Student extends CI_Controller
{
    public function __construct(){
		parent::__construct();       
		if (!$this->session->userdata('student_id')) {
		 	return redirect(base_url(),'refresh');
		 } 
         $this->load->model('student_model','stb');
    }

    public function index(){
        $student = $this->stb->getDataById($_SESSION['student_id'],'student_tb');
        $paper_id = $this->stb->index($_SESSION['student_id']);
        $paper = $this->stb->getPaperName($paper_id);
        $this->load->view('user/exam_instructions',compact('student','paper'));
    }
    public function stdToArray($obj){
      $reaged = (array)$obj;
      foreach($reaged as $key => &$field){
        if(is_object($field))$field = stdToArray($field);
      }
      return $reaged;
    }
    public function paper(){
        $array = array();
        $new[] = '';
        $paper_id = $this->stb->index($_SESSION['student_id']);
        $paper = $this->stb->getPaper($paper_id);
        $count_questions = $this->stb->count_questions($paper_id);
        $attempted_questions = $this->stb->getAttemptedQuestions($paper_id,$_SESSION['student_id']);
            foreach($attempted_questions as $attempted){
                $array[] = $this->stdToArray($attempted);
            }
            foreach($array as $k=>$v) {
                $new[$k] = $v['question_id'];
            }
        $questions = $this->stb->getQuestions($paper_id,$new);
        $configuration = $this->stb->getConfiguration($paper_id);
        $count_response = $this->stb->count_response_questions($paper_id,$_SESSION['student_id']);
        $student = $this->stb->getData('student_tb');
        $this->load->view('user/paper_dash',compact('paper_id','configuration','questions','paper','count_questions','count_response','attempted_questions','student'));
    }
    public function nextQuestion(){
      if (!empty($this->input->post())) {
          $data = $this->input->post();
          $paper_id = $data['paper_id'];
          if ($this->stb->update_record($data)) {
              if ($this->stb->insert_data('response_tb',$data)) {
                return redirect(base_url('student/paper'),'refresh');
                // $array = array();
                //     $paper = $this->stb->getPaper($paper_id);
                //     $attempted_questions = $this->stb->getAttemptedQuestions($paper_id,$_SESSION['student_id']);
                //     foreach($attempted_questions as $attempted){
                //         $array[] = $this->stdToArray($attempted);
                //     }
                //     foreach($array as $k=>$v) {
                //         $new[$k] = $v['question_id'];
                //     }
                //     $questions = $this->stb->getQuestions($paper_id,$new);
                //     // $questions = $this->stb->getQuestions($paper_id,$_SESSION['student_id'],$attempted_questions);
                //     $configuration = $this->stb->getConfiguration($paper_id);    
                //     $count_questions = $this->stb->count_questions($paper_id);
                //     $count_response = $this->stb->count_response_questions($paper_id,$_SESSION['student_id']);
                //     $student = $this->stb->getData('student_tb');
                //     $this->load->view('user/paper_dash',compact('paper_id','configuration','questions','paper','count_questions','count_response','attempted_questions','student'));      
              }
          }
      }else {
        $this->session->set_flashdata('success','Kindly check the inbox');
        return redirect(base_url('student/paper'),'refresh');
      }
    }
}

 ?>