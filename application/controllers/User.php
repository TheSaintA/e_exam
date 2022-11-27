<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('email')) {
			return redirect(base_url(),'refresh');
		}
		$this->load->model('user_model','utb');
	}

	public function index(){
		$this->load->view('user/index');
	}
	public function u($page){
		$papers_of_user = $this->utb->getPapers($this->session->userdata('email'));
		$this->load->view("user/$page",compact('papers_of_user'));
	}
	public function control_panel(){
		
		$paper_name= NULL;
		$questions = NULL;
		$selected_paper_id =  NULL;
		$this->session->unset_userdata('paper_id');
		$papers = $this->utb->index($this->session->userdata('email'));
		$count_response = $this->utb->count_responses(2);
		if ($this->input->get()) {

			$paper_selected = $this->input->get('paper_id');
			$get_config = $this->utb->getConfig($paper_selected);
			$get_grading = $this->utb->getGrading($paper_selected);
			$this->load->view('user/header',compact('papers','questions','paper_name','selected_paper_id','paper_selected','get_config','get_grading'));
			$this->load->view('user/configuration');
			$this->load->view('user/footer');
		}else{
			$paper_selected = FALSE;	
			$this->load->view('user/control_panel',compact('papers','questions','paper_name','selected_paper_id','paper_selected','count_response'));
		}
	}
	public function getQuestions(){
		$page_id = $this->input->get();
		$paper_name = $this->utb->getPaperName($page_id);
		$selected_paper_id = $this->utb->getPaperId($page_id);
		$questions = $this->utb->getQuestions($page_id);
		$papers = $this->utb->index($this->session->userdata('email')); 
		$this->load->view('user/paper',compact('papers','questions','paper_name','selected_paper_id'));

	}
	public function add_question(){
		$data = $this->input->post();
		$page_id = $this->input->post('page_id');
		if ($this->utb->insert_data($data,'question_bank_tb')) {
			$this->session->set_flashdata('success',"Question has been added to your paper");
		}else{
			$this->session->set_flashdata('unsuccess',"Failed to add your question. Kindly try again");
		}
		return redirect("control_panel/getQuestions?page_id=$page_id",'refresh');
	}
	public function update_question(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$page_id = $this->input->post('page_id');
		unset($data['page_id']);
		if ($this->utb->updateById($data,$id,'question_bank_tb')) {
			$this->session->set_flashdata('success',"Question has been updated to your paper");
		}else{
			$this->session->set_flashdata('unsuccess',"Failed to update your question. Kindly try again");
		}
		return redirect("control_panel/getQuestions?page_id=$page_id",'refresh');
	}
	public function delete_question($page_id,$id){
		if ($this->utb->deleteById($id,'question_bank_tb')) {
			$this->session->set_flashdata('success',"Question has been deleted successfully");
		}else{
			$this->session->set_flashdata('unsuccess',"Failed to delete question. Kindly try again");
		}
		return redirect("control_panel/getQuestions?page_id=$page_id",'refresh');
	}
	public function rename_paper(){
		$data=$this->input->get();
		$id= $this->input->get('id');
		unset($data['id']);
		if ($this->utb->update_page($data,$id)) {
			$this->session->set_flashdata('success','Paper renamed successfully');
		}else{
			$this->utb->set_flashdata('unsuccess','Failed to change page name');
		}
		return redirect(base_url("control_panel"),"refresh");
	}
	public function create_paper(){
		$data = $this->input->post();
		$data['email'] = $this->session->userdata('email');
		if ($this->utb->insert_data($data,'page_tb')) {
			$this->session->set_flashdata('success','New paper created  successfully');
		}else{
			$this->utb->set_flashdata('unsuccess','Failed to create new paper');
		}
		return redirect(base_url('control_panel'),"refresh");
	}
	public function delete_paper($id){
		if (($this->utb->deleteById($id,'page_tb')) && ($this->utb->delete_questions($id))) {
			$this->session->set_flashdata('success',"Paper has been deleted");
		}else{
			$this->session->set_flashdata('unsuccess','Paper not deleted');
		}
		return redirect(base_url('control_panel'),"refresh");
	}
	public function configure_paper(){
		$data = $this->input->post();
		//$data['from_date'] = strtotime($data['from_date']);
		//$data['from_time'] = strtotime($data['from_time']);
		if ($this->utb->insert_data($data,'configuration_tb')) {
			$this->session->set_flashdata('success','Configuration changes applied successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to apply configuration changes');
		}
	return redirect(base_url("control_panel"),"refresh");

	}
	public function update_paper_configuation(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		if ($this->utb->updateById($data,$id,'configuration_tb')) {
		$this->session->set_flashdata('success','Configuration changes applied successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to apply configuration changes');
		}
	return redirect(base_url("control_panel"),"refresh");
	}
	public function set_theme(){
		$data = $this->input->post();
		$id = $this->input->post('page_id');
		unset($data['page_id']);
			if ($this->utb->set_theme($data,$id)) {
				$this->session->set_flashdata('success','Theme applied successfully');
			}else{
				$this->session->set_flashdata('unsuccess','Failed to apply theme. Try to configure the general tab of paper first');
			}
	return redirect(base_url("control_panel/getQuestions?page_id=$id"),"refresh");			
	}
	public function add_grading(){
		$data = $this->input->post();
		$id = $data['page_id'];
		if ($this->utb->insert_data($data,'grading_tb')) {
			$this->session->set_flashdata('success','Grading has been configured');
		}else{
			$this->session->set_flashdata('unsuccess','Grading has not been configured. Try again');
		}
		return redirect(base_url("control_panel/getQuestions?page_id=$id") ,'refresh');
	}
	public function paper_status($paper_id,$status){
		if ($status == 1) {
			if ($this->utb->getConfig($paper_id)) {
				if ($this->utb->getStudents($paper_id)) {
					$this->session->set_flashdata('success','Paper status has been changed');		
				}else{
					$this->session->set_flashdata('unsuccess','Failed, Add the students to the paper and try again');
				}
			}else{
				$this->session->set_flashdata('unsuccess','Set the configuration of paper and try again');
			}
		}else{
			if ($this->utb->set_paper_status($paper_id,$status)) {
				$this->session->set_flashdata('success','Paper status has been changed');
			}else{
				$this->session->set_flashdata('unsuccess','Paper status has not been changed. Try again');
			}
		}
		return redirect(base_url('control_panel'),'refresh');
	}
	public function getUsers(){
		$data = $this->input->get();
		$this->session->set_userdata('paper_id',$data['paper_id']);
		return redirect(base_url('u/users') ,'refresh');
	}
	public function add_student(){
		$data = $this->input->post();
		if ($this->utb->student_exists($data['enrollment_no'],$data['paper_id'])) {
			$this->session->set_flashdata('unsuccess',"Student with Enrollment No: ".$data['enrollment_no']." already exists.");
		}else{
			$name = strtolower(strtok($data['name'], ' '));
			$salt = rand().'@'.$data['enrollment_no'];
			$data['password'] = $this->encryption->encrypt($salt);
			if ($this->utb->insert_data($data,'student_tb')) {
				$this->session->set_flashdata('success',$data['name']." has been added successfully");
			}else{
				$this->session->set_flashdata('unsuccess',"Failed to add ".$data['name']);
			}
		}
		return redirect(base_url("u/users"),'refresh');
	}
	public function show_users($id){
		$total_rows = $this->utb->getCount($id);
		if ($total_rows) {
			$config = array();
			$config['base_url'] = base_url("control_panel/show_users/$id");
			$config['total_rows'] = $total_rows;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['attributes'] = ['class' => 'page-link'];
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
			$data['paper_details'] = $this->utb->getDataByIdd($id,'page_tb');
			// $data['links'] = $this->pagination->create_links();
			$data['getRows'] = $this->utb->getDataByPagination('student_tb',$id,$config['per_page'], $page);
			$this->load->view('user/show_users',$data);
		}else{
			$this->session->set_flashdata('unsuccess','No student has been registered for this paper');
			return redirect(base_url('u/users'),'refresh');
		}


	}
	public function udpate_block_unblock_status($paper_id,$student_id,$status){
		if ($this->utb->set_status($student_id,$status)) {
			$this->session->set_flashdata('success','Student status has been updated successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Student status has not been updated');
		}
		return redirect("control_panel/show_users/$paper_id",'refresh');
	}
	public function update_student(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$paper_id = $data['paper_id'];
		unset($data['paper_id']);
		$data['password'] = $this->encryption->encrypt($data['password']);
		if ($this->utb->updateById($data,$id,'student_tb')) {
			$this->session->set_flashdata('success','Student data has been updated successfully');
		}else {
			$this->session->set_flashdata('unsuccess','Failed to update student data');
		}
		return redirect(base_url("control_panel/show_users/$paper_id"),'refresh');
	}
	public function delete_student($route,$id){
		if ($this->utb->deleteById($id,'student_tb')) {
			$this->session->set_flashdata('success','Student has been deleted successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to delete student');
		}
		return redirect(base_url("control_panel/show_users/$route"),'refresh');
	}
	public function analyze_paper($paper_id){
		$responses = $this->utb->count_responses($paper_id);
		$resp = $this->utb->getExcelData($paper_id);
		$students = $this->utb->getSudents($paper_id);
		$papers = $this->utb->index($this->session->userdata('email'));
		$this->load->view('user/analyze',compact('responses','papers','paper_id','resp','students'));
	}
	public function excel_report($paper_id){
		$fileName = 'responseData.xlsx';  
		$employeeData = $this->utb->getExcelData($paper_id);
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Paper ID');
        $sheet->setCellValue('C1', 'Student ID');
        $sheet->setCellValue('D1', 'Question ID');
		$sheet->setCellValue('E1', 'Answer');
        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val->id);
            $sheet->setCellValue('B' . $rows, $val->paper_id);
            $sheet->setCellValue('C' . $rows, $val->student_id);
            $sheet->setCellValue('D' . $rows, $val->question_id);
		    $sheet->setCellValue('E' . $rows, $val->answer);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName); 
	}
	public function pdf_report($paper_id){
		$data = $this->utb->getExcelData($paper_id);
		$this->load->library('pdf');
		$html = $this->pdf->view('user/pdf',compact('data'),true);
		// $html = $this->output->get_output();
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}
}

 ?>