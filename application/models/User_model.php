<?php 

class User_model extends CI_Model
{
	
	public function index($email){
		$q = $this->db->select('*')
					  ->where('email',$email)
					  ->get('page_tb');
		return $q->result();
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
	public function count_responses($paper_id){
		return $this->db->where('paper_id',$paper_id)
					  ->count_all_results('response_tb');
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
							->update('configuration_tb',$data);
		}else{
			return FALSE;
		}
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
	public function getCount($id){
		 return $this->db->where('paper_id',$id)
		 				 ->count_all_results('student_tb');
	}
	public function getDataByPagination($tb_name,$id,$limit, $start){
		$q = $this->db->limit($limit,$start)
					  ->where('paper_id',$id)
					  ->get($tb_name);
		return $q->result();
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
	public function getExcelData($paper_id){
		$q = $this->db->where('paper_id',$paper_id)
					  ->get('response_tb');
		return $q->result();
	}
	public function getSudents($paper_id){
		$q = $this->db->where('paper_id',$paper_id)
				      ->get('student_tb');
			return $q->result();
	}
}

 ?>