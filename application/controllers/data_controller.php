<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_controller extends CI_Controller {


	public function student_reg(){
		
		$name=$_POST['txtName'];
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtName', 'Name', 'required');

		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('student/student_registration.php');
		}
		else
		{
			
		$this->session->set_userdata('status', "Success");
		redirect('nav_controller/student_reg');
		}
		
		echo $name;
		
	}
	
	
	public function update_master_examtype(){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtExamtypeName', 'Exam type Name', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('utility/exam_type_master');
		}
		else
		{
			$flag=$_POST['postType'];
			$examType=$_POST['txtExamtypeName'];
			$isActive=$_POST['ddlActive'];
			if($flag!=""){
				$sql = "UPDATE exam_type SET
						name='$examType',
						isActive='$isActive'
						WHERE id='$flag'
				";
				$query = $this->db->query ($sql);
				if(query){
					$this->session->set_userdata('status', "Succesfully Updated!");
				}
			}else{
				
				$sql = "INSERT INTO `exam_type`(`name`, `isActive`) VALUES 
						('$examType','$isActive')
				";
				$query = $this->db->query ($sql);
				if(query){
					$this->session->set_userdata('status', "Succesfully saved!");
				}
			}	
		
			redirect('nav_controller/master_examtype');
		}
		
	}
	public function loadDT_examType(){
		$this->load->view('data_fragment/examTypeData.php');
	}
	public function removeDT_examType(){
		$id=$_GET['id'];
		$sql = "DELETE FROM `exam_type` WHERE id='$id'
		";
		$query = $this->db->query ($sql);
		
	}
	
	
}