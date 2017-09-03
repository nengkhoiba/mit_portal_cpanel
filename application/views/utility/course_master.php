
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Utility
        <small>Course master</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gear"></i> Utility</a></li>
        <li class="active">Course master</li>
      </ol>
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
			<?php echo form_open('data_controller/update_master_course');?>
     			<div class="row">
	     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Course Name
			                  </div>
			                  <input id="postType" type="hidden" name="postType">
			                  <input id="txtCourse" name="txtCourse" type="text" class="form-control" value="<?php echo set_value('txtCourse')?>">
			                </div>
			                <?php echo form_error('txtCourse');?>
		              
		              </div>
	     			</div>
	     			<div class="col-sm-4">
		     			<div class="form-group">
		            	
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    Abv
			                  </div>
			                <input id="txtAbv" name="txtAbv" type="text" class="form-control" value="<?php echo set_value('txtAbv')?>">
			                </div>
			                <?php echo form_error('txtAbv');?>
		              
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
	     		
     			</div>
     		
     			<div class="col-sm-3">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                	<input class="btn btn-default" type="submit" value="SAVE">
		                		 <label class="btn btn-default" onclick="search()">Search</label>
		                 	<input class="btn btn-default" type="reset" value="Reset">
		                </div>
	              
	              </div>
     			</div>
     		</div>
     		<div class="row">
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
	  	search();
	  });
	  
	  function search()
	  {
		  var url = "<?php echo site_url('data_controller/loadDT_course?q=');?>"+document.getElementById('txtCourse').value+"&j="+document.getElementById('ddlActive').value+"&k="+document.getElementById('txtAbv');
	  	var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					
	  					document.getElementById('data_container').innerHTML = xmlHttp.responseText;
	  					$('#table').DataTable();
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
		function edit(id,name,abv)
		{
			document.getElementById('txtCourse').value=name;
			document.getElementById('postType').value=id;
			document.getElementById('txtAbv').value=abv;
			
			
		}
		function remove(id){
			if (confirm('Are you sure you want to delete?')) {
				var url = "<?php echo site_url('data_controller/removeDT_course?id=');?>"+id;
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