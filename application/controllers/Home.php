<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('quizo_model','dtb');
	}

	public function index()
	{
		$papers = $this->dtb->index('page_tb');
		$this->load->view('index',compact('papers'));
	}
	public function page($page){
		$this->load->view($page);
	}
	public function new_template($page){
		$this->load->view("new_template/$page");
	}
	public function student_login($id){
		$data = $this->dtb->getDataById($id,'page_tb');
		$this->load->view('student_login',compact('data'));
	}
	public function create_account(){
		$data = $this->input->post();
			if($this->dtb->create_account($data)){
				$this->session->set_flashdata('success','Your account has been created. Use your credentials to login');
			}else{
				$this->session->set_flashdata('unsuccess','We are sorry, Account creation unsuccessful. Kindly try again');
			}
		return redirect(base_url('p/signup'),'refresh');
	}
	public function login(){
		$data = $this->input->post();
		if($this->dtb->user_exists($data)){
			 $this->session->set_userdata('email',$data['email']);
			 return redirect(base_url('user'),'refresh');
		}else{
			$this->session->set_flashdata('unsuccess','You have entered wrong credentials. Kindly check and try again');
			return redirect(base_url('p/login'),'refresh');
		}
	}
	public function logout(){
		$this->session->unset_userdata('paper_id');
		$this->session->unset_userdata('email');
		return redirect(base_url(),'refresh');
	}

	public function student_validate(){
		$data = $this->input->post();
		$paper = $data['id'];
		$id = $this->dtb->validate_student($data);
		if ($id) {
			if ($this->dtb->check_status($id)) {
				$this->session->set_userdata('student_id',$id);
				return redirect(base_url('student'),'refresh');
			}else{
				$this->session->set_flashdata('unsuccess','Your account is blocked. Kindly contact the concerned person');
				return redirect(base_url("student_login/$paper"),'refresh');
			}
		}else{
			$this->session->set_flashdata('unsuccess','Check your credentials and try again');
			return redirect(base_url("student_login/$paper"),'refresh');
		}
	}
	public function student_logout(){
		$this->session->unset_userdata('student_id');
		return redirect(base_url(),'refresh');
	}
}
