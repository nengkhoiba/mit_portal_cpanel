
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Password
        <small>Change</small>
      </h1>
    
    </section>

    <section class="content">
     	<div class="row">    
     		<div class="col-sm-12">
     		<?php 
     		if($this->session->userdata('status')!=null){
     		
     			$msg=$this->session->userdata('status');
     			?>
     			<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
     	
     		<form action="<?php echo base_url(); ?>data_controller/emp_reg"    method="post" accept-charset="utf-8">  
     			 
     			
     			<div class="column">
     			<div class="col-sm-8">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Old Password
		                  </div>
		                  <input required name="password" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-8">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    New Password
		                  </div>
		                  <input name="txtAddress"  type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-8">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Repeat New Password
		                  </div>
		                  <input type="text" name="txtMobile"  class="form-control">
		                </div>
	              
	              </div>
     			</div>
     			</div>
     			
     			
     				<div class="column">
     			
     			
     		<!--  	<div class="col-sm-4 ">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     Role
		                  </div>
		                  
						   <?php //$this->load->view('global/drop_down_role') ?>
		                 
		               </div>
	              
	              </div>
     			</div>
     			</div>
     			-->
     			
     			
     			
     			
     			<div class="row">
     				<div class="col-sm-8">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                 	<input class="btn btn-default" type="submit" value="Save">
		                </div>
	              
	              </div>
     			</div>
     			</div>
              <?php echo form_close();?>
     		</div>
     	</div>
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>