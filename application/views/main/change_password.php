<html>
<head>

	 <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/site.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/AdminLTE.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <link href="<?php echo base_url();?>css/home.css" rel="stylesheet">

<style type="text/css">
.content-header{
  font-family: 'Oleo Script', cursive;
  color:#fcc500;
  font-size: 45px;
}

.section-content{
  text-align: center; 

}
#contact{
    
    font-family: 'Teko', sans-serif;
  padding-top: 60px;
  width: 100%;
  width: 100vw;
  height: 780px;
  background: #3a6186; /* fallback for old browsers */
  background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
.contact-section{
  padding-top: 40px;
}
.contact-section .col-md-6{
  width: 50%;
}

.form-line{
  border-right: 1px solid #B29999;
}

.form-group{
  margin-top: 10px;
}
label{
  font-size: 1.3em;
  line-height: 1em;
  font-weight: normal;
}
.form-control{
  font-size: 1.3em;
  color: #080808;
}
textarea.form-control {
    height: 135px;
   /* margin-top: px;*/
}

.submit{
  font-size: 1.1em;
  float: right;
  width: 150px;
  background-color: transparent;
  color: #fff;

}


</style> 
</head>
<body>


<section id="contact">
			<div class="section-content">
				<h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">MIT Portal</span></h1>
				<h3>Change Password</h3>
			</div>
			<div class="contact-section">
			<div class="container container-fluid">
				<?php echo form_open('login_controller/change_password');?> 
					<div class="col-sm-12 ">
					    <div class="col-sm-4">
					        
					    </div>
					    <div class="col-sm-4">
						    <div class="form-group">
				  				<label>Old Password</label>
						    	<input type="text" class="form-control" id="oldPassword" name="oldPassword" placeholder=" Enter Old Password">
					  		</div>
					  		<div class="form-group">
						    	<label>New Password</label>
						    	<input type="password" class="form-control" id="newPassword" name="newPassword" placeholder=" Enter New Password">
						  	</div>	
						  	<div class="form-group">
						    	<label>Confirmed New Password</label>
						    	<input type="password" class="form-control" id="confirmedPassword" name="confirmedPassword" placeholder="Confirmed New Password ">
				  			</div>
				  			<div>
								<button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Submit</button>
			  				</div>
					    </div>
			  		
			  		</div>
				 <?php echo form_close();?>
			</div>
			</div>
	
</section>


<?php $this->load->view('global/footer.php');?>
