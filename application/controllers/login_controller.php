<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function login(){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('main/login.php');
		}
		else{
			
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$sql="SELECT el.UEID AS UEID,ed.name AS empName,ecr.role_id AS role_id,r.name AS role   FROM emp_login el
				LEFT JOIN emp_details ed ON ed.UEID=el.UEID
				LEFT JOIN emp_col_relation ecr ON ecr.UEID=el.UEID
				LEFT JOIN role r ON r.id=ecr.role_id
				WHERE
				el.user='$username'
				AND el.password='$password'
				AND ed.isActive=1 ";
			$query=$this->db->query($sql);
			
			if($query->num_rows>0){
				
				while($result=mysql_fetch_array($query->result_id)){
					$UEID=$result['UEID'];
					$empName=$result['empName'];
					$role_id=$result['role_id'];
					$role=$result['role'];
				}
				
				$this->session->set_userdata('UEID', $UEID);
				$this->session->set_userdata('User', $empName);
				$this->session->set_userdata('Role', $role);
				$this->session->set_userdata('RoleID', $role_id);
				redirect('landing');
			}else{
				$this->session->set_userdata('status', "Incorrect username or password!");
				redirect('home');
			}
			
			
		}
		
		
	}
	public function logout(){
		$this->session->set_userdata('UEID', null);
		$this->session->set_userdata('User', null);
		$this->session->set_userdata('Role', null);
		$this->session->set_userdata('RoleID', null);
		redirect('home');
	}

public function change_password(){
	
	
}


}