

      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 
 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      	<h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>nav_controller/exam_data"><i class="fa fa-gear"></i> Student</a></li>
            <li class="active">Exam Data</li>
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
     		
     		
     			<div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel"> <b>Enter The Marks</b> </h3>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <label id="lblStudentName"></label>
			       <label id="lblStdRoll"></label>
			        <label id="lblStdReg"></label>
			         
			           <div class='row '>
			         	<div class='col-sm-12'>
			         		<div class='col-sm-6'>
			         		 <div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Exam Type
						                    <span style="color: red"> * </span>
						                  </div>
						                    <?php $this->load->view('global/drop_down_exam_type') ?>
						                </div>
					              </div>
					        </div>
					         <div class="col-sm-6">
					     			<div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Status
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="text" class="form-control" id="status">
						                </div>
					              </div>
				     			</div>
					
					        
			         	</div>
			          </div>
			         
			           <div class='row'>
			         	<div class='col-sm-12'>
			         		<div class='col-sm-6'>
			         		 <div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Mark Score 
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="text" class="form-control" id="mark_score">
						                </div>
					              </div>
					         </div>
					        <div class="col-sm-6">
					     			<div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Grand Total
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="text" class="form-control" id="grand_total">
						                </div>
					              </div>
				     			</div>
					        
			         	</div>
			          </div>
			            <div class='row'>
			         	<div class='col-sm-12'>
			         		<div class='col-sm-6'>
			         		 <div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Mark Sheet Number
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="text" class="form-control" id="mark_sheet_number">
						                </div>
					              </div>
					         </div>
					        <div class="col-sm-6">
					     			<div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    DOE
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="date" class="form-control" id="doe">
						                </div>
					              </div>
				     			</div>
					        
			         	</div>
			          </div>
			            <div class='row'>
			         	<div class='col-sm-12'>
			         		<div class='col-sm-6'>
			         		 <div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    DOR
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="date" class="form-control" id="dor">
						                </div>
					              </div>
					         </div>
					        <div class="col-sm-6">
					     			<div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    DOP
						                    <span style="color: red"> * </span>
						                  </div>
						                    <input type="date" class="form-control" id="dop">
						                </div>
					              </div>
				     			</div>
					        
			         	</div>
			          </div>
			         
			         
			       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" onclick='submit_data()' class="btn btn-primary">Save</button>
			      </div>
			    </div>
			  </div>
			</div>
     		
     		
     		
		
     			<div class="row">
     			<div class="col-sm-3">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Course
		                    <span style="color: red"> * </span>
		                  </div>
		                     <?php $this->load->view('global/drop_down_course')?>
		                </div>
	              
	              </div>
     			</div>
     				<div class="col-sm-3">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Semester
		                    <span style="color: red"> * </span> 
		                  </div>
		                   <?php $this->load->view('global/drop_down_trade')?>
		                </div>
	              
	              </div>
     			</div>
     			
     			<div class="col-sm-3">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                   Trade
		                   <span style="color: red"> * </span>
		                  </div>
		                   <?php $this->load->view('global/drop_down_semester')?>
		                </div>
	              
	              </div>
     			</div>
     		<div class="col-sm-3">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                  Name
		                  </div>
		                   <input type="text" class="form-control" id="mark6">
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
     		 </br>		
     		<div class="row container-fluid">
     			<div id="data_container">
     			
     			</div>
     		</div>
            
             </div>
     		</div>
     	</div>
    </section>
 
 
  <?php $this->load->view('global/footer.php');?>
  
  
   <script >

   var usid,sem_id,session_id;
   
   function submit_data()
   {

   	var url = "<?php echo site_url('data_controller/update_exam_data_entry?q=');?>"+document.getElementById('OptExamType').value+
   	"&k="+usid+
   	"&l="+sem_id+
   	"&n="+session_id+
   	"&o="+document.getElementById('status').value+
   	"&p="+document.getElementById('mark_score').value+
   	"&r="+document.getElementById('grand_total').value+
   	"&s="+document.getElementById('mark_sheet_number').value+
   	"&t="+document.getElementById('dor').value+
   	"&u="+document.getElementById('doe').value+
   	"&v="+document.getElementById('dop').value;


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
	
   
  $(document).ready (function(){
	  search();
  });

 
  function loadDT_Exam(id,name,mu_roll,reg_no,semester,session){

	  usid=id;
	  sem_id=semester;
	  session_id=session;
	  document.getElementById('lblStudentName').innerHTML=name;
	 document.getElementById('lblStdRoll').innerHTML=mu_roll;
	  document.getElementById('lblStdReg').innerHTML=reg_no;
	  $('#examModal').modal('show');
  }
  
  function search()
  {

  	var url = "<?php echo site_url('data_controller/loadDT_examData?q=');?>"+document.getElementById('OptCourse').value+"&j="+document.getElementById('OptSemester').value+"&k="+document.getElementById('OptTrade').value;
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
	function edit(id,name,pass)
	{
		document.getElementById('postType').value=id;
		document.getElementById('txtUsername').value=name;
		document.getElementById('ddlEmployee').value=id;
		document.getElementById('optDesig').value=id;
		document.getElementById('optDept').value=id;
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
  
  
  
  