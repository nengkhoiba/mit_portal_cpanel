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
	    if($this->session->userdata('Login')){
	        
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
		$sitemapId=2;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
		$this->load->view('employee/emp_reg');
		}else{
			redirect('home');
		}
	}
	public function master_department(){
		$sitemapId=3;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('utility/department_master');
	    }else{
	    	redirect('home');
	    }
	}
	public function master_designation(){
		$sitemapId=4;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	
		$this->load->view('utility/designation_master');
		}else{
			redirect('home');
		}
	}
	public function master_user(){
		$sitemapId=5;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	}
		$this->load->view('utility/user_master');
	}
	public function master_role(){
		$sitemapId=6;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	
		$this->load->view('utility/role_master');
		}else{
			redirect('home');
		}
	}
	public function exam_data(){
		$sitemapId=15;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	
		$this->load->view('student/exam_data_entry');
		}else{
			redirect('home');
		}
	}
	//thoisana
	
	//borison
	public function student_reg(){
		$sitemapId=1;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	
		$this->load->view('student/student_registration');
		}else{
			redirect('home');
		}
	}
	
	public function student_list(){
		
		$sitemapId=14;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('student/student_list');
	    }else{
	    	redirect('home');
	    }
	}
	public function student_admission(){
		
		$sitemapId=13;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('student/student_admission');
	    }else{
	    	redirect('home');
	    }
	}
	
	public function master_semester(){
		
		$sitemapId=7;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('utility/semester_master');
	    }else{
	    	redirect('home');
	    }
	}
	public function master_trade(){
		
		$sitemapId=8;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('utility/trade_master');
	    }else{
	    	redirect('home');
	    }
	}
	public function master_course(){
		
		$sitemapId=9;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('utility/course_master');
	    }else{
	    	redirect('home');
	    }
	}
	public function master_session(){
		$sitemapId=11;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
	    $this->load->view('utility/session_master');
	    }else{
	    	redirect('home');
	    }
	}
	public function master_examtype(){
		
		$sitemapId=10;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
		$this->load->view('utility/exam_type_master');
		}else{
			redirect('home');
		}
	}
	//borison
	
	//neng
	public function master_page(){
		
		$sitemapId=12;
		$roleID=$this->session->userdata('RoleID');
		$sql="SELECT * FROM `page_manager` WHERE site_map_id='$sitemapId' AND role_id='$roleID' AND isActive=1";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
		$this->load->view('utility/page_master');
		}else{
			redirect('home');
		}
	}
	//neng
	
	
	
}