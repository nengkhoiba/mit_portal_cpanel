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
				$this->session->set_userdata('Login', true);
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
		$this->session->set_userdata('Login', false);
		redirect('home');
	}

public function change_password(){
	if($this->session->userdata('Login')){
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('oldPassword', 'Old_Password', 'required');
		$this->form_validation->set_rules('newPassword', 'New_Password ', 'required|matches[confirmedPassword]'); 
		$this->form_validation->set_rules('confirmedPassword', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
			
			$oldp =$this->input->post('oldPassword');
			$newp =$this->input->post('newPassword');
			$confp =$this->input->post('confirmedPassword');
			
			if($oldp== null){
				$this->session->set_userdata('status', "Old Password cannot be empty"); //9= old password cannot be empty
				redirect('change-password');
			}
			else if($newp==null){
				$this->session->set_userdata('status', "New Password cannot be empty"); //1= new password cannot be empty
				redirect('change-password');
			}
			else if($confp== null){
				$this->session->set_userdata('status', "Confirmation Password cannot be empty"); //2= confirmation password cannot be empty
				redirect('change-password');
			}
			
		}
		else{
			$oldPass=$_POST['oldPassword'];
			$newPass=$_POST['newPassword'];
			$confPass=$_POST['confirmedPassword'];
			$ueid=$this->session->userdata('UEID');
			
			$sql="SELECT password FROM emp_login
			WHERE UEID='$ueid'
			";
			$query=$this->db->query($sql);
			while ($result=mysql_fetch_array($query->result_id)){
				$pass=$result['password'];
			}
			if($pass == $oldPass ){
				
				if($pass == $newPass){
					$this->session->set_userdata('status', "Old Password  and New Password cannot be same"); //3= old password  and new password cannot be same
					redirect('change-password');
				}
				else{
					
					$sql="UPDATE `emp_login` SET
					`password`='$newPass'
					WHERE UEID='$ueid'
					AND password='$oldPass'
					";
					$query=$this->db->query($sql);
					if($query)
					{
						$this->session->set_userdata('status', "Succesfully Updated!");
						redirect('change-password');
					}
					else{
						$this->session->set_userdata('status', "Something went wrong!");
						redirect('change-password');
					}
					
				}
				
			}
			else{
				$this->session->set_userdata('status', "Old Password incorrect"); //4= old password incorrect
				redirect('change-password');
			}
			
			
	  }	
	}else{
		redirect('change-password');
	}
	
}


}