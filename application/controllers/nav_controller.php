<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav_controller extends CI_Controller {

	//rohitkanta
	public function index(){
		$this->load->view('employee/landing');
	}
	//rohitkanta
	
	//thoisana
	public function emp_reg(){
		$this->load->view('employee/emp_reg');
	}
	public function master_department(){
	    $this->load->view('utility/department_master');
	}
	public function master_designation(){
		$this->load->view('utility/designation_master');
	}
	public function master_user(){
		$this->load->view('utility/user_master');
	}
	public function master_role(){
		$this->load->view('utility/role_master');
	}
	//thoisana
	
	//borison
	public function student_reg(){
		$this->load->view('student/student_registration');
	}
	public function master_semester(){
	    $this->load->view('utility/semester_master');
	}
	public function master_trade(){
	    $this->load->view('utility/trade_master');
	}
	public function master_course(){
	    $this->load->view('utility/course_master');
	}
	public function master_session(){
	    $this->load->view('utility/session_master');
	}
	public function master_examtype(){
		$this->load->view('utility/exam_type_master');
	}
	//borison
	
	
	
	
}