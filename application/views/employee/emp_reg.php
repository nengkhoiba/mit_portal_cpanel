
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
     			<div  id="success-alert" class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>
     		
     	
     	
     		<form action="<?php echo base_url(); ?>data_controller/emp_reg"   method="post" accept-charset="utf-8">  
     			 
     			
     			<div class="row ">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Name
		                  </div>
		                  <input id="postType" type="hidden" name="postType">
		                  <input required name="txtName" id='txtName' type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Address
		                  </div>
		                  <input name="txtAddress" id='txtAddress'  type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Mobile
		                  </div>
		                  <input type="text" name="txtMobile" id='txtMobile'  class="form-control">
		                </div>
	              
	              </div>
     			</div>
     			</div>
     				<div class="row ">
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Qualification
		                  </div>
		                  <input  name="txtQualification" id='txtQualification' type="text" class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Email
		                  </div>
		                  <input name="txteMail" id='txteMail' type="email"  class="form-control" >
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4 ">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Gender
		                  </div>
		                  
						    <select  id ='optGender' class="form-control form-control-lg " name="optGender">
						      <option value=null >-Select-</option>
						      <option value="Male" >Male</option>
						      <option value="Female">Female</option>
						      <option value="Others">Others</option>
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
     		</br>
     			<div class="row container-fluid">
	     			<div id="data_container">
	     			
	     			</div>
     			</div>
              <?php echo form_close();?>
     		
     	</div>
  
  
  </div>
  </section>
 
  <?php $this->load->view('global/footer.php');?>
   <script >

  $(document).ready (function(){
	  
	  search();
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
  });
  
  
  function search()
  {

  	var url = "<?php echo site_url('data_controller/loadDT_empData?q=');?>"+document.getElementById('txtName').value+"&j="+document.getElementById('txtAddress').value+"&k="+document.getElementById('txtMobile').value+"&l="+document.getElementById('txtQualification').value+"&n="+document.getElementById('txteMail').value+"&o="+document.getElementById('optGender').value;
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
	function edit(id,name,add,mob,qulf,email,gender)
	{
		     
		document.getElementById('postType').value=id;
		document.getElementById('txtName').value=name;
		document.getElementById('txtAddress').value=add;
		document.getElementById('txtMobile').value=mob;
		document.getElementById('txtQualification').value=qulf;
		document.getElementById('txteMail').value=email;
		document.getElementById('optGender').value=gender;
	}
	function remove(id){

		if(confirm("Confirm Delete?")){
	  	var url = "<?php echo site_url('data_controller/?id=');?>"+id;
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