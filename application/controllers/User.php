<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require FCPATH.'vendor/autoload.php';
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		if (!$this->session->userdata('email')) {
			return redirect(base_url(),'refresh');
		}
		$this->load->model('user_model','utb');
		$this->load->library('csvimport');
	}

	public function index(){
		
		$this->load->view('user/welcome');
		
	}
	public function u($page){
		$paper_ids = $this->utb->getpapersID($_SESSION['email']);
		$subjects = $this->utb->getSubjects($_SESSION['email']);
		$settings = $this->utb->getProfile($_SESSION['email']);
		$students_enrolled = $this->utb->getData('student_tb');
		$total_responses = $this->utb->getData('response_tb');
		$school_info = $this->utb->getData('school_info_tb');
		$papers_of_user = $this->utb->getPapers($this->session->userdata('email'));
		$enrolled_students = $this->utb->get_all_enrolled_students($paper_ids);
		$notices = $this->utb->getDataByEmail('notice_tb',$_SESSION['email']);
		$this->load->view("user/$page",compact('papers_of_user','notices','settings','subjects','students_enrolled','total_responses','enrolled_students','school_info'));
	}
	public function control_panel(){
		$paper_id = $this->utb->getPaper_id($_SESSION['email']);
		$user_id = $this->utb->get_user_id();
		
		$total_rows = $this->utb->getCount_by_email($_SESSION['email'],'page_tb');
		$notices = $this->utb->getCount_by_email($_SESSION['email'],'notice_tb');
		$papers =  $this->utb->index($this->session->userdata('email'));
		$getRows = $this->data_pagination($total_rows,base_url('dashboard'),3,2,$_SESSION['email'],'page_tb','by_email');
		$count_response = $this->utb->count_responses($user_id);
		$count_students = $this->utb->count_students($paper_id);
		$count_live_papers = $this->utb->count_live_papers($_SESSION['email']);
		$count_paper_response = $this->utb->count_paper_responses();
		$responses = $this->utb->getData('response_tb');
			 $this->load->view('user/index',compact('papers','notices','getRows','count_response','responses','count_paper_response','count_students','count_live_papers'));
			}
	public function getQuestions($page_id){
		$paper_name = $this->utb->getPaperName($page_id);
		$selected_paper_id = $this->utb->getPaperId($page_id);
		$total_rows = $this->utb->getCount_by_paper($page_id,'question_bank_tb');
		$getRows = $this->data_pagination($total_rows,base_url("control_panel/getQuestions/$page_id/"),10,4,$page_id,'question_bank_tb','by_paper');
		//$questions = $this->utb->getQuestions($page_id);
		$papers = $this->utb->index($this->session->userdata('email')); 
		$this->load->view('user/paper',compact('papers','getRows','paper_name','selected_paper_id'));

	}
	public function add_question(){
		$data = $this->input->post();
		$data['correct_answer'] = $data[$data['correct_answer']];
		$page_id = $this->input->post('page_id');
		if ($this->utb->insert_data($data,'question_bank_tb')) {
			$this->session->set_flashdata('success',"Question has been added to your paper");
		}else{
			$this->session->set_flashdata('unsuccess',"Failed to add your question. Kindly try again");
		}
		return redirect("control_panel/getQuestions/$page_id",'refresh');
	}
	public function update_question(){
		$data = $this->input->post();
		$data['correct_answer'] = $data[$data['correct_answer']];
		$id = $data['id'];
		unset($data['id']);
		$page_id = $this->input->post('page_id');
		unset($data['page_id']);
		if ($this->utb->updateById($data,$id,'question_bank_tb')) {
			$this->session->set_flashdata('success',"Question has been updated to your paper");
		}else{
			$this->session->set_flashdata('unsuccess',"Failed to update your question. Kindly try again");
		}
		return redirect("control_panel/getQuestions/$page_id",'refresh');
	}
	public function delete_question($page_id,$id){
		if ($this->utb->deleteById($id,'question_bank_tb')) {
			$this->session->set_flashdata('success',"Question has been deleted successfully");
		}else{
			$this->session->set_flashdata('unsuccess',"Failed to delete question. Kindly try again");
		}
		return redirect("control_panel/getQuestions/$page_id",'refresh');
	}
	public function edit_paper(){
		$data=$this->input->post();
		$data['email'] = $this->session->userdata('email');
		$data['start_date'] = strtotime($data['start_date']);
		$data['end_date'] = strtotime($data['end_date']);
		$data['start_time'] = strtotime($data['start_time']);
		$data['end_time'] = strtotime($data['end_time']);
		$id= $this->input->post('id');
		unset($data['id']);
		if ($this->utb->update_page($data,$id)) {
			$this->session->set_flashdata('success','Paper edited successfully');
		}else{
			$this->utb->set_flashdata('unsuccess','Failed to edit paper');
		}
		return redirect(base_url("control_panel/u/subjects"),"refresh");
	}
	public function create_paper(){
		$data = $this->input->post();
		$data['email'] = $this->session->userdata('email');
		$data['start_date'] = strtotime($data['start_date']);
		$data['end_date'] = strtotime($data['end_date']);
		$data['start_time'] = strtotime($data['start_time']);
		$data['end_time'] = strtotime($data['end_time']);
		if ($this->utb->insert_data($data,'page_tb')) {
			$this->session->set_flashdata('success','New paper created  successfully');
		}else{
			$this->utb->set_flashdata('unsuccess','Failed to create new paper');
		}
		return redirect(base_url('control_panel/u/subjects'),"refresh");
	}
	public function delete_paper($id){
		if (($this->utb->deleteById($id,'page_tb')) && ($this->utb->delete_questions($id))) {
			$this->session->set_flashdata('success',"Paper has been deleted");
		}else{
			$this->session->set_flashdata('unsuccess','Paper not deleted');
		}
		return redirect(base_url('control_panel/u/subjects'),"refresh");
	}
	public function configure_paper($paper_selected){
			// $paper_selected = $this->input->get('paper_id');
			$papers =  $this->utb->index($this->session->userdata('email'));
			$get_config = $this->utb->getConfig($paper_selected);
			$get_grading = $this->utb->getGrading($paper_selected);
			$paper_name = $this->utb->getPaperName($paper_selected);
			$this->load->view('user/header');
			$this->load->view('user/configuration',compact('papers','paper_name','paper_selected','get_config','get_grading'));
			$this->load->view('user/footer');
	}
	public function set_configuration(){
		$data = $this->input->post();
		$paper = $data['page_id'];
		if ($this->utb->insert_data($data,'configuration_tb')) {
			$this->session->set_flashdata('success','Configuration changes applied successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to apply configuration changes');
		}
	return redirect(base_url("control_panel/configure_paper/$paper"),"refresh");

	}
	public function update_paper_configuation(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);
		$paper_id = $data['paper_id'];
		unset($data['paper_id']);
			if ($this->utb->updateById($data,$id,'configuration_tb')) {
		$this->session->set_flashdata('success','Configuration changes applied successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to apply configuration changes');
		}
	return redirect(base_url("control_panel/configure_paper/$paper_id"),"refresh");
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
					if($this->utb->set_paper_status($paper_id,$status)){
						$this->session->set_flashdata('success','Paper status has been changed');
					}else{
						$this->session->set_flashdata('unsuccess','Failed to update paper status');
					}
							
				}else{
					$this->session->set_flashdata('unsuccess','Failed, Add the students to the paper and try again');
				}
			}else{
				$this->session->set_flashdata('unsuccess','Set the configuration of paper and try again');
			}
		}elseif($status == 0){
			if ($this->utb->set_paper_status($paper_id,$status)) {
				$this->session->set_flashdata('success','Paper status has been changed');
			}else{
				$this->session->set_flashdata('unsuccess','Paper status has not been changed. Try again');
			}
		}else{
			$this->session->set_flashdata('unsuccess','Paper status has not been changed. Try again');
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
		$paper_id = $data['paper_id'];
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
		return redirect(base_url("control_panel/show_users/$paper_id"),'refresh');
	}
	public function show_users($id){
		$total_rows = $this->utb->getCount($id,'student_tb');
		$data = $this->data_pagination($total_rows, base_url("control_panel/show_users/$id"), '10', '4', $id,'student_tb','by_id');	
		$data['paper_details'] = $this->utb->getDataByIdd($id,'page_tb');
		$this->load->view('user/students_list',$data);
	


	}

	
	public function udpate_block_unblock_status($redirect,$paper_id,$student_id,$status){
		if ($this->utb->set_status($student_id,$status)) {
			$this->session->set_flashdata('success','Student status has been updated successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Student status has not been updated');
		}
		if ($redirect == 'show_users') {
			return redirect("control_panel/$redirect/$paper_id", 'refresh');
		} else {
			return redirect("control_panel/u/enrollment_section", 'refresh');
		}
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
	
	public function add_notice(){
		$data= $this->input->post();
		if($this->utb->insert_data($data,'notice_tb')){
			$this->session->set_flashdata('success','Notice has been added succesfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to add notice');
		}
		redirect(base_url('control_panel/u/notices'),'refresh');
	}
	public function delete_notice($id){
		if($this->utb->deleteById($id,'notice_tb')){
			$this->session->set_flashdata('success','Notice has been deleted successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to delete notice');
		}
		redirect(base_url("control_panel/u/notices"),'refresh');
	}
	public function excel_report($paper_id){
		$fileName = 'responseData.xlsx';  
		$employeeData = $this->utb->getExcelData($paper_id,'response_tb');
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
	public function subject_report_excel(){
		$paper_id = $this->input->post('page_id');
		$fileName = 'Subject_report.xlsx';  
		$employeeData = $this->utb->getExcelData($paper_id,'result_tb');
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Student ID');
        $sheet->setCellValue('C1', 'Student Name');
        $sheet->setCellValue('D1', 'Enrollment No');
		$sheet->setCellValue('E1', 'Correct Answers');
		$sheet->setCellValue('F1', 'Wrong Answers');
		$sheet->setCellValue('G1', 'Percentage');
        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val->id);
            $sheet->setCellValue('B' . $rows, $val->student_id);
            $sheet->setCellValue('C' . $rows, $val->student_name);
            $sheet->setCellValue('D' . $rows, $val->enrollment_no);
		    $sheet->setCellValue('E' . $rows, $val->correct_answers);
			$sheet->setCellValue('F' . $rows, $val->wrong_answers);
			$sheet->setCellValue('G' . $rows, $val->percentage);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName); 
	}
	public function report_student_excel(){
		$paper_id = $this->input->post('page_id');
		$student_id = $this->input->post('student_id');
		$fileName = 'Student_Report.xlsx';  
		$responseData = $this->utb->getStudentExcelData($paper_id,$student_id);
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Student ID');
        $sheet->setCellValue('C1', 'Student Name');
        $sheet->setCellValue('D1', 'Enrollment No');
		$sheet->setCellValue('E1', 'Correct Answers');
		$sheet->setCellValue('F1', 'Wrong Answers');
		$sheet->setCellValue('G1', 'Percentage');
        $rows = 2;
        foreach ($responseData as $val){
            $sheet->setCellValue('A' . $rows, $val->id);
            $sheet->setCellValue('B' . $rows, $val->student_id);
            $sheet->setCellValue('C' . $rows, $val->student_name);
            $sheet->setCellValue('D' . $rows, $val->enrollment_no);
		    $sheet->setCellValue('E' . $rows, $val->correct_answers);
			$sheet->setCellValue('F' . $rows, $val->wrong_answers);
			$sheet->setCellValue('G' . $rows, $val->percentage);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName); 
	}
	public function pdf_report($paper_id){
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->utb->get_result_of_students($paper_id);
		$paper_name = $this->utb->getPaperName($paper_id);
		$stylesheet = file_get_contents(base_url('assets/css/w3.css'));

		$html = $this->load->view("user/report_list",compact('data','paper_name'),true);
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML($html);
		$mpdf->Output('result_of_'.$paper_name.'.pdf','I');
	}
	public function report_pdf(){
		$paper_id = $this->input->post('page_id');
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->utb->get_result_of_students($paper_id);
		$paper_name = $this->utb->getPaperName($paper_id);
		$stylesheet = file_get_contents(base_url('assets/css/w3.css'));

		$html = $this->load->view("user/report_list",compact('data','paper_name'),true);
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML($html);
		$mpdf->Output('result_of_'.$paper_name.'.pdf','I');
	}
	
	public function analyze_paper($paper_id){
		$responses = $this->utb->count_responses($paper_id);
		$resp = $this->utb->getExcelData($paper_id,'response_tb');
		$students = $this->utb->get_result_of_students($paper_id);
		$papers = $this->utb->index($this->session->userdata('email'));
		$this->load->view('user/analyze',compact('responses','papers','paper_id','resp','students'));
	}
	public function analyze_score($paper_id,$student_id){
		$result = $this->utb->getGrading($paper_id); 
		$student_info = $this->utb->getDataByIdd($student_id, 'student_tb');
		$paper_info = $this->utb->getDataByIdd($paper_id, 'page_tb');
		$questions = $this->utb->getQuestions($paper_id);
		$responses = $this->utb->getResponse($paper_id,$student_id);
		$correct=$this->utb->getCorrectQuestions($paper_id,$student_id);
		$wrong = 0;
		$total = count($questions);
		$wrong = $total - $correct;
		($correct > 0) ? $percentage = (($correct / $total) * 100) : $percentage = 0;
		$this->load->view("user/analyze_paper",compact('responses','questions','student_info','correct','wrong','percentage','result','paper_info'));
	}
	public function delete_result_of_student($paper_id,$student_id){
		if(($this->utb->delete_result($student_id)) && ($this->utb->delete_response($paper_id,$student_id)) && ($this->utb->delete_record($paper_id,$student_id))){
			$this->session->set_flashdata('success','Student result has been deleted successfully');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to delete student result.');
		}
		return redirect(base_url("control_panel/analyze_paper/$paper_id"),"refresh");
	}
	public function update_profile($type){
		$data = $this->input->post();
		if ($type == 'password') {
			if($data['new'] == $data['confirm']){
				
			unset($data['confirm']);
			$data['password'] = password_hash($data['new'],PASSWORD_BCRYPT);
			unset($data['new']);
			if($this->utb->updateProfile($data)){
				$this->session->set_flashdata('success','Password has been changed successfully');
			}else{
				$this->session->set_flashdata('success','Failed to change password');
			}
		}else{
			$this->session->set_flashdata('success','Password does not match');
		}
		}else{
			if($this->utb->updateProfile($data)){
				$this->session->set_flashdata('success','Profile has been updated successfully');
			}else{
				$this->session->set_flashdata('success','Failed to update profile');
			}
		}
		
		return redirect(base_url("u/settings","refresh"));
	}
	public function update_dept_info($action){
		$data = $this->input->post();
		if($action == 'insert'){
		if($this->utb->insert_data($data,'school_info_tb')){
			$this->session->set_flashdata('success','Department information has been uploaded');
		}else{
			$this->session->set_flashdata('unsuccess','Failed to upload dept info');
		}
		} else {
			$email = $data['email'];
			unset($data['email']);
			if ($this->utb->update_dept_data($data,$email)) {
				$this->session->set_flashdata('success', 'Department information has been updated');
			} else {
				$this->session->set_flashdata('unsuccess', 'Failed to update department info. ');

			}
		}
		return redirect(base_url('control_panel/u/school_info'),'refresh');
	}
	private function data_pagination($total_rows,$base_url,$per_page,$uri_segment,$id_or_email,$table,$fetch_by){
		$config = array();
			$config['base_url'] = $base_url;
			$config['total_rows'] = $total_rows;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['attributes'] = ['class' => 'page-link text-spruce font-weight-bold'];
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link w3-btn spruce">';
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['per_page'] = $per_page;
			$config['uri_segment'] = $uri_segment;
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$this->pagination->initialize($config);
			$page = ($this->uri->segment($uri_segment))? $this->uri->segment($uri_segment) : 0;
			if($fetch_by == 'by_email'){
				return $this->utb->getDataByPagination_by_email($table, $id_or_email, $config['per_page'], $page);
			}elseif($fetch_by == 'by_paper'){
				return $this->utb->getDataByPagination_by_paper($table, $id_or_email, $config['per_page'], $page);
			} else {
				$data['getRows'] = $this->utb->getDataByPagination($table, $id_or_email, $config['per_page'], $page);
			}
			return $data;
	}
	
