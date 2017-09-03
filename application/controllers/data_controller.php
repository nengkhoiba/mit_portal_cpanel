<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_controller extends CI_Controller {


	public function student_reg(){  
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtFirstName', 'First Name', 'required');
		$this->form_validation->set_rules('txtlastName', 'Last Name', 'required');
		$this->form_validation->set_rules('dateDOB', 'Date of birth', 'required');
		$this->form_validation->set_rules('txtPermanentAddress', 'Permanent Adress', 'required');
		$this->form_validation->set_rules('txtCAdress', 'Communication Adress', 'required');
		$this->form_validation->set_rules('txtFather', 'Father Name ', 'required');
		$this->form_validation->set_rules('txtMother', 'Mother Name', 'required');
		$this->form_validation->set_rules('txtPhone', 'Residence Phone no.', 'required');
		$this->form_validation->set_rules('txtMobile', 'Mobile no', 'required');
		$this->form_validation->set_rules('txtReligion', 'Religion', 'required');
		$this->form_validation->set_rules('txtNationality', 'Nationality', 'required');
		$this->form_validation->set_rules('txtCategory', 'Mother Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
		    
		    $this->load->view('student/student_registration.php');
		    
		}
		else
		{
		    $title=trim($_POST['txtTitle']);
		    $fname=trim($_POST['txtFirstName']);
		    $lname=trim($_POST['txtlastName']);
		    $mname=trim($_POST['txtMiddleName']);
		    $dob=trim($_POST['dateDOB']);
		    $padress=trim($_POST['txtPermanentAddress']);
		    $cadress=trim($_POST['txtCAdress']);
		    $phone=trim($_POST['txtPhone']);
		    $fathername=trim($_POST['txtFather']);
		    $mothername=trim($_POST['txtMother']);
		    $mobile=trim($_POST['txtMobile']);
		    $gender=trim($_POST['txtGender']);
		    $religion=trim($_POST['txtReligion']);
		    $nationality=trim($_POST['txtNationality']);
		    $category=trim($_POST['txtCategory']);
		    $rcategory=trim($_POST['choiceRcategory']);
		    $phyhandicap=trim($_POST['PhyHandicap']);
		    $ecoback=trim($_POST['EcoBackward']);
		    
		    $title=mysql_real_escape_string($title);
		    $fname=mysql_real_escape_string($fname);
		    $lname=mysql_real_escape_string($lname);
		    $dob=mysql_real_escape_string($dob);
		    $mname=mysql_real_escape_string($mname);
		    $gender=mysql_real_escape_string($gender);
		    $padress=mysql_real_escape_string($padress);
		    $cadress=mysql_real_escape_string($cadress);
		    $fathername=mysql_real_escape_string($fathername);
		    $mothername=mysql_real_escape_string($mothername);
		    $mobile=mysql_real_escape_string($mobile);
		    $religion=mysql_real_escape_string($religion);
		    $nationality=mysql_real_escape_string($nationality);
		    $category=mysql_real_escape_string($category);
		    $rcategory=mysql_real_escape_string($rcategory);
		    $phyhandicap=mysql_real_escape_string($phyhandicap);
		    $ecoback=mysql_real_escape_string($ecoback);
		    if($rcategory=="Yes")
		    {
		        $rcategory=1;
		    }
		    else {
		        $rcategory=0;
		    }
		    if($phyhandicap=="Yes")
		    {
		        $phyhandicap=1;
		    }
		    else {
		        $phyhandicap=0;
		    }
		    if($ecoback=="Yes")
		    {
		        $ecoback=1;
		    }
		    else {
		        $ecoback=0;
		    }
		    
		    $sql="INSERT INTO `student_details`( `title`,`firstname`, `middlename`,`dob`, `lastname`, `mName`, `fName`, `pAddress`, `cAddress`, `phone`, `mobile`, `gender`, `religion`, `nationality`,`category`,`isActive`,`reserve_cat`, `phy_han`, `eco_back`,`added_on`)
		                                VALUES ('$title','$fname','$mname','$dob','$lname','$mothername','$fathername','$padress','$cadress','$phone','$mobile','$gender','$religion','$nationality','$category','1','$rcategory','$phyhandicap','$ecoback',NOW())";
		    
		    $query=$this->db->query($sql);
		    if($query)
		    {
		        $this->session->set_userdata('status', "Success");
		        redirect('nav_controller/student_reg');
		    }
		    else {
		        $this->session->set_userdata('status', "Failed at db");
		        redirect('nav_controller/student_reg');
		    }  
		}
		
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
	
	
	public function loadDT_semester(){
	    $this->load->view('data_fragment/semesterData.php');
	}
	
	public function loadDT_trade(){
	    $this->load->view('data_fragment/tradeData.php');
	}
	public function loadDT_course(){
	    $this->load->view('data_fragment/courseData.php');
	}
	public function loadDT_session(){
	    $this->load->view('data_fragment/sessionData.php');
	}
	
	
	public function removeDT_examType()
	{
	    $temp=$_GET['id'];
	    $sql="DELETE FROM `exam_type` WHERE id='$temp'";
	   $query=$this->db->query($sql);
	   if($query)
	   {
	       $this->session->set_userdata('status', "Succesfully Deleted!");
	   }
	   else {
	       $this->session->set_userdata('status', "Failed!");
	   }
	}
	public function removeDT_department()
	{
	    $temp=$_GET['id'];
	    $sql="DELETE FROM `department` WHERE id='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status', "Succesfully Deleted!");
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_semester()
	{
	    $temp=$_GET['id'];
	    $sql="DELETE FROM `semester` WHERE id='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status', "Succesfully Deleted!");
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_trade()
	{
	    $temp=$_GET['id'];
	    $sql="DELETE FROM `trade` WHERE id='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status', "Succesfully Deleted!");
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_course()
	{
	    $temp=$_GET['id'];
	    $sql="DELETE FROM `course` WHERE id='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status', "Succesfully Deleted!");
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_session()
	{
	    $temp=$_GET['id'];
	    $sql="DELETE FROM `session` WHERE id='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status', "Succesfully Deleted!");
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	
	public function update_master_department(){
	    $this->load->helper(array('form', 'url'));
	    
	    $this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('txtDepartment', 'Department Name', 'required');
	    
	    
	    if ($this->form_validation->run() == FALSE)
	    {
	        $this->load->view('utility/department_master');
	    }
	    else
	    {
	        $flag=$_POST['postType'];
	        $department=$_POST['txtDepartment'];
	        $isActive=$_POST['ddlActive'];
	        if($flag!=""){
	            $sql = "UPDATE `department` SET
						name='$department',
						isActive='$isActive'
						WHERE id='$flag'
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully Updated!");
	            }
	        }else{
	            
	            $sql = "INSERT INTO `department`(`name`, `isActive`) VALUES
						('$department','$isActive')
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully saved!");
	            }
	        }
	        
	        redirect('nav_controller/master_department');
	    }
	    
	}
	public function loadDT_department(){
	    $this->load->view('data_fragment/departmentData.php');
	}
	
	public function update_master_semester(){
	    $this->load->helper(array('form', 'url'));
	    
	    $this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('txtSemester', 'Semester Name', 'required');
	    
	    
	    if ($this->form_validation->run() == FALSE)
	    {
	        $this->load->view('utility/semester_master');
	    }
	    else
	    {
	        $flag=$_POST['postType'];
	        $semester=$_POST['txtSemester'];
	        $isActive=$_POST['ddlActive'];
	        if($flag!=""){
	            $sql = "UPDATE semester SET
						name='$semester',
						isActive='$isActive'
						WHERE id='$flag'
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully Updated!");
	            }
	        }else{
	            
	            $sql = "INSERT INTO `semester`(`name`, `isActive`) VALUES
						('$semester','$isActive')
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully saved!");
	            }
	        }
	        
	        redirect('nav_controller/master_semester');
	    }
	    
	}
	public function update_master_trade(){
	    $this->load->helper(array('form', 'url'));
	    
	    $this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('txtTrade', 'Trade Name', 'required');
	    $this->form_validation->set_rules('txtAbv', 'Abv', 'required');
	    
	    
	    if ($this->form_validation->run() == FALSE)
	    {
	        $this->load->view('utility/trade_master');
	    }
	    else
	    {
	        $flag=$_POST['postType'];
	        $trade=$_POST['txtTrade'];
	        $abv=$_POST['txtAbv'];
	        $isActive=$_POST['ddlActive'];
	        if($flag!=""){
	            $sql = "UPDATE trade SET
						name='$trade',
                        abv='$abv',
						isActive='$isActive'
						WHERE id='$flag'
				";
	            $query = $this->db->query($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully Updated!");
	            }
	        }else{
	            
	            $sql = "INSERT INTO `trade`(`name`, `abv`,`isActive`) VALUES
						('$trade','$abv','$isActive')
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully saved!");
	            }
	        }
	        
	        redirect('nav_controller/master_trade');
	    }
	    
	}
	public function update_master_course(){
	    $this->load->helper(array('form', 'url'));
	    
	    $this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('txtCourse', 'Course Name', 'required');
	    $this->form_validation->set_rules('txtAbv', 'Abv', 'required');
	    
	    
	    if ($this->form_validation->run() == FALSE)
	    {
	        $this->load->view('utility/course_master');
	    }
	    else
	    {
	        $flag=$_POST['postType'];
	        $course=$_POST['txtCourse'];
	        $abv=$_POST['txtAbv'];
	        $isActive=$_POST['ddlActive'];
	        if($flag!=""){
	            $sql = "UPDATE course SET
						name='$course',
                        abv='$abv',
						isActive='$isActive'
						WHERE id='$flag'
				";
	            $query = $this->db->query($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully Updated!");
	            }
	        }else{
	            
	            $sql = "INSERT INTO `course`(`name`, `abv`,`isActive`) VALUES
						('$course','$abv','$isActive')
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully saved!");
	            }
	        }
	        
	        redirect('nav_controller/master_course');
	    }
	    
	}
	public function update_master_session(){
	    $this->load->helper(array('form', 'url'));
	    
	    $this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('txtSession', 'Session Name', 'required');
	    
	    
	    if ($this->form_validation->run() == FALSE)
	    {
	        $this->load->view('utility/session_master');
	    }
	    else
	    {
	        $flag=$_POST['postType'];
	        $session=$_POST['txtSession'];
	        $isActive=$_POST['ddlActive'];
	        if($flag!=""){
	            $sql = "UPDATE session SET
						name='$session',
						isActive='$isActive'
						WHERE id='$flag'
				";
	            $query = $this->db->query($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully Updated!");
	            }
	        }else{
	            
	            $sql = "INSERT INTO `session`(`name`,`isActive`) VALUES
						('$session','$isActive')
				";
	            $query = $this->db->query ($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully saved!");
	            }
	        }
	        
	        redirect('nav_controller/master_session');
	    }
	    
	}
	}
