  <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

 <div class="content-wrapper">
   <section class="content-header">
      	<h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>nav_controller/change_password"><i class="fa fa-gear"></i> Change</a></li>
            <li class="active">Password</li>
          </ol>
          </h6>  
    </section>

    <section class="content">
     	<div class="row">
     	 <div class="col-sm-12">
     		<?php 
     		if ($this->session->userdata('status')=="Confirmation Password cannot be empty" || $this->session->userdata('status')=="Old Password cannot be empty" ||
     				$this->session->userdata('status')=="New Password cannot be empty"||$this->session->userdata('status')=="Old Password  and New Password cannot be same"||
     				$this->session->userdata('status')=="Old Password incorrect" ||$this->session->userdata('status')=="Something went wrong!"){
     			
     					$msg=$this->session->userdata('status');
     			?>
     			<div id="success-alert" class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		else if($this->session->userdata('status')=="Succesfully Updated!"){
     		
     			$msg=$this->session->userdata('status');
     			?>
     			<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		else {
     			
     		}
     		
     		
     		?>
			
     			
     				<?php echo form_open('login_controller/change_password');?> 
     			<div class="row" > 
					<div class="col-sm-12 ">
					  		<div class="col-sm-4">
							</div>
						   
						   <div class="col-sm-4">
						    <div class="form-group">
			                <div class="input-group">
			                  <div class="input-group-addon">
			                  Old Password
			                  </div>
			                <input id="oldPassword" name="oldPassword" type="password"  placeholder="Enter the Old Password" class="form-control" > 
			              </div>
			              </div>
						   </div>
						   <div class="col-sm-4">
						   </div>
					 </div> 	
				</div>
				<div class="row" > 
					<div class="col-sm-12 ">
					  		<div class="col-sm-4">
							</div>
						   
						   <div class="col-sm-4">
						    <div class="form-group">
			                <div class="input-group">
			                  <div class="input-group-addon">
			                  New Password
			                  </div>
			                <input id="newPassword" name="newPassword" type="password"  placeholder="Enter the New Password" class="form-control" > 
			              </div>
			              </div>
						   </div>
						   <div class="col-sm-4">
						   </div>
					 </div> 	
				</div>
					<div class="row" > 
					<div class="col-sm-12 ">
					  		<div class="col-sm-4">
							</div>
						   
						   <div class="col-sm-4">
						    <div class="form-group">
			                <div class="input-group">
			                  <div class="input-group-addon">
			                   Confirmed New Password
			                  </div>
			                <input id="confirmedPassword" name="confirmedPassword" type="password" placeholder="Enter the Confirmation Password"  class="form-control" > 
			              </div>
			              </div>
						   </div>
						   <div class="col-sm-4">
						   </div>
					 </div> 	
				</div>		  		
				<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
						<button type="submit" class="btn btn-default submit">Save</button>
					</div>
					<div class="col-sm-4">
					</div>
				</div>
				</div>		
			 <?php echo form_close();?>
     			
     </div>
     </div>
     </section>
     </div>
<?php $this->load->view('global/footer.php');?>

<script >

  $(document).ready (function(){
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
	  });
  </script>
