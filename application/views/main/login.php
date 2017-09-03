<html>
<head>

	 <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/site.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/AdminLTE.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <link href="<?php echo base_url();?>css/home.css" rel="stylesheet">
 
</head>
<body>



	

<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Log in</h1>
     <?php 
     		if($this->session->userdata('status')!=null){
     		
     			$msg=$this->session->userdata('status');
     			?>
     			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
     <?php echo form_open('login_controller/login');?> 
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value('username');?>">
                       <?php echo form_error('username'); ?>
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password');?>">
                       <?php echo form_error('password'); ?>
                        </div>
                    
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                   <?php echo form_close();?>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
                    
                   
                    
                    
                    
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">X</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<p> </br></p>
<p></br></p>
<p></br></p>
<p></br></p>
<p></br></p>
<p></br></p>
<p></p>
<?php $this->load->view('global/footer.php');?>
