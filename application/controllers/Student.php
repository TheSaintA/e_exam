<?php 

class Student extends CI_Controller
{
    public function __construct(){
		parent::__construct();       
		if (!$this->session->userdata('student_id')) {
		 	return redirect(base_url(),'refresh');
		 } 
         $this->load->model('student_model','stb');
         $this->load->model('quizo_model','dtb');
		     $this->load->model('user_model','utb');
    }

    public function index(){
        $student = $this->stb->getDataById($_SESSION['student_id'],'student_tb');
        $paper_id = $this->stb->index($_SESSION['student_id']);
        $paper = $this->stb->getPaperName($paper_id);
        $this->load->view('user/exam_instructions',compact('student','paper'));
    }
    public function page($p){
    $this->load->view("user/$p");
    }
    public function stdToArray($obj){
      $reaged = (array)$obj;
      foreach($reaged as $key => &$field){
        if(is_object($field))$field = $this.stdToArray($field);
      }
      return $reaged;
    }
    public function paper($status){
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
            foreach($paper as $p){
              $duration = $p->end_time - $p->start_time;
     
      $_SESSION["duration"] = date('H:i:s', $duration);
      $_SESSION["start_time"] = date('H:i:s',$p->start_time);    
      $end_time = date("H:i:s", strtotime($_SESSION['start_time'])+strtotime($_SESSION['duration']));   
      $_SESSION['end_time'] = $end_time;
     
            }
            if($status == 'time_over'){
              $questions = FALSE;
            }else{
              $questions = $this->stb->getQuestions($paper_id,$new);
            }
        $configuration = $this->stb->getConfiguration($paper_id);
        $count_response = $this->stb->count_response_questions($paper_id,$_SESSION['student_id']);
        $student = $this->stb->getData('student_tb');

    if(!$questions){
      $result_data = array();
      $student_info = $this->dtb->getDataById($_SESSION['student_id'], 'student_tb');
      foreach($student_info as $studentt){
        $result_data['student_id'] = $_SESSION['student_id'];
        $result_data['student_name'] = $studentt->name;
        $result_data['enrollment_no'] = $studentt->enrollment_no;
        $result_data['paper_id'] = $studentt->paper_id;
      }
      $all_questions = $this->utb->getQuestions($studentt->paper_id);
      $responses = $this->utb->getResponse($studentt->paper_id,$_SESSION['student_id']);
      $correct = 0;
      
      $total = count($all_questions);
      $result_data['correct_answers'] = $this->utb->getCorrectQuestions($paper_id,$_SESSION['student_id']);
      $correct = $result_data['correct_answers'];
      $result_data['wrong_answers'] = $total - $correct;
      $result_data['percentage'] = ($correct > 0) ? $percentage = (($correct / $total) * 100) : $percentage = 0;
      $result_data['percentage'] =  number_format((float)$result_data['percentage'],2,'.','');
      
      if(!$this->utb->check_result($result_data['paper_id'],$_SESSION['student_id'])){
        $this->utb->insert_data($result_data,'result_tb');
      }
    }

        $this->load->view('user/paper_dash',compact('paper_id','configuration','questions','paper','count_questions','count_response','attempted_questions','student'));
    }
  
    public function nextQuestion(){
      if (!empty($this->input->post())) {
          $data = $this->input->post();
          $data['result'] = $this->stb->check_question($data['question_id'],$data['answer']);
              if ($this->stb->update_record($data)) {
              if ($this->stb->insert_data('response_tb',$data)) {
                return redirect(base_url('student/paper/exam'),'refresh');
                }
          }
      }else {
        $this->session->set_flashdata('success','Kindly check the inbox');
        return redirect(base_url('student/paper/exam'),'refresh');
      }
    }
}

 ?>