
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
     		if($this->session->userdata('removedt_student_status')!=null){
     		
     			$msg=$this->session->userdata('removedt_student_status');
     			?>
     			<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('removedt_student_status', null);
     		}
     		?>
     			<div class="modal fade" id="studentdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel"> <b>Student Details</b> </h3>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      
			      <label>MU Roll No: </label>
			       <label id="lblroll"></label>
			       <p><br /></p>
			       <label>MU Registration No: </label>
			       <label id="lblregno"></label>
			       <p><br /></p>
			      <label>Trade: </label>
			       <label id="lblTrade"></label>
			       <p><br /></p>
			      <label>Name: </label>
			       <label id="lblStudentName"></label>
			       <p><br /></p>
			       <label>Father's Name: </label>
			       <label id="lblFatherName"></label>
			       <p><br /></p>
			       <label>Mother's Name: </label>
			       <label id="lblMotherName"></label>
			       <p><br /></p>
			       <label>Permanent Adress </label>
			       <label id="lblAdress"></label>
			       <p><br /></p>
			       <label>Mobile Number: </label>
			       <label id="lblNumber"></label>
			       <p><br /></p>
			       <label>Course: </label>
			       <label id="lblCourse"></label>
			       <p><br /></p>
			       
			        <label id="lblStdReg"></label>
			                  		       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        </div>
			    </div>
			  </div>
			</div>
     		
     		

     		<form >
     		<div class="row">
     		<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Course
		                    <span style="color: red"> *</span>
		                  </div>
		                  <?php $this->load->view('global/drop_down_course');?>
		                </div> 
		                <?php echo form_error('OptCourse');?>  
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Trade
		                    <span style="color: red"> *</span>
		                  </div>
		                  <?php $this->load->view('global/drop_down_trade');?>
		                </div>
		                <?php echo form_error('OptTrade');?>   
	              </div>
     			</div>
     				<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Semester
		                    <span style="color: red"> *</span>
		                  </div>
		                 <?php $this->load->view('global/drop_down_semester.php');?>
		                </div> 
		                <?php echo form_error('OptSemester');?>  
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Name
		                  </div>
		                  
		                  <input id="txtFirstName" name="txtFirstName" type="text" class="form-control" value="<?php echo set_value('txtFirstName')?>">
		                </div>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Entry Form
		                  </div>
		           
		                  <input  class="form-control" id="dateStart" type="date" name="dateStart" value="<?php echo set_value('dateStart');?>">
		                        
		                </div>
	              </div>
     			</div>
     			
     				<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    To
		                  </div>
		           
		                  <input  class="form-control" id="dateEnd"  type="date" name="dateEnd" value="<?php echo set_value('dateEnd');?>">
		                        
		                </div>
	              </div>
     			</div>
     	</div>
     			     		
     		     			<div class="row">
     		     			
     		     	<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Mobile No
		                  </div>
		                   
		                  <input  name="txtMobile" id="txtMobile" type="text" class="form-control"  value="<?php echo set_value('txtMobile');?> ">
		                </div>
	              </div>
     			</div>
     			
     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Active
			                  </div>
			                  <select id="ddlActive" name="ddlActive" class="form-control">
			                  	<option value=2>All</option>
			                  	<option value=1>Yes</option>
			                  	<option value=0>No</option>
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
  var usid;
  $(document).ready(function() {
	  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		    $("#success-alert").slideUp(500);
		});
	  	search();
	  });
	  
	  function search()
	  {
		  var url = "<?php echo site_url('data_controller/loadDT_student?q=');?>"
			  +document.getElementById('txtFirstName').value
			  +"&j="+document.getElementById('dateStart').value
			  +"&k="+document.getElementById('dateEnd').value
			  +"&l="+document.getElementById('txtMobile').value
			  +"&n="+document.getElementById('ddlActive').value
			  +"&c="+document.getElementById('OptCourse').value
			  +"&t="+document.getElementById('OptTrade').value
			  +"&s="+document.getElementById('OptSemester').value;
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
		function show(name,fname,mname,adress,number,course,trade,roll,reg)
		{
			document.getElementById('lblStudentName').innerHTML=name;
			document.getElementById('lblFatherName').innerHTML=fname;
			document.getElementById('lblMotherName').innerHTML=mname;
	         document.getElementById('lblAdress').innerHTML=adress;
	         document.getElementById('lblNumber').innerHTML=number;
	         document.getElementById('lblCourse').innerHTML=course;
	         document.getElementById('lblTrade').innerHTML=trade;
	         document.getElementById('lblroll').innerHTML=roll;
	         document.getElementById('lblregno').innerHTML=reg;
			$('#studentdata').modal('show');
			
		}
  </script>