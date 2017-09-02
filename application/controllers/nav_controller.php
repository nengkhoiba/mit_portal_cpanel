<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav_controller extends CI_Controller {


	public function student_reg(){
		$this->load->view('student/student_registration.php');
	}

	public function emp_reg(){
		$this->load->view('employee/emp_reg.php');
	}
	public function master_examtype(){
		$this->load->view('utility/exam_type_master');
	}
	
}