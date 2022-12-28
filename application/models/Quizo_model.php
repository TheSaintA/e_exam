<?php 

class Quizo_model extends CI_Model
{	
	public function index($tb_name){
		$q = $this->db->select('*')
						->get($tb_name);
		return $q->result();
	}
	public function getData($tb_name){
		$q = $this->db->select('*')
			->get($tb_name);
		return $q->result();
	}
	public function getlatestData($tb_name){
		$q = $this->db->select('*')
				->order_by('id','desc')
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
				if ($q->row()->status == 1) {
					if ((password_verify($data['password'], $q->row()->password))) {
						return $q->row()->email;
					} else {
						return FALSE;
					}
				}else{
					return 1;
				}
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	public function updateProfile($data, $email){
		return $this->db->where('email', $email)
			->update('user_tb',$data);
	}
	public function delete_dept_account($id){
		return $this->db->where('id', $id)
			->delete('user_tb');
	}
	public function admin_exists(){
		$q = $this->db->select('*')
						->get('admin_tb');
		return $q->result();
	}
	public function create_admin($data){
		$q = $this->db->select('*')
					 ->get('admin_tb');
		if($q->num_rows()){
			return FALSE;
		}else{
			$data['create_date'] = time();
			$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
			return $this->db->insert('admin_tb',$data);
		}
	}
	public function validate_admin($data){
		if(!empty($data)){
			$q = $this->db->select('*')
						  ->where('username',$data['username'])
						  ->get('admin_tb');
			if($q->num_rows()){
				if (password_verify($data['password'], $q->row()->password)) {
					return $q->row()->username;
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
	public function update_dept_account($user_id,$action){
		return $this->db->where('id', $user_id)
			->set('status', $action)
			->update('user_tb');

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