<?php 


class User_model extends CI_Model
{
	
	public function index($email){
		$q = $this->db->select('*')
					  ->where('email',$email)
					  ->get('page_tb');
		return $q->result();
	}
	function insert_user($data,$tb_name) {
		$this->db->insert_batch($tb_name, $data);
	}
	public function getData($table){
		$q = $this->db->select('*')
			->get($table);
		return $q->result();
	}
public function get_user_id(){
		$q = $this->db->where('email', $_SESSION['email'])
						->get('user_tb');
		return $q->row()->id;
}
	public function getQuestions($page_id){
		$q = $this->db->select('*')
					  ->where_in('page_id',$page_id)
					  ->get('question_bank_tb');
		return $q->result();
	}
	public function getPaperName($page_id){
		$q = $this->db->select('*')
					  ->where_in('id',$page_id)
					  ->get('page_tb');
		return $q->row()->page_name;
	}
	public function getPaperId($page_id){
		$q = $this->db->select('*')
					  ->where_in('id',$page_id)
					  ->get('page_tb');
		return $q->row()->id;
	}
	public function count_students($paper_id){
		return $this->db->where('paper_id', $paper_id)
			->count_all_results('student_tb');
	}
	public function count_live_papers($email){
		return $this->db->where(['email'=>$email,'set_unset'=>'1'])
			->count_all_results('page_tb');
	}
	public function getSubjects($email){
		$q = $this->db->where('email', $email)
			->get('page_tb');
		return $q->result();
	}
	public function count_responses($user_id){
		$query = $this->db->query("SELECT DISTINCT student_id FROM response_tb WHERE user_id = $user_id ");
		$result = $query->result_array();
		return count($result);
	}
	public function count_paper_responses(){
		$query = $this->db->query("SELECT DISTINCT student_id,paper_id FROM response_tb");
		$result = $query->result_array();
		return $result;
	}
	public function insert_data($data,$table){
		return $this->db->insert($table,$data);
	}
	public function update_page($data,$id){
		return $this->db->where('id',$id)
						->update('page_tb',$data);
	}
	public function updateById($data,$id,$tb_name){
		
		return $this->db->where('id',$id)
						->update($tb_name,$data);
	}
	public function deleteById($id,$table){
		return $this->db->where('id',$id)
						->delete($table);
	}
	public function delete_questions($id){
		return $this->db->where('page_id',$id)
						->delete('question_bank_tb');
	}
	public function set_theme($data,$id){
		$q = $this->db->select('*')
					  ->where('page_id',$id)
					  ->get('configuration_tb');
		if($q->num_rows()){
			return $this->db->where('page_id',$id)
							->set('theme',$data['theme'])
							->update('configuration_tb',$data);
		}else{
			return FALSE;
		}
	}
	public function getCorrectQuestions($paper_id,$student_id){
		return $this->db->where(['paper_id' => $paper_id, 'student_id' => $student_id,'result'=>'correct'])
			->count_all_results('response_tb');
		
	}
	public function getSimilarData($page, $student){
		$q = $this->db->query("SELECT id FROM question_bank_tb where page_id = $page UNION select question_id from response_tb where student_id=$student");
		return $q->result();
	}
	public function getDataByEmail($tb_name, $email){
		$q = $this->db->where('email', $email)
			->get($tb_name);
		return $q->result();
	}
	public function getPapers($email){
		$q = $this->db->select('*')
					  ->where('email',$email)
					  ->get('page_tb');
		return $q->result();
	}
	public function getGrading($paper_selected){
		$q = $this->db->select('*')
					  ->where('page_id',$paper_selected)
					  ->get('grading_tb');
		return $q->result();
	}
	public function getCount($id,$table){
		 return $this->db->where('paper_id',$id)
		 				 ->count_all_results($table);
	}
	public function getCount_by_id($id,$table){
		return $this->db->where('id',$id)
						 ->count_all_results($table);
   }
   public function getCount_by_email($email,$table){
	return $this->db->where('email',$email)
					 ->count_all_results($table);
}
public function getCount_by_paper($page_id,$table){
	return $this->db->where('page_id',$page_id)
					 ->count_all_results($table);
}
	public function getDataByPagination($tb_name,$id,$limit, $start){
		$q = $this->db->select('*')
					->limit($limit,$start)
					  ->where('paper_id',$id)
					  ->get($tb_name);
		return $q->result();
	}
	public function getDataByPagination_by_email($tb_name,$email,$limit, $start){
		$q = $this->db->select('*')
					->limit($limit,$start)
					  ->where('email',$email)
					  ->get($tb_name);
		return $q->result();
	}
	public function getDataByPagination_by_paper($tb_name,$page_id,$limit, $start){
		$q = $this->db->select('*')
					->limit($limit,$start)
					  ->where('page_id',$page_id)
					  ->get($tb_name);
		return $q->result();
	}
	public function update_dept_data($data,$email){
		return $this->db->where('email', $email)
			->update('school_info_tb',$data);
	}
	public function getDataById($id,$tb_name){
		$q = $this->db->select('*')
					  ->where('paper_id',$id)
					  ->get($tb_name);
		return $q->result();
	}
	public function getDataByIdd($id,$tb_name){
		$q = $this->db->select('*')
					  ->where('id',$id)
					  ->get($tb_name);
		return $q->result();
	}
	public function set_status($student_id,$status){
		return $this->db->where('id',$student_id)
						->set('block_unblock_status',$status)
						->update('student_tb');
	}
	public function student_exists($enrollment_no,$paper_id){
		$q = $this->db->where(['enrollment_no'=>$enrollment_no,'paper_id'=>$paper_id])
						->get('student_tb');
		return $q->result();
	}
	public function getConfig($paper_selected){
		$q = $this->db->where('page_id',$paper_selected)
					  ->get('configuration_tb');
		return $q->result();
	}
	public function getStudents($paper_id){
		$q = $this->db->where('paper_id',$paper_id)
					  ->get('student_tb');
		return $q->result();
	}
	public function set_paper_status($paper_id,$status){
		return $this->db->where('id',$paper_id)
						->set('set_unset',$status)
						->update('page_tb');
	}
	public function getExcelData($paper_id,$table){
		$q = $this->db->where('paper_id',$paper_id)
					  ->get($table);
		return $q->result();
	}
	public function getStudentExcelData($paper_id,$student_id){
		$q = $this->db->where(['paper_id'=>$paper_id,'student_id'=>$student_id])
					  ->get('result_tb');
		return $q->result();
	}
	public function get_result_of_students($paper_id){
		$q = $this->db->where('paper_id',$paper_id)
				      ->get('result_tb');
			return $q->result();
	}
	public function getResponse($paper_id,$student_id){
		$q = $this->db->select('*')
			->where(['paper_id' => $paper_id, 'student_id' => $student_id])
			->get('response_tb');
		return $q->result();
	}
	public function getResponses($paper_id,$student_id){
		$q = $this->db->select('*')
			->where_in(['paper_id' => $paper_id, 'student_id' => $student_id])
			->get('response_tb');
		return $q->result();
	}
	public function getPaper($email){
		$q = $this->db->where('email',$email)
						->select('id')
						->get('page_tb');
		return $q->result();
	}
	public function getStudents_info($paper_id){
		$q = $this->db->select('*')
			->where_in('paper_id', $paper_id)
			->get('student_tb');
		return $q->result(); 
	}
	public function update_results($email){
		$paper_id_array = array();
		$i=0;
		$q = $this->db->where('email',$email)
						->select('id')
						->get('page_tb');
		foreach($q->result() as $ids){
			$paper_id_array[$i++] = $ids->id;
		}
		$paper_id_array;
		$w = $this->db->select('*')
			->where_in('paper_id', $paper_id_array)
			->get('student_tb');

		return $w->result();
	}
	public function delete_result($student_id){
		return $this->db->where('student_id', $student_id)
			->delete('result_tb');
	}
	public function check_result($paper_id,$student_id){
		$q = $this->db->where(['paper_id' => $paper_id, 'student_id' => $student_id])
			->get('result_tb');
		return $q->result();
	}
	public function delete_response($paper_id,$student_id){
		return $this->db->where(['paper_id' => $paper_id, "student_id" => $student_id])
			->delete('response_tb');
	}
	public function delete_record($paper_id,$student_id){
		return $this->db->where(['paper_id' => $paper_id, "student_id" => $student_id])
			->delete('record_tb');
	}
	public function getProfile($email){
		$q = $this->db->where('email', $email)
			->get('user_tb');
		return $q->result();
	}
	public function updateProfile($data){
		return $this->db->where('email', $_SESSION['email'])
			->update('user_tb',$data);
	}
	public function getPaper_id($email){
		$q = $this->db->where('email', $email)
			->get('page_tb');
			if($q->num_rows){
				return $q->row()->id;
			}else{
			return true;
			}
	}
	public function getpapersID($email){
		$arr = array();
		$i=0;
		$q = $this->db->select('id')
			->where('email', $email)
			->get('page_tb');
		foreach ($q->result() as $z) {
			$arr[$i++] = $z->id; 
		}
		return ($arr)?$arr:'0';
	}
	public  function get_all_enrolled_students($ids){
		$q = $this->db->where_in('paper_id', $ids)
			->get('student_tb');
		return $q->result();
	}
}

 ?>