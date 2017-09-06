
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>student/student_list"><i class="fa fa-gear"></i> Student</a></li>
            <li class="active">List</li>
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
     			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>

     		<form action="<?php echo base_url();?>data_controller/student_list" method="post" accept-charset="utf-8">
     		<div class="row">
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    First Name
		                  </div>
		                  
		                  <input id="txtFirstName" name="txtFirstName" type="text" class="form-control" value="<?php echo set_value('txtFirstName')?>">
		                </div>
	              <?php echo form_error('txtFirstName');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Middle Name
		                  </div>
		                  <input id="txtMiddleName" name="txtMiddleName" type="text" class="form-control" value="<?php echo set_value('txtMiddleName')?>">
		                </div>
	              
	              </div>
     			</div>
     				<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Father's name
		                  </div>
		                  <input id="txtFather"  name="txtFather" type="text" class="form-control" value="<?php echo set_value('txtFather')?>">
		                </div>
	              <?php echo form_error('txtFather');?>
	              </div>
     			</div>
     			
     			</div>
     			     		
     		     			<div class="row">
     		
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Gender
		                  </div>
		                  <select id="txtGender" name="txtGender" class="form-control form-control-lg" >
  								<option>Male</option>
  								<option>Female</option>
  								<option>Others</option>
								</select>
		                </div>
	              
	              </div>
	              </div>
	              	<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Category
		                  </div>
		                  <input id="txtCategory" name="txtCategory" type="text" class="form-control" value="<?php echo set_value('txtCategory')?>">
		                </div>
	              <?php echo form_error('txtCategory');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Active
			                  </div>
			                  <select id="ddlActive" name="ddlActive" class="form-control">
			                  	<option value="1">Yes</option>
			                  	<option value="0">No</option>
			                  </select>
			                </div>
		              
		              </div>
	     			</div>
     			</div>
     		
     			<div class="row">
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
     			
              </form>    			   			
     		</div>
     	</div>
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>
  <script type="text/javascript">
  $(document).ready(function() {
	  	search();
	  });
	  
	  function search()
	  {
		  var url = "<?php echo site_url('data_controller/loadDT_student?q=');?>"+document.getElementById('txtFirstName').value+"&j="+document.getElementById('txtMiddleName').value+"&k="+document.getElementById('txtFather').value+"&l="+document.getElementById('txtGender').value+"&m="+document.getElementById('txtCategory').value+"&n="+document.getElementById('ddlActive').value;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					
	  					document.getElementById('data_container').innerHTML = xmlHttp.responseText;
	  					$('#table').DataTable(
	  							{
	  		  				        dom: 'Bfrtip',
	  		  				        buttons: [
	  		  				            'csv', 'pdf', 'print'
	  		  				        ]
	  		  				    }
	  		  					);
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
		function edit(USID)
		{
			window.open("<?php echo base_url();?>student/registration?USID="+USID);
			
		}
		function remove(id){
			if (confirm('Are you sure you want to delete?')) {
				var url = "<?php echo site_url('data_controller/removeDT_student?id=');?>"+id;
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