

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
     		
     		<div id="examModalData">
     		
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
		                    Trade
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
		                   Semester
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
	   $('#examModal').modal('hide');
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
   					window.location.reload();
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

 
  function loadDT_ExamModal(usid,sem,session){

	  this.usid=usid;
	  this.sem_id=sem;
	  this.session_id=session;
		
	  var url = "<?php echo site_url('data_controller/loadDT_examDataModal?q=');?>"+usid;
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					document.getElementById('examModalData').innerHTML = xmlHttp.responseText;
	  				  $('#examModal').modal('show');
	  				  $( "#dor" ).datepicker({
	  			    	  dateFormat: "yyyy-mm-dd"
	  			    });
	  			    $( "#dop" ).datepicker({
	  			    	  dateFormat: "yyyy-mm-dd"
	  			    });
	  			    $( "#doe" ).datepicker({
	  			    	  dateFormat: "yyyy-mm-dd"
	  			    });
	  			
	  				$('#OptExamType').val(document.getElementById('txtExmType').value);
	  		
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


		  

	 
		 

	/*
	DATE PICKER 
	*/
  </script>
  
  
  
  