
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      	<h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>utility/semester"><i class="fa fa-gear"></i> Utility</a></li>
            <li class="active">Department</li>
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
			<?php echo form_open('data_controller/update_master_department');?>
     			<div class="row ">
	     			<div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                   Department Name
			                  </div>
			                  <input id="postType" type="hidden" name="postType">
			                  <input id="txtDepartmentName" name="txtDepartmentName" type="text" class="form-control" >
			                </div>
		              
		              </div>
	     			</div>
	     			<div class="col-sm-6">
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
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>
  <script >

  $(document).ready (function(){
	  search();
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
  });

  
  function search()
  {

  	var url = "<?php echo site_url('data_controller/loadDT_department?q=');?>"+document.getElementById('txtDepartmentName').value+"&j="+document.getElementById('ddlActive').value;
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
	function edit(id,name)
	{
		document.getElementById('txtDepartmentName').value=name;
		document.getElementById('postType').value=id;
		
	}
	function remove(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('data_controller/deleteDT_department?id=');?>"+id;
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