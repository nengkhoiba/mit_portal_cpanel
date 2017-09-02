
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
     	<div class="row">    
     		<div class="col-sm-12">
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
     		<?php echo form_open('data_controller/student_reg')?>
     			<div class="row">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Name
		                  </div>
		                  <input name="txtName" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Address
		                  </div>
		                  <input name="txtAddress" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Phone
		                  </div>
		                  <input name="txtPhone" type="text" class="form-control">
		                </div>
	              
	              </div>
     			</div>
     			</div>
     				<div class="row">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Father
		                  </div>
		                  <input name="txtFather" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Mother
		                  </div>
		                  <input name="txtMother" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Session
		                  </div>
		                  <input name="txtSession" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			</div>
     			
     			<div class="row">
     				<div class="col-sm-4">
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