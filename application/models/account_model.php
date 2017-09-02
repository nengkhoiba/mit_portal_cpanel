<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account_model extends CI_Model{
    
	function __construct(){
		parent::__construct();
	}
	function generateRandomString($length = 20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz981u9unakhkkjhJHJGYFUFGKUGWW';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	function register($name,$email,$role,$password){

		$activation_code = $this->generateRandomString(20);
		
		$sqltest="select id from login where email='$email'";
		$reply = $this->db->query($sqltest);
		$flag=$reply->num_rows();
		
		if($flag==0){
		$sql = "INSERT INTO `login`(`email`, `password`, `activation_key`, `created_on`) VALUES ('$email','$password','$activation_code',CURDATE())";
		
		$query = $this->db->query($sql);
		
		
		
		if($query)
		{
		
			$sql = "SELECT id
					FROM  login
					ORDER BY  login.id DESC
					LIMIT 1";
		
			$query1 = $this->db->query($sql);
		
			if($query1){
				while($result=mysql_fetch_array($query1->result_id)){
					$id=$result['id'];
					$this->load->library('email');
						
						
					$this->email->from('newsflyp@mobimp.com','newsflyp@mobimp');
						
					$this->email->to($email);
					$this->email->subject('Confirm Email');
						
					$url=base_url()."account/activate?q=".$email."&c=".$activation_code;
					$logo=base_url()."images/logo.png";
					$data['url']=$url;
					$data['logo']=$logo;
					$msg = $this->load->view('email_templates/confirmation_email',$data,TRUE);
					$this->email->message($msg);
					$this->email->set_mailtype("html");
					$this->email->send();
				}
				$sql3 = "SELECT id
					FROM  user
					where email='$email'
					ORDER BY  user.id DESC
					LIMIT 1";
				
				$query3 = $this->db->query($sql3);
				$eFlag=$query3->num_rows();
				if($eFlag>0)
				{
					$sql = "UPDATE user set id='$id' , name='$name' , role='$role' where email='$email'";
					$query2 = $this->db->query($sql);
				}else{$sql = "INSERT INTO `user`(`id`, `name`, `email`, `role`, `device_id`) VALUES ('$id','$name','$email','$role','no')";
				$query2 = $this->db->query($sql);}
				
		
				if($query2)
				{
					$data['status']="Now you have to activate your Account!";
					$data['info']="Click on the link in email which we have just sent you. Check your Inbox, if you can't find our email, look through Spam folder";
					$this->load->view('success',$data);
		
				}
				else {
		
					$data['status']="Something went wrong!";
					$data['info']="Please try again!";
					$this->load->view('success',$data);
				}
			}
		}
	
		
		}else{
			
			$data['status']="Your email is already registered!";
			$data['info']="If you forget your password. Click forgot password on login section to recover.";
			$this->load->view('success',$data);
		}
	}
	function registerFromMobile($name,$email,$role,$password){
		$this->output->set_content_type('application/json');
		$activation_code = $this->generateRandomString(20);
	
		$sqltest="select id from login where email='$email'";
		$reply = $this->db->query($sqltest);
		$flag=$reply->num_rows();
	
		if($flag==0){
			$sql = "INSERT INTO `login`(`email`, `password`, `activation_key`, `created_on`) VALUES ('$email','$password','$activation_code',CURDATE())";
	
			$query = $this->db->query($sql);
	
	
	
			if($query)
			{
	
				$sql = "SELECT id
					FROM  login
					ORDER BY  login.id DESC
					LIMIT 1";
	
				$query1 = $this->db->query($sql);
	
				if($query1){
					while($result=mysql_fetch_array($query1->result_id)){
						$id=$result['id'];
						$this->load->library('email');
	
	
						$this->email->from('newsflyp@mobimp.com','newsflyp@mobimp');
						
					$this->email->to($email);
					$this->email->subject('Confirm Email');
						
					$url=base_url()."account/activate?q=".$email."&c=".$activation_code;
					$logo=base_url()."images/logo.png";
						$data['url']=$url;
						$data['logo']=$logo;
						$msg = $this->load->view('email_templates/confirmation_email',$data,TRUE);
						$this->email->message($msg);
						$this->email->set_mailtype("html");
						$this->email->send();
					}
					$sql3 = "SELECT id
					FROM  user
						where email='$email'
					ORDER BY  user.id DESC
					LIMIT 1";
				
				$query3 = $this->db->query($sql3);
				$eFlag=$query3->num_rows();
				if($eFlag>0)
				{
					$sql = "UPDATE user set id='$id', name='$name', role='$role' where email='$email'";
					$query2 = $this->db->query($sql);
				}else{$sql = "INSERT INTO `user`(`id`, `name`, `email`, `role`, `device_id`) VALUES ('$id','$name','$email','$role','no')";
				$query2 = $this->db->query($sql);}
				
	
					if($query2)
					{
						
						$outputData = array(
								"status" => "success",
								"info" => "Congratulation! Please check email."
								
						);
							
						$this->output->set_output(json_encode($outputData));
	
					}
					else {
	
						$outputData = array(
								"status" => "fail",
								"info" => "Something went wrong please try again!"
								
						);
						$this->output->set_output(json_encode($outputData));
					}
				}
			}
	
	
		}else{
				
			$outputData = array(
					"status" => "duplicate",
					"info" => "Email Already exist!"
			
			);
			$this->output->set_output(json_encode($outputData));
		}
	}
	function validateUser($loginId)
	{
		$sql = "SELECT
		login.id AS id,
		login.password AS password,
		user.name AS name,
		user.role AS role,
		user.profile_url AS profile_url
		
		FROM
		login AS login,
		user AS user
		WHERE
		login.email = '$loginId' AND
		login.status = 'ACTIVE' AND
		user.email = '$loginId'";
	
		$query = $this->db->query($sql);
	
		return $query->result();
	}

	function forgotpassword($email){
	$sql = "SELECT password
		FROM  login
		WHERE email='$email'";
	
		$query1 = $this->db->query($sql);
		$flag = $query1->num_rows();
		if($flag==1){
			while($result=mysql_fetch_array($query1->result_id)){
				$password=$result['password'];
			}
			$this->load->library('encrypt');
			$pass=$this->encrypt->decode($password);
				
			$this->load->library('email');
				
			$this->email->from('newsflyp@mobimp.com','newsflyp@mobimp');
	
			$this->email->to($email);
			$this->email->subject('Forgot Password');
	
			
			$data['pass']=$pass;
			
			$msg = $this->load->view('email_templates/fogot_email',$data,TRUE);
			$this->email->message($msg);
			$this->email->set_mailtype("html");
			$this->email->send();
	
			$this->session->set_userdata('sqlstatus', 'success');
	
		}
		else {
	
			$this->session->set_userdata('sqlstatus', 'fail');
		}
	}
	
	function postFeeds($created_by,$cat_id,$src,$title,$desc,$Purl,$exurl,$type,$push){
		function truncateString($str, $chars, $to_space, $replacement="...") {
			if($chars > strlen($str)) return $str;
		
			$str = substr($str, 0, $chars);
		
			$space_pos = strrpos($str, " ");
			if($to_space && $space_pos >= 0) {
				$str = substr($str, 0, strrpos($str, " "));
			}
		
			return($str . $replacement);
		}
		$this->output->set_content_type('application/json');
		$sql="INSERT INTO `newsfeed`(`cat_id`, `source`, `title`, `description`, `mUrl`,`exUrl` ,`type`, `created_on`, `created_at`,`created_by`) 
				VALUES ('$cat_id','$src','$title','$desc','$Purl','$exurl','$type',CURDATE(),CURTIME(),'$created_by')";
		$query2 = $this->db->query($sql);
		$notity=truncateString($desc, 120, true);
		
		$sql = "SELECT id
					FROM  newsfeed
					ORDER BY  id DESC
					LIMIT 1";
		
		$query1 = $this->db->query($sql);
		
		if($query1){
			while($result=mysql_fetch_array($query1->result_id)){
				$id=$result['id'];
			}
		}
		if($query2)
		{

			if($push=="YES")
			{
			$sql="SELECT users.device_id
		
		FROM user users,user_cat cat 
where device_id !='no' 
AND device_id !='0'
AND users.id=cat.user_id
AND cat.cat_id='$cat_id'
		 ";
			$query = $this->db->query($sql);
			$ids=array();
			if($query)
			{
				while($result=mysql_fetch_array($query->result_id)){
						
					$ids[]=$result['device_id'];
				}
			}
		
			$sql4="SELECT name
			
		FROM category
					where id='$cat_id'
		 ";
			$query4 = $this->db->query($sql4);
			
			if($query4)
			{
				while($result4=mysql_fetch_array($query4->result_id)){
			
					$category=$result4['name'];
				}
			}
			
				
			$url = 'https://android.googleapis.com/gcm/send';
				
			$fields = array(
					'registration_ids'  => $ids,
					'data'              => array( "id"=>$id,"title" => $title,"cat"=>$category,"desc"=>$notity,"pUrl"=>$Purl ),
			);
				
			$headers = array(
					'Authorization: key = AIzaSyC3Z8zTvO-QfB_JuCCs_6QX46upNG8lem0',
					'Content-Type: application/json'
			);
				
			// Open connection
			$ch = curl_init();
				
			// Set the url, number of POST vars, POST data
			curl_setopt( $ch, CURLOPT_URL, $url );
				
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
				
			// Execute post
			$result = curl_exec($ch);
				
			// Close connection
			curl_close($ch);
		
				
			}
			
			
			
			$outputData = array(
					"status" => "success"
					
		
			);
			$this->output->set_output(json_encode($outputData));
	
		}
		else {
	
			$outputData = array(
					"status" => "fail"
					
		
			);
			$this->output->set_output(json_encode($outputData));
		}
	
	}
	function EditFeeds($feed_id,$created_by,$cat_id,$src,$title,$desc,$url,$exurl,$type){
		$this->output->set_content_type('application/json');
		$sql="UPDATE `newsfeed` SET `cat_id`='$cat_id',`source`='$src',`title`='$title',`description`='$desc',`mUrl`='$url',`exUrl`='$exurl',`type`='$type',`disable`='YES' WHERE id='$feed_id'";
		$query2 = $this->db->query($sql);
	
		if($query2)
		{
			$outputData = array(
					"status" => "success"
			
	
			);
			$this->output->set_output(json_encode($outputData));
	
		}
		else {
	
			$outputData = array(
					"status" => "fail"
			
	
			);
			$this->output->set_output(json_encode($outputData));
		}
	
	}
}