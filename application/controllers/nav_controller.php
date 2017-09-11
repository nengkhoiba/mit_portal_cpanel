<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav_controller extends CI_Controller {

	//rohitkanta
	public function __construct(){
	    parent::__construct();
	    $sql="SELECT  `current_session_id` FROM  `college` WHERE id =1";
	    $query=$this->db->query($sql);
	    while ($result=mysql_fetch_array($query->result_id))
	    {
	        $session_id=$result['current_session_id'];
	    }
	    $this->session->set_userdata('session',$session_id);
	    if($this->session->userdata('Role')=='ADMIN'){
	        
	    }else{
	        redirect('home');
	    }
	}
	public function index(){
		$this->load->view('employee/landing');
	}
	public function change_password(){
		$this->load->view('main/change_password');
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
	
	public function student_list(){
	    $this->load->view('student/student_list');
	}
	public function student_admission(){
	    $this->load->view('student/student_admission');
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
	
	//neng
	public function master_page(){
		$this->load->view('utility/page_master');
	}
	//neng
	
	
	
}