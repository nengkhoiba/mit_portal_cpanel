
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      	<h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>utility/semester"><i class="fa fa-gear"></i> Utility</a></li>
            <li class="active">User</li>
          </ol>
          </h6>  
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
			<?php echo form_open('data_controller/update_master_user');?>
     			<div class="row">
     			<div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Name
			                  </div>
			                   <?php $this->load->view('global/drop_down_employee')?>
			                </div>
		              
		              </div>
	     			</div>
	     			<div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                   Username
			                  </div>
			                  <input id="postType" type="hidden" name="postType">
			                  <input id="txtUsername" name="txtUsername" type="text"  value="<?php echo set_value('txtUsername');?>" class="form-control" >
			                  <?php echo form_error('txtUsername'); ?>
			                  
			                </div>
		              
		              </div>
	     			</div>
	     			</div>
	     			<div class="row">
	     			<div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                   Password
			                  </div>
			                  <input id="txtPassword" name="txtPassword" value="<?php echo set_value('txtPassword');?>" type="password" class="form-control" >
			                  <?php echo form_error('txtPassword'); ?>
			                  
			                </div>
		              
		              </div>
		              </div>
		              
		              <div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                   Confirm Password
			                  </div>
			                  <input id="txtConfirmPassword" name="txtConfirmPassword" type="password" class="form-control" >
			                </div>
		              
		              </div>
		              </div>
		              </div>
		              <div class="row">
		              <div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Role
			                  </div>
			                   <?php $this->load->view('global/drop_down_role')?>
			                </div>
		              
		              </div>
	     			</div>
		              
	     			
	     	     <div class="col-sm-4 ">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Designation
		                  </div>
		                  
						   <?php $this->load->view('global/drop_down_designation')?>
		               </div>
	              </div>
     			</div>
     			<div class="col-sm-4 ">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Department
		                  </div>
		                  
						   <?php $this->load->view('global/drop_down_department') ?>
		                 
		               </div>
	              
	              </div>
     			</div>
	     			
	     			</div>
	     			

     		<div class="row " >
     			<div class="col-sm-9">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                 	
		                </div>
	              
	              </div>
     			</div>
     				<div class="col-sm-3">
	     			<div class="form-group">
	            	<div class="btn-group btn-group-justified" role="group">
						  <div class="btn-group" role="group">
						    <input class="btn btn-default" type="submit" value="Save">
						  </div>
						    <div class="btn-group" role="group">
						 <label class="btn btn-default" onclick="search()">Search</label>
						   </div>
						 <div class="btn-group" role="group">
						   <input class="btn btn-default" type="reset" value="Reset">
						  </div>
						</div>
	              </div>
     			</div>
     			</div>    			
     		<div class="row container-fluid">
     			<div id="data_container">
     			
     			</div>
     		</div>
              <?php echo form_close();?>
             </div>
     		</div>
     	</div>
    </section>
  


 
  <?php $this->load->view('global/footer.php');?>
  <script >

  $(document).ready (function(){
	  search();
  });
  
  
  function search()
  {

  	var url = "<?php echo site_url('data_controller/loadDT_user?q=');?>"+document.getElementById('txtUsername').value+"&j="+document.getElementById('txtPassword').value+"&k="+document.getElementById('ddlFirst');
  	var xmlHttp = GetXmlHttpObject();
  	if (xmlHttp != null) {
  		try {
  			xmlHttp.onreadystatechange=function() {
  			if(xmlHttp.readyState == 4) {
  				if(xmlHttp.responseText != null){
  					document.getElementById('data_container').innerHTML = xmlHttp.responseText;
  					$('#table').DataTable({
  				        dom: 'Bfrtip',
  				        buttons: [
  				            'csv', 'pdf', 'print'
  				        ]
  				    });
  				}else{
  					alert("Error");
  				}
  			}
  		}
  		xmlHttp.open("GET", url, true);
  		xmlHttp.send(null);
  	}
  	catch(error) {}
  	}
  	}
	function edit(id,name,pass,r_id,deg_id,dept_id)
	{
		document.getElementById('postType').value=id;
		document.getElementById('txtUsername').value=name;
		document.getElementById('ddlEmployee').value=id;
		document.getElementById('optDesig').value=deg_id;
		document.getElementById('optDept').value=dept_id;
		document.getElementById('optRole').value=r_id;
		document.getElementById('txtPassword').value=pass;
		document.getElementById('txtConfirmPassword').value=pass;
	}
	function remove(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('data_controller/deleteDT_user?id=');?>"+id;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){

	  					search();
	  					
	  				}else{
	  					alert("Error");
	  				}
	  			}
	  		}
	  		xmlHttp.open("GET", url, true);
	  		xmlHttp.send(null);
	  	}
	  	catch(error) {}
	  	}
		}
	}
  </script>