
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       		 <h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>utility/session"><i class="fa fa-gear"></i> Utility</a></li>
            <li class="active">Session</li>
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
     			<div id="success-alert" class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
			<?php echo form_open('data_controller/update_master_session');?>
     			<div class="row">
	     			<div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Session Name
			                  </div>
			                  <input id="postType" type="hidden" name="postType">
			                  <input id="txtSession" name="txtSession" type="text" class="form-control" value="<?php echo set_value('txtSession')?>">
			                </div>
			                <?php echo form_error('txtSession');?>
		              
		              </div>
	     			</div>
	     			<div class="col-sm-6">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    View Type
			                  </div>
			                  <select id="ddlActive" name="ddlActive" class="form-control">
			                  	<option value="2">All</option>
			                  	<option value="1">Only Active</option>
			                  	<option value="0">Not Active</option>
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
     		<div class="row container-fluid" >
     			<div id="data_container">
     			
     			</div>
     		</div>
     			
     		             		
              <?php echo form_close();?>
             
		   
     		</div>
     	</div>
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>
  <script type="text/javascript">
  $(document).ready(function() {
	  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		    $("#success-alert").slideUp(500);
		});
	  	search();
	  });
	  
	  function search()
	  {
		  var url = "<?php echo site_url('data_controller/loadDT_session?q=');?>"+document.getElementById('txtSession').value+"&j="+document.getElementById('ddlActive').value;
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
		function edit(id,name)
		{
			document.getElementById('txtSession').value=name;
			document.getElementById('postType').value=id;
			
		}
		function remove(id){
			if (confirm('Are you sure you want to delete?')) {
				var url = "<?php echo site_url('data_controller/removeDT_session?id=');?>"+id;
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

		function enable(sessionId){
		  	var url = "<?php echo site_url('data_controller/update_current_session?id=');?>"+sessionId;
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
  </script>
