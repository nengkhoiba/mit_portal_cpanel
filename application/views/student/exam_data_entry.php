

      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      	<h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>utility/semester"><i class="fa fa-gear"></i> Employee</a></li>
            <li class="active">Registration</li>
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
			        <form>
			          <div class="form-group">
			            <label for="recipient-name" class="form-control-label">Mark1:</label>
			            <input type="text" class="form-control" id="mark1">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="form-control-label">Mark2:</label>
			            <input type="text" class="form-control" id="mark2">
			          </div>
			          <div class="form-group">
			            <label for="recipient-name" class="form-control-label">Mark3:</label>
			            <input type="text" class="form-control" id="mark3">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="form-control-label">Mark4:</label>
			            <input type="text" class="form-control" id="mark4">
			          </div>
			          <div class="form-group">
			            <label for="recipient-name" class="form-control-label">Mark5:</label>
			            <input type="text" class="form-control" id="mark5">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="form-control-label">Mark6:</label>
			            <input type="text" class="form-control" id="mark6">
			          </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div>
			  </div>
			</div>
     		
     	
     		<form action="<?php echo base_url(); ?>data_controller/update_exam_data_entry"   method="post" accept-charset="utf-8">  
     			 
     			
     			<div class="row ">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Course
		                  </div>
		                     <?php $this->load->view('global/drop_down_course')?>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Semester 
		                  </div>
		                   <?php $this->load->view('global/drop_down_trade')?>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                   Trade
		                  </div>
		                   <?php $this->load->view('global/drop_down_semester')?>
		                </div>
	              
	              </div>
     			</div>
     			</div>
     			
     			
     				<div class="row">
     			
     			
     			
     			
     			<div class="row container-fluid ">
	     			<div class="col-sm-9">
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
              
     		</div>
     		<div class="row container-fluid">
     			<div id="data_container">
     			
     			</div>
     		</div>
     		<?php echo form_close();?>
     		
     		
     	</div>
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>
  
  
   <script >

  $(document).ready (function(){
	  search();
  });

  function loadDT_Exam(){
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
  
  
  
  