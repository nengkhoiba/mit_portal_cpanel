
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>student/admission"><i class="fa fa-gear"></i> Student</a></li>
            <li class="active">Admission</li>
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
     			<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
			     		<?php echo form_open('data_controller/update_admission');?>

     			<div class="row">
	     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Course
			                  </div>
			                  <?php $this->load->view('global/drop_down_course');?>
			                </div>
			               
		              
		              </div>
	     			</div>
	     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Trade
			                  </div>
			                <?php $this->load->view('global/drop_down_trade');?>
			                </div>
			                
		              
		              </div>
	     			</div>
	     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Semester
			                  </div>
			                  <?php $this->load->view('global/drop_down_semester');?>
			                </div>
		              
		              </div>
	     			</div>
	     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     View Type
		                  </div>
		                 <select id="OptView" name="Optview" class="form-control">
			                  	<option value="2">All</option>
			                  	<option value="1">Only Admitted</option>
			                  	<option value="0">Not Admitted Only</option>
			                  </select>
		                </div>
	             
	              </div>
     			</div>
	     			
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Date of Admission
		                  </div>
		           
		                  <input id="dateAdmission" class="form-control" type="date" name="dateAdmission" value="<?php echo set_value('dateAdmission');?>">
		                        
		                </div>
	              			 <?php echo form_error('dateAdmission');?>
	              </div>
     			</div>
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     Challan/Transaction Id
		                  </div>		                 
		                  <input  id="txtChallan" name="txtChallan" type="text" class="form-control" value="<?php echo set_value('txtChallan');?>">
		                </div>
	             <?php echo form_error('txtChallan');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     Name
		                  </div>
		                  <input id="postType" type="hidden" name="postType">		                 
		                  <input id="txtName" name="txtName" type="text" class="form-control">
		                </div>
	             
	              </div>
     			</div>
     			</div>
     		<div class="row">
     			<div class="col-sm-9">
	     		
     			</div>
     		
     			<div class="col-sm-3">
	     			<div class="form-group">
	     			<div class="btn-group btn-group-justified" role="group">
	     					<div class="btn-group" role="group">
						 <label class="btn btn-default" onclick="search()">Search</label>
						   </div>
	     					<div class="btn-group" role="group">
						    <input class="btn btn-default" type="submit" value="Save">
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
     		             		
             <?php form_close();?>             
		   
     		</div>
     	</div>
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>
  <script type="text/javascript">
  $(document).ready(function() {
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
	  	search();
	  });
	  
	  function search()
	  {
		  var url = "<?php echo site_url('data_controller/loadDT_admission?q=');?>"+document.getElementById('OptCourse').value+"&j="+document.getElementById('OptTrade').value+"&k="+document.getElementById('OptSemester').value+"&l="+document.getElementById('txtName').value+"&m="+document.getElementById('OptView').value;
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
		function admit(id,name,sem)
		{
			
			document.getElementById('postType').value=id;	
			document.getElementById('txtName').value=name;	
			$('#OptSemester').val(sem);
		}
		function edit(id,dateofadmission,name,challan)
		{
			document.getElementById('dateAdmission').value=dateofadmission;
			document.getElementById('postType').value=id;	
			document.getElementById('txtName').value=name;	
			document.getElementById('txtChallan').value=challan;	
		}
  </script>