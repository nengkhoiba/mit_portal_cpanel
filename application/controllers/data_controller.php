<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_controller extends CI_Controller {

//athen
	public function student_reg(){  
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('txtFirstName', 'First Name', 'alpha|required',array("required"=>"please enter firstname"));
		$this->form_validation->set_rules('txtTitle','Title','required',array("required"=>"please choose a title"));
		$this->form_validation->set_rules('OptCourse', 'Course', 'is_natural_no_zero|required',array("required"=>"please choose a course"));
		$this->form_validation->set_rules('OptTrade', 'Trade', 'is_natural_no_zero|required',array("required"=>"please choose a Trade"));
		$this->form_validation->set_rules('OptStudentType', 'Semester', 'is_natural_no_zero|required',array("required"=>"please choose a Semester"));	
		$this->form_validation->set_rules('txtlastName', 'Last Name', 'alpha|required');
		$this->form_validation->set_rules('txtChallan', 'Transcation Details', 'required');
		$this->form_validation->set_rules('dateDOB', 'Date of birth', 'required');
		$this->form_validation->set_rules('txtPermanentAddress', 'Permanent Adress', 'required');
		$this->form_validation->set_rules('txtCAdress', 'Communication Adress', 'required');
		$this->form_validation->set_rules('txtFather', 'Father Name ', 'required');
		$this->form_validation->set_rules('txtMother', 'Mother Name', 'required');
		$this->form_validation->set_rules('txtPhone', 'Residence Phone no.', 'max_length[13]|min_length[7]|required');
		$this->form_validation->set_rules('txtMobile', 'Mobile no', 'max_length[13]|min_length[10]|required');
		$this->form_validation->set_rules('txtReligion', 'Religion', 'alpha|required');
		$this->form_validation->set_rules('txtNationality', 'Nationality', 'alpha|required');
		$this->form_validation->set_rules('txtCategory', 'Category', 'alpha|required');
		$this->form_validation->set_rules('OptGender', 'Gender', 'required',array("required"=>"please choose a gender"));
		$this->form_validation->set_rules('OptRcategory', ' ', 'required',array("required"=>"please choose an option"));
		$this->form_validation->set_rules('OptPhyHandicap', ' ', 'required',array("required"=>"please choose an option"));
		$this->form_validation->set_rules('OptEcoBackward', ' ', 'required',array("required"=>"please choose an option"));
		$this->form_validation->set_rules('studentPhoto', 'Photo', 'required');
	
		
		if ($this->form_validation->run() == FALSE)
		{
		    
		    $this->load->view('student/student_registration.php');
		    
		}
		else
		{
		    $course=mysql_real_escape_string(trim($_POST['OptCourse']));
		    $trade=mysql_real_escape_string(trim($_POST['OptTrade']));
		    $challan=mysql_real_escape_string(trim($_POST['txtChallan']));
		    $stutype=mysql_real_escape_string(trim($_POST['OptStudentType']));
		    $mu_roll=mysql_real_escape_string(trim($_POST['txtMuRoll']));
		    $reg_no=mysql_real_escape_string(trim($_POST['txtMuRegNo']));
		    $reg_year=mysql_real_escape_string(trim($_POST['txtRegYear']));
		    $title=mysql_real_escape_string(trim($_POST['txtTitle']));
		    $fname=mysql_real_escape_string(trim($_POST['txtFirstName']));
		    $lname=mysql_real_escape_string(trim($_POST['txtlastName']));
		    $mname=mysql_real_escape_string(trim($_POST['txtMiddleName']));
		    $dob=mysql_real_escape_string(trim($_POST['dateDOB']));
		    $padress=mysql_real_escape_string(trim($_POST['txtPermanentAddress']));
		    $cadress=mysql_real_escape_string(trim($_POST['txtCAdress']));
		    $phone=mysql_real_escape_string(trim($_POST['txtPhone']));
		    $fathername=mysql_real_escape_string(trim($_POST['txtFather']));
		    $mothername=mysql_real_escape_string(trim($_POST['txtMother']));
		    $mobile=mysql_real_escape_string(trim($_POST['txtMobile']));
		    $gender=mysql_real_escape_string(trim($_POST['OptGender']));
		    $religion=mysql_real_escape_string(trim($_POST['txtReligion']));
		    $nationality=mysql_real_escape_string(trim($_POST['txtNationality']));
		    $category=mysql_real_escape_string(trim($_POST['txtCategory']));
		    $rcategory=mysql_real_escape_string(trim($_POST['OptRcategory']));
		    $phyhandicap=mysql_real_escape_string(trim($_POST['OptPhyHandicap']));
		    $ecoback=mysql_real_escape_string(trim($_POST['OptEcoBackward']));

		    $photo=mysql_real_escape_string(trim($_POST['studentPhoto']));

		    if($stutype==4)
		    {
		        $stutype=mysql_real_escape_string(trim($_POST['OptSemester']));
		        
		    }
		    $flag=trim($_POST['postType']);
		    if($flag!=null){
		        $sql = "UPDATE `student_details` SET   `title`='$title',
                                                       `firstname`='$fname',
                                                        `middlename`='$mname',
                                                        `lastname`='$lname',
                                                        `mName`='$mothername',
                                                        `fName`='$fathername',
                                                        `pAddress`='$padress',
                                                        `cAddress`='$cadress',
                                                        `phone`='$phone',
                                                        `mobile`='$mobile',
                                                        `gender`='$gender',
                                                        `dob`='$dob',
                                                        `religion`='$religion',
                                                        `nationality`='$nationality',
                                                        `category`='$category',
                                                        `reserve_cat`='$rcategory',
                                                        `phy_han`='$phyhandicap',
                                                        `eco_back`='$ecoback',
                                                        `photo`='$photo'
                                                        WHERE USID='$flag' ";
                            		        $query = $this->db->query($sql);
                            		        if($query){
                            		            $sql1="UPDATE `std_col_relation` SET
                                                                     `MU_roll`='$mu_roll',
                                                                    `reg_no`='$reg_no',
                                                                    `reg_year`='$reg_year',
                                                                    `course_id`='$course',
                                                                    `trade_id`='$trade'
                                                                     WHERE USID='$flag'";
                            		            $query1=$this->db->query($sql1);
                            		            if($query1)
                            		            {
                            		                $session=$this->session->userdata('session');
                            		                $sql2="UPDATE `admission_std_relation` SET `sem_id`='$stutype' WHERE USID='$flag' AND session_id='$session'";
                            		                $query2=$this->db->query($sql2);
                            		                if($query2)
                            		                {
                            		                    $this->session->set_userdata('status', "Succesfully Updated!");
                            		                    redirect('student/registration');
                            		                }
                            		                else {
                            		                    $this->session->set_userdata('status', "Failed at Database level3");
                            		                    $this->load->view('student/student_registration');
                            		                }
                            		                
                            		            }
                            		            else {
                            		                $this->session->set_userdata('status', "Failed at Database level2");
                            		                $this->load->view('student/student_registration');
                            		            }
                            		            
                            		            
                            		            
                            		        }
                            		        else
                            		        {
                            		            
                            		            $this->session->set_userdata('status', "Failed at Database level1");
                            		            $this->load->view('student/student_registration');
                            		            
                            		        }
}
		    else{
		        
		        
		        $sql="INSERT INTO `student_details`( `title`,`firstname`, `middlename`,`dob`, `lastname`, `mName`, `fName`, `pAddress`, `cAddress`, `phone`, `mobile`, `gender`, `religion`, `nationality`,`category`,`isActive`,`reserve_cat`, `phy_han`, `eco_back`,`photo`,`added_on`)
		                                VALUES ('$title','$fname','$mname','$dob','$lname','$mothername','$fathername','$padress','$cadress','$phone','$mobile','$gender','$religion','$nationality','$category','1','$rcategory','$phyhandicap','$ecoback','$photo',NOW())";
		        
		        $query=$this->db->query($sql);
		        if($query)
		        {
		            $sql1="SELECT USID FROM `student_details` 
                            ORDER BY student_details.USID DESC limit 1";
		            $query1=$this->db->query($sql1);
		            while($result=mysql_fetch_array($query1->result_id))
		            {
		                $usid=$result['USID'];
		                $sql2="INSERT INTO `std_col_relation`(`USID`, `MU_roll`, `reg_no`, `reg_year`, `course_id`, `trade_id`,`isActive`)
                                                      VALUES ('$usid','$mu_roll','$reg_no','$reg_year','$course','$trade','1')";
		                $query2=$this->db->query($sql2);
		                if($query2)
		                {
		                    $session=$this->session->userdata('session');
		                    $sql3="INSERT INTO `admission_std_relation`(`USID`, `session_id`, `sem_id`,`date_of_admission`,`other`,`isActive`) 
                                                                VALUES ('$usid','$session','$stutype',CURDATE(),'$challan','1')";
		                    $query3=$this->db->query($sql3);
		                    if($query3)
		                    {
		                        $this->session->set_userdata('status', "Successfully entered");
		                        redirect('student/registration');
		                    }
		                }
		            }
		           
		        }
		        else {
		            $this->session->set_userdata('status', "Failed at db");
		           $this->load->view('student/student_registration.php');
		        }  
		    
		    }//insertcode
		   
		}//form sucess code
		
	}//end of student_reg()

	
	
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
	
	public function loadDT_admission(){
	    $this->load->view('data_fragment/AdmissionData.php');
	}
	public function loadDT_studentmodal(){
	    $this->load->view('data_fragment/student_modalData.php');
	}
	public function loadDT_Master_examType(){
	    $this->load->view('data_fragment/examType_MasterData.php');
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
	//athen
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
	//athen
	public function removeDT_semester()
	{
	    $temp=$_GET['id'];
	    //$sql="DELETE FROM `semester` WHERE id='$temp'";
	    $sql="UPDATE `semester` SET
                isActive='0' WHERE
                  id ='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status',null);
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_trade()
	{
	    $temp=$_GET['id'];
	    $sql="UPDATE `trade` SET
                isActive='0' WHERE
                  id ='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status',null);
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_student()
	{
	    $id=trim($_GET['id']);
	    $sql="UPDATE `student_details` SET isActive='0' WHERE USID='$id'";
	    $query = $this->db->query($sql);
	    if($query)
	    {  
	        $sql2="UPDATE `std_col_relation` SET isActive='0' WHERE USID='$id'";
	            $query2=$this->db->query($sql2);
	            $this->session->set_userdata('removedt_student_status',null);
	        
	    }
	}
	public function removeDT_course()
	{
	    $temp=$_GET['id'];
	   // $sql="DELETE FROM `course` WHERE id='$temp'";
	    $sql="UPDATE `course` SET
                isActive='0' WHERE
                  id ='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status',null);
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
	}
	public function removeDT_session()
	{
	    $temp=$_GET['id'];
	    //$sql="DELETE FROM `session` WHERE id='$temp'";
	    $sql="UPDATE `session` SET
                isActive='0' WHERE
                  id ='$temp'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $this->session->set_userdata('status',null);
	    }
	    else {
	        $this->session->set_userdata('status', "Failed!");
	    }
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
	
	public function update_admission(){
	    $this->load->helper(array('form', 'url'));
	    
	    $this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('dateAdmission', 'Date of Admission ', 'required');
	    $this->form_validation->set_rules('txtChallan', 'Transcation Id/Challan', 'required');
	    $session=$this->session->userdata('session');
	    
	    if ($this->form_validation->run() == FALSE)
	    {
	        $this->load->view('student/student_admission');
	    }
	    else
	    {
	        $date=mysql_real_escape_string(trim($_POST['dateAdmission']));
	        $challan=mysql_real_escape_string(trim($_POST['txtChallan']));	        
	        $id=mysql_real_escape_string(trim($_POST['postType']));
	        $sem=mysql_real_escape_string(trim($_POST['semid']));
	        $edit=mysql_real_escape_string(trim($_POST['edit']));
	        if($edit!=""){
	            $sql ="UPDATE `admission_std_relation` SET
                                `date_of_admission`='$date',
                                `other`='$challan',
                                 `isActive`=1
                                     WHERE USID='$id' AND session_id='$session'";
	            $query = $this->db->query($sql);
	            if($query){
	                $this->session->set_userdata('status', "Succesfully Updated!");
	                redirect('student/admission');
	            }
	            else {
	                $this->session->set_userdata('status', "Failed To Update!!!");
	                $this->load->view('student/student_admission');
	            }
	        }else{
	            
	            $sql ="INSERT INTO `admission_std_relation`(`USID`, `session_id`, `sem_id`, `date_of_admission`, `other`, `isActive`) 
                                                    VALUES ('$id','$session','$sem','$date',$challan,'1')";
	            $query = $this->db->query($sql);
	            if($query){
	                $this->session->set_userdata('status', "Sucessfully Admitted to ".'Semester '.$sem.' on '.$date);
	                redirect('student/admission');
	            }
	            else {
	                $this->session->set_userdata('status', "Failed To Update!!!");
	                $this->load->view('student/student_admission');
	            }
	        }  
	      
	    }
	    
	}
	public function loadDT_student(){
	    $this->load->view('data_fragment/studentData.php');
	}
	
	public function deleteDT_student(){
	    $id=trim($_GET['id']);
	    $sql="UPDATE `student_details` SET `isActive`=0 WHERE USID='$id'";
	    $query = $this->db->query($sql);
	    if($query)
	    {
	        $sql1="UPDATE `admission_std_relation` SET `isActive`=0 WHERE USID='$id'";
	        $query1=$this->db->query($sql1);
	        if($query1)
	        {
	            $sql2="UPDATE `std_col_relation` SET `isActive`=0 WHERE USID='$id'";
	            $query2=$this->db->uery($query2);
	           
	        }
	    }
	}
	public function update_current_session()
	{
	    $id=trim($_GET['id']);
	    $sql="UPDATE `session` SET
                        `isActive`='1' WHERE id='$id'";
	    $query=$this->db->query($sql);
	    if($query)
	    {
	        $sql1="UPDATE `session` SET
	        `isActive`='0' WHERE id!='$id'";
	        $query1=$this->db->query($sql1);
	        if ($query1)
	        {
	            $sql2="UPDATE `college` SET `current_session_id`='$id' WHERE id=1";
	            $query2=$this->db->query($sql2);
	            if($query2)
	            {
	                redirect('utility/session');
	                
	            }
	        }
	    }
	    else {
	        $this->load->view('utility/session_master');
	    }
	    
	}
	//Athen
	
	


	// Start Employee Registration
	public  function emp_reg(){
		
		
		
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtName', 'Name', 'required');
		$this->form_validation->set_rules('txtAddress', 'Address', 'required');
		$this->form_validation->set_rules('txtMobile', 'Mobile', 'required');
		$this->form_validation->set_rules('txtQualification', 'Qualification', 'required');
		$this->form_validation->set_rules('txteMail', 'eMail', 'required');
		$this->form_validation->set_rules('optGender', 'Gender', 'required');
		
		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_userdata('lanba', "Unsuccessful");
			redirect('nav_controller/emp_reg');
		}
		else
		{
			$name = trim($_POST['txtName']);
			$add = trim($_POST['txtAddress']);
			$mobile = trim($_POST['txtMobile']);
			$qulf = trim($_POST['txtQualification']);
			$email = trim($_POST['txteMail']);
			$gender = trim($_POST['optGender']);
			
			
			$flag=mysql_real_escape_string(trim($_POST['postType']));
			//$ueid=mysql_real_escape_string(trim($_GET['']));
			$name = mysql_real_escape_string($name);
			$add = mysql_real_escape_string($add);
			$mobile =mysql_real_escape_string($mobile);
			$qulf = mysql_real_escape_string($qulf);
			$email = mysql_real_escape_string($email);
			$gender = mysql_real_escape_string($gender);
			
			
			if($flag!=""){
				$sql="UPDATE `emp_details` SET 
					  `name`='$name',
    				  `address`='$add',
					  `mobile`='$mobile',
					  `qualification`='$qulf',
					  `email`='$email', 
					  `gender`='$gender'
					   WHERE UEID = '$flag'
						";
				
				$query = $this->db->query ($sql);
				
				if($query){
					$this->session->set_userdata('status', "Succesfully Updated!");
					redirect('nav_controller/emp_reg');
				}
			}else{
				$sql1 = "SELECT * from emp_login
				WHERE UEID='$UEID'
				";
				$query1 = $this->db->query ($sql1);
				$duplicate=$query1->num_rows();
				if($duplicate==0)
				{
					$sql = "INSERT INTO emp_details(name,address,mobile,qualification,email,gender,isActive)
					VALUE ('$name','$add','$mobile','$qulf','$email','$gender','1')  ";
					$query = $this->db->query($sql);
					if($query){
						
						$str = $name;
						$string= (explode(" ",$str));
						$loginName = $string[0];
						
						$sql1= "SELECT UEID FROM emp_details ORDER BY emp_details.UEID DESC LIMIT 1";
						$query1 = $this->db->query($sql1);
						
						while($result=mysql_fetch_array($query1->result_id)){
							$ueid=$result['UEID'];
							
						}
						
						$this->session->set_userdata('status', "Success");
						redirect('nav_controller/emp_reg');
					}else{
						
						$this->session->set_userdata('lanba', "Unsuccessful");
						redirect('nav_controller/emp_reg');
					}
				}
				else{
					$this->session->set_userdata('lanba', "Unsuccessful");
					redirect('nav_controller/emp_reg');
				}
			}
			
			
			
			
			
			
			
			
			
		
			
			
			
			
		}
		
		
	}
	
	public function loadDT_empData(){
		$this->load->view('data_fragment/emp_list.php');
	}
	//End Employee Reistration
	
	// START  master exam type
	
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
			$flag=mysql_real_escape_string(trim($_POST['postType']));
			
			$examType=mysql_real_escape_string(trim($_POST['txtExamtypeName']));
			$isActive=mysql_real_escape_string(trim($_POST['ddlActive']));
			if($flag!=""){
				$sql = "UPDATE exam_type SET
				name='$examType',
				isActive='$isActive'
				WHERE id='$flag'
				";
				$query = $this->db->query ($sql);
				if($query){
					$this->session->set_userdata('status', "Succesfully Updated!");
				}
			}else{
				
				$sql = "INSERT INTO `exam_type`(`name`, `isActive`) VALUES
				('$examType','$isActive')
				";
				$query = $this->db->query ($sql);
				if($query){
					$this->session->set_userdata('status', "Succesfully saved!");
				}
			}
			
			redirect('nav_controller/master_examtype');
		}
		
	}
	public function loadDT_examType(){
		$this->load->view('data_fragment/examTypeDataModal.php');
	}
	
	
	//END
	
	//START ROLE  MASTER
	
	public function update_master_role(){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtRoleName', 'Role Name', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('utility/role_master');
		}
		else
		{
			$flag=mysql_real_escape_string(trim($_POST['postType']));
			$role=mysql_real_escape_string(trim($_POST['txtRoleName']));
			$isActive=mysql_real_escape_string(trim($_POST['ddlActive']));
			if($flag!=""){
				$sql = "UPDATE role SET
				name='$role',
				isActive='$isActive'
				WHERE id='$flag'
				";
				$query = $this->db->query ($sql);
				if($query){
					$this->session->set_userdata('status', "Succesfully Updated!");
				}
			}else{
				
				$sql = "INSERT INTO `role`(`name`, `isActive`) VALUES
				('$role','$isActive')
				";
				$query = $this->db->query ($sql);
				if($query){
					$this->session->set_userdata('status', "Succesfully saved!");
				}
			}
			
			redirect('nav_controller/master_role');
		}
		
	}
	public function loadDT_role(){
		$this->load->view('data_fragment/roleData.php');
	}
	
	public function deleteDT_role(){
		$id=$_GET['id'];
		$sql="DELETE FROM `role` WHERE id='$id'";
		$query = $this->db->query($sql);
	}
	
	//END ROLE MASTER
	
	
	
	//START DEPARTMENT MASTER
	
	public function update_master_department(){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtDepartmentName', 'Department Name', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('utility/department_master');
		}
		else
		{
			$flag=mysql_real_escape_string(trim($_POST['postType']));
			$dept=mysql_real_escape_string(trim($_POST['txtDepartmentName']));
			$isActive=mysql_real_escape_string(trim($_POST['ddlActive']));
			if($flag!=""){
				$sql = "UPDATE department SET
				name='$dept',
				isActive='$isActive'
				WHERE id='$flag'
				";
				$query = $this->db->query ($sql);
				if($query){
					$this->session->set_userdata('status', "Succesfully Updated!");
				}
			}else{
				
				$sql = "INSERT INTO `department`(`name`, `isActive`) VALUES
				('$dept','$isActive')
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
	
	public function deleteDT_department(){
		$id=$_GET['id'];
		$sql="DELETE FROM `department` WHERE id='$id'";
		$query = $this->db->query($sql);
	}
	
	//END DEPARTMENT MASTER
	
	//START DESIGNATION MASTER
	
	public function update_master_designation(){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtDesignationName', 'Designation Name', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('utility/designation_master');
		}
		else
		{
			$flag=mysql_real_escape_string(trim($_POST['postType']));
			$desig=mysql_real_escape_string(trim($_POST['txtDesignationName']));
			$isActive=mysql_real_escape_string(trim($_POST['ddlActive']));
			if($flag!=""){
				$sql = "UPDATE designation SET
				name='$desig',
				isActive='$isActive'
				WHERE id='$flag'
				";
				$query = $this->db->query ($sql);
				if(query){
					$this->session->set_userdata('status', "Succesfully Updated!");
				}
			}else{
				
				$sql = "INSERT INTO `designation`(`name`, `isActive`) VALUES
				('$desig','$isActive')
				";
				$query = $this->db->query ($sql);
				if($query){
					$this->session->set_userdata('status', "Succesfully saved!");
				}
			}
			
			redirect('nav_controller/master_designation');
		}
		
	}
	public function loadDT_designation(){
		$this->load->view('data_fragment/designationData.php');
	}
	
	public function deleteDT_designation(){
		$id=$_GET['id'];
		$sql="DELETE FROM `designation` WHERE id='$id'";
		$query = $this->db->query($sql);
	}
	
	//END DESIGNATION MASTER
	
	
	//START OF USER-MASTER
	public function update_master_user(){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtUsername', ' Username', 'required');
		$this->form_validation->set_rules('txtPassword', ' Password', 'required|matches[txtConfirmPassword]');
		$this->form_validation->set_rules('txtConfirmPassword', ' Confirmation Password', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('nav_controller/master_user');
		}
		else
		{
			$flag=mysql_real_escape_string(trim($_POST['postType']));
			$UEID=mysql_real_escape_string(trim($_POST['ddlEmployee']));
			$user=mysql_real_escape_string(trim($_POST['txtUsername']));
			$pass=mysql_real_escape_string(trim($_POST['txtPassword']));
			$cpass=mysql_real_escape_string(trim($_POST['txtConfirmPassword']));
			$dept_id=mysql_real_escape_string(trim($_POST['optDept']));
			$deg_id=mysql_real_escape_string(trim($_POST['optDesig']));
			$role_id=mysql_real_escape_string(trim($_POST['optRole']));
			
				
				
				if($flag!=""){
					$sql = "UPDATE emp_login SET
					user='$user',
					password='$pass'
					WHERE UEID='$UEID'
					";
					$query = $this->db->query ($sql);
					/*if($query){
						$this->session->set_userdata('status', "Succesfully Updated!");
					}*/
					$sql2 = "UPDATE emp_col_relation SET
					dept_id='$dept_id',
					deg_id='$deg_id',
					role_id='$role_id'
					
					WHERE UEID='$UEID'
					";
					$query2 = $this->db->query ($sql);
					if($query2 && $query){
						$this->session->set_userdata('status', "Succesfully Updated!");
					}
				}else{
					$sql1 = "SELECT * from emp_login
					WHERE UEID='$UEID'
					";
					$query1 = $this->db->query ($sql1);
					$duplicate=$query1->num_rows();
					if($duplicate==0){
					$sql = "INSERT INTO `emp_login`(`UEID`,`user`,`password`, `isFirst`) VALUES
					('$UEID','$user','$pass','1')
					";
					$sql3="INSERT INTO `emp_col_relation`(`UEID`, `dept_id`, `deg_id`, `role_id`) VALUES ($UEID,$dept_id,$deg_id,$role_id)";
					$query = $this->db->query ($sql);
					$query3 =$this->db->query($sql3);
					if($query){
						$this->session->set_userdata('status', "Succesfully saved!");
					}
					
					
					}else{
						$this->session->set_userdata('status', "User already created!");
					}
				}
				
				redirect('nav_controller/master_user');
			
			
		}
		
	}
	public function loadDT_user(){
		$this->load->view('data_fragment/user_master_data.php');
	}
	
	public function deleteDT_user(){
		$id=$_GET['id'];
		$sql="DELETE FROM `emp_login` WHERE UEID='$id'";
		$query = $this->db->query($sql);
	}
	
	//END USERMASTER
	
	//PAGE MASTER
	public function loadDT_page(){
		$this->load->view('data_fragment/pageData.php');
	}
	public function update_pageMaster(){
		$id=$_GET['id'];
		$role=$_GET['role'];
		$status=$_GET['status'];
		
		$sql1 = "SELECT id FROM page_manager WHERE site_map_id='$id' AND role_id= '$role'
		";
		$query1 = $this->db->query ($sql1);
		$duplicate=$query1->num_rows();
		if($duplicate==0){
			$sql="INSERT INTO `page_manager`(`site_map_id`, `role_id`, `isActive`) 
					VALUES ('$id','$role','$status')";
			$query = $this->db->query ($sql);
		}else{
			$sql2 = "UPDATE page_manager 
					SET 
					isActive='$status'
					WHERE site_map_id='$id'
					AND role_id='$role'
			";
			$query2 = $this->db->query ($sql2);
		}
		
	
	}
	
	//END PAGE MASTER
	
	
	// START EXAM DATA ENTRY 
	
	public function update_exam_data_entry(){
	
		
			$exam_type=$_GET['q'];
			$usid=trim($_GET['k']);
			$sem_id = trim($_GET['l']);
			$session_id = trim($_GET['n']);
			$status = trim($_GET['o']);
			$mark_score=trim($_GET['p']);
			$grand_total=trim($_GET['r']);
			$mark_sheet_number=trim($_GET['s']);
			$dor=trim($_GET['t']);
			$doe=trim($_GET['u']);
			$dop=trim($_GET['v']);
			
			
			$usid=mysql_real_escape_string($usid);
			$sem_id = mysql_real_escape_string($sem_id);
			$session_id = mysql_real_escape_string($session_id);
			$status = mysql_real_escape_string($status);
			$mark_score=mysql_real_escape_string($mark_score);
			$grand_total=mysql_real_escape_string($grand_total);
			$mark_sheet_number=mysql_real_escape_string($mark_sheet_number);
			$dor=mysql_real_escape_string($dor);
			$doe=mysql_real_escape_string($doe);
			$dop=mysql_real_escape_string($dop);
				
			
			$dor = date("Y-m-d", strtotime($dor));
			$doe= date("Y-m-d", strtotime($doe));
			$dop= date("Y-m-d", strtotime($dop));
			
			$sql= "SELECT id
					 FROM `exam_details` WHERE 
					 USID='$usid'
					 AND session_id='$session_id'  
					 AND exam_type_id='$exam_type' 
					 AND sem_id='$sem_id'
					AND isActive=1";
			$query=$this->db->query($sql);
			$flag = $query->num_rows();
			if($flag>0){
				
				$sql2 = "UPDATE `exam_details` SET
				`exam_type_id`='$exam_type',
				`status`='$status',
				`mark_scored`='$mark_score',
				`Grand_total`='$grand_total',
				`marksheet_no`='$mark_sheet_number',
				`DOE`='$doe',
				`DOR`='$dor',
				`DOP`='$dop'
				WHERE
				USID='$usid'
				AND session_id='$session_id'
				AND exam_type_id='$exam_type'
				AND  sem_id='$sem_id'
				";
				$query2 = $this->db->query ($sql2);
				if($query2){
					$this->session->set_userdata('status', "Succesfully Updated!");
				}
				else {
					$this->session->set_userdata('status', "Unable to Update !");
				}
				
			
				
			}
			
			else {
				
				$sql1 = "INSERT INTO `exam_details`( `sem_id`, `exam_type_id`, `USID`, `session_id`, `status`, `mark_scored`, `Grand_total`, `marksheet_no`, `DOE`, `DOR`, `DOP`, `isActive`)
				VALUES ('$sem_id','$exam_type','$usid','$session_id','$status','$mark_score','$grand_total','$mark_sheet_number','$doe','$dor','$dop','1')
				";
				$query1 = $this->db->query ($sql1);
				if($query1){
					$this->session->set_userdata('status', "Succesfully saved!");
				}
				else {
					$this->session->set_userdata('status', "Something went wrong !");
				}
				
			}
	}
	
	
	public function loadDT_examData(){
		$this->load->view('data_fragment/examTypeData.php');
	}
	public function loadDT_examDataModal(){
		$this->load->view('data_fragment/examTypeDataModal.php');
	}
	
	

	
	
	}
	
	
	
	
	
	
