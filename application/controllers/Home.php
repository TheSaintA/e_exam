<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('quizo_model', 'dtb');
		$this->load->model('user_model', 'utb');
	}

	public function index()
	{
		$papers = $this->dtb->index('page_tb');
		$notices = $this->dtb->getLatestData('notice_tb');
		$this->load->view('index', compact('papers', 'notices'));
	}
	public function page($page)
	{
		$users = $this->utb->getData('user_tb');
		$admin_exists = $this->dtb->admin_exists();
		$papers = $this->dtb->index('page_tb');
		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view($page, compact('papers', 'admin_exists', 'users'));
		$this->load->view("footer");
	}
	public function student_login($id)
	{
		$data = $this->dtb->getDataById($id, 'page_tb');
		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view('student_login', compact('data'));
		$this->load->view("footer");
	}
	public function create_account()
	{
		$data = $this->input->post();
		if ($this->dtb->create_account($data)) {
			$this->session->set_flashdata('success', 'Your account has been created. Use your credentials to login');
		} else {
			$this->session->set_flashdata('unsuccess', 'We are sorry, Account creation unsuccessful. Kindly try again');
		}
		return redirect(base_url('p/signup'), 'refresh');
	}
	public function login()
	{
		$data = $this->input->post();
		$email = $this->dtb->user_exists($data);
		if ($email && ($email != 1)) {
			$this->session->set_userdata('email', $data['email']);
			return redirect(base_url('control_panel'), 'refresh');
		} elseif ($email == 1) {
			$this->session->set_flashdata('unsuccess', 'Your account is blocked. Please contact to admin of your organization to activate your account');
			return redirect(base_url('p/login'), 'refresh');
		} else {
			$this->session->set_flashdata('unsuccess', 'You have entered wrong credentials. Kindly check and try again');
			return redirect(base_url('p/login'), 'refresh');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('paper_id');
		$this->session->unset_userdata('email');
		return redirect(base_url(), 'refresh');
	}

	public function student_validate()
	{
		$data = $this->input->post();
		$paper = $data['id'];
		$id = $this->dtb->validate_student($data);
		if ($id) {
			if ($this->dtb->check_status($id)) {
				$this->session->set_userdata('student_id', $id);
				return redirect(base_url('student'), 'refresh');
			} else {
				$this->session->set_flashdata('unsuccess', 'Your account is blocked. Kindly contact the concerned person');
				return redirect(base_url("student_login/$paper"), 'refresh');
			}
		} else {
			$this->session->set_flashdata('unsuccess', 'Check your credentials and try again');
			return redirect(base_url("student_login/$paper"), 'refresh');
		}
	}
	public function student_logout()
	{

		$this->session->unset_userdata('student_id');
		return redirect(base_url(), 'refresh');
	}
	public function admin_logout()
	{

		$this->session->unset_userdata('admin');
		return redirect(base_url("p/login"), 'refresh');
	}
	public function create_admin()
	{
		$data = $this->input->post();
		if ($this->dtb->create_admin($data)) {
			$this->session->set_flashdata('success', 'Administrator account has been created successfully');
		} else {
			$this->session->set_flashdata('success', 'Failed to create admin account');
		}
		return redirect(base_url('p/login'), 'refresh');
	}
	public function validate_admin()
	{
		$data = $this->input->post();
		$username = $this->dtb->validate_admin($data);
		if ($username) {
			$this->session->set_userdata('admin', $username);
			return redirect(base_url('p/admin_panel'), 'refresh');
		} else {
			$this->session->set_flashdata('unsuccess', "Failed to login. Try again");
		}
	}
	public function update_dept_account($user_id, $action)
	{
		if ($this->dtb->update_dept_account($user_id, $action)) {
			$this->session->set_flashdata('success', 'Department Account has been updated');
		} else {
			$this->session->set_flashdata('success', 'Failed to update department account');
		}
		return redirect(base_url('p/admin_panel'), 'refresh');

	}
	public function delete_dept_account($id)
	{
		if ($this->dtb->delete_dept_account($id)) {
			$this->session->set_flashdata('success', 'Department account has been deleted');
		} else {
			$this->session->set_flashdata('success', 'Failed to delete department account');
		}
		return redirect(base_url('p/admin_panel'), 'refresh');
	}

	public function update_password()
	{
		$data = $this->input->post();
		if ($data['new'] == $data['confirm']) {

			unset($data['confirm']);
			$data['password'] = password_hash($data['new'], PASSWORD_BCRYPT);
			unset($data['new']);
			$email = $data['email'];
			unset($data['email']);
			if ($this->dtb->updateProfile($data,$email)) {
				$this->session->set_flashdata('success', 'Password has been changed successfully');
			} else {
				$this->session->set_flashdata('success', 'Failed to change password');
			}
		} else {
			$this->session->set_flashdata('success', 'Password does not match');

		}
		return redirect(base_url('p/admin_panel'), 'refresh');
	}
}