// Method to import csv files
public function import($type) {

            $path = FCPATH . "upload/";

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'csv';
            $config['max_size'] = 1024000;
            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();

                $this->session->set_flashdata('error', $this->upload->display_errors());
			return redirect(base_url("control_panel"));
                //echo $error['error'];
            } else {

                $file_data = $this->upload->data();
                $file_path = base_url() . "upload/" . $file_data['file_name'];

                $csv_data = $this->csvimport->parse_file($file_path);
			if ($type == 'questions') {
				foreach ($csv_data as $row) {
					$paper_id = $row['page_id'];
				}
			}
                if ($csv_data) {
				if ($type == 'students') {
					

					foreach ($csv_data as $row) {
						// $name = strtolower(strtok($row['name'], ' '));
						$salt = rand().'@'.$row['enrollment_no'];
						$password = $this->encryption->encrypt($salt);

						$insert_data[] = array(
							'name' => $row['name'],
							'enrollment_no' => $row['enrollment_no'],
							'password' => $password, //$row['password'],
							'paper_id' => $row['paper_id'],
							'block_unblock_status' => $row['block_unblock_status'],
						);

					}
				}else{
					foreach ($csv_data as $row) {
						$insert_data[] = array(
							'question' => $row['question'],
							'answer_1' => $row['answer_1'],
							'answer_2' => $row['answer_2'],
							'answer_3' => $row['answer_3'],
							'answer_4' => $row['answer_4'],
							'correct_answer' => $row['correct_answer'],
							'page_id' => $row['page_id'],
						);

					}
				}
				$tb_name = '';
                   ($type=="students")? $tb_name ='student_tb' : $tb_name ='question_bank_tb' ;
              $this->utb->insert_user($insert_data,$tb_name);
              $this->session->set_flashdata('success', "CSV imported successfully");
				return redirect(base_url("control_panel"),'refresh');   
			//   return  redirect(base_url("control_panel/getQuestions/$paper_id"),'refresh');

                } else {
                    $data['error'] = "Error occured";
                    $this->session->set_flashdata('error', $data['error']);
                    // return  redirect(base_url("control_panel/getQuestions/$paper_id"),'refresh');
				return redirect(base_url('control_panel'),'refresh');
				}
                
            }
        } 
		function student_report_pdf(){
			$paper_id = $this->input->post('page_id');
			$student_id = $this->input->post('student_id');
			$mpdf = new \Mpdf\Mpdf();
			$result = $this->utb->getGrading($paper_id);
			$student_info = $this->utb->getDataByIdd($student_id, 'student_tb');
			$paper_info = $this->utb->getDataByIdd($paper_id, 'page_tb');
			$questions = $this->utb->getQuestions($paper_id);
			$responses = $this->utb->getResponse($paper_id,$student_id);
			$correct=0;
			$wrong = 0;
			$correct=$this->utb->getCorrectQuestions($paper_id,$student_id);
			$wrong = 0;
			$total = count($questions);
			$wrong = $total - $correct;
			($correct > 0) ? $percentage = (($correct / $total) * 100) : $percentage = 0;
			
			$wrong = $total - $correct;
			$percentage = ($correct/$total)*100;
			$stylesheet = file_get_contents(base_url('assets/css/w3.css'));

			$html = $this->load->view("user/report",compact('responses','questions','student_info','correct','wrong','percentage','result','paper_info'),true);
			$mpdf->WriteHTML($stylesheet, 1);
			$mpdf->WriteHTML($html);
			$mpdf->Output('report.pdf','I');
		}
		function print($paper_id, $student_id){
			$mpdf = new \Mpdf\Mpdf();
			$result = $this->utb->getGrading($paper_id);
			$student_info = $this->utb->getDataByIdd($student_id, 'student_tb');
			$paper_info = $this->utb->getDataByIdd($paper_id, 'page_tb');
			$questions = $this->utb->getQuestions($paper_id);
			$responses = $this->utb->getResponse($paper_id,$student_id);
			$correct=0;
			$wrong = 0;
			$correct=$this->utb->getCorrectQuestions($paper_id,$student_id);
			$wrong = 0;
			$total = count($questions);
			$wrong = $total - $correct;
			($correct > 0) ? $percentage = (($correct / $total) * 100) : $percentage = 0;
			
			$wrong = $total - $correct;
			$percentage = ($correct/$total)*100;
			$stylesheet = file_get_contents(base_url('assets/css/w3.css'));

			$html = $this->load->view("user/report",compact('responses','questions','student_info','correct','wrong','percentage','result','paper_info'),true);
			$mpdf->WriteHTML($stylesheet, 1);
			$mpdf->WriteHTML($html);
			$mpdf->Output('report.pdf','I');
		}
    }


 ?>