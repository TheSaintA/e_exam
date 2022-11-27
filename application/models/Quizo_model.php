<?php 

class Quizo_model extends CI_Model
{	
	public function index($tb_name){
		$q = $this->db->select('*')
						->get($tb_name);
		return $q->result();
	}
	public function getDataById($id,$tb_name){
		$q = $this->db->select('*')
						->where('id',$id)
						->get($tb_name);
		return $q->result();
	}
	public function create_account($data){
		$q = $this->db->select('*')
					 ->where('email',$data['email'])
					 ->get('user_tb');
		if($q->num_rows()){
			return FALSE;
		}else{
			$data['create_date'] = time();
			$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
			return $this->db->insert('user_tb',$data);
		}
	}
	public function user_exists($data){
		if(!empty($data)){
			$q = $this->db->select('*')
						  ->where('email',$data['email'])
						  ->get('user_tb');
			if($q->num_rows()){
				if (password_verify($data['password'], $q->row()->password)) {
					return $q->row()->email;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	public function validate_student($data){
		if (!empty($data)) {
			$q = $this->db->select('*')
						  ->where(['enrollment_no'=>$data['username'],'paper_id'=>$data['id']])
						  ->get('student_tb');
			if($q->num_rows()){
				if (($this->encryption->decrypt($q->row()->password)) === $data['password']) {
					return $q->row()->id;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	public function check_status($id){
		$q = $this->db->where(['id'=>$id,'block_unblock_status'=>'0'])
					  ->get('student_tb');
		if ($q->num_rows()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

?>