
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
     			<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
     	
     		<form action="<?php echo base_url(); ?>data_controller/emp_reg"    method="post" accept-charset="utf-8">  
     			 
     			
     			<div class="row ">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Name
		                  </div>
		                  <input required name="txtName" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Address
		                  </div>
		                  <input name="txtAddress"  type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Mobile
		                  </div>
		                  <input type="text" name="txtMobile"  class="form-control">
		                </div>
	              
	              </div>
     			</div>
     			</div>
     				<div class="row ">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Qualification
		                  </div>
		                  <input  name="txtQualification" type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Email
		                  </div>
		                  <input name="txteMail" type="email"  class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4 ">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Gender
		                  </div>
		                  
						    <select  class="form-control form-control-lg " name="optGender">
						      <option value=null >-Select-</option>
						      <option value="Male" >Male</option>
						      <option value="Female">Female</option>
						      <option value="Others">Others</option>
						    </select>
		                 
		               </div>
	              
	              </div>
     			</div>
     			</div>
     			
     				<div class="row">
     			
     			
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
     			
     			
     			
     			
     			<div class="row container-fluid ">
	     			<div class="col-sm-9">
	     			</div>
     				<div class="col-sm-3">
	     			<div class="btn-group btn-group-justified" role="group">
		                <div class="btn-group" role="group">
						   <input class="btn btn-default" type="submit" value="Save">
						  </div>
						    <div class="btn-group" role="group">
						   <input class="btn btn-default" type="reset" value="Reset">
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