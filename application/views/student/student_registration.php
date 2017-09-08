
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 
<?php 
$id="";
if(isset($_GET['USID']))
{
    $usid=trim($_GET['USID']);
    $id=$usid;
    $sql=$sql="SELECT `USID`, `title`, `firstname`, `middlename`, `lastname`, `mName`, `fName`, `pAddress`, `cAddress`, `phone`, `mobile`, `gender`, `dob`, `religion`, `nationality`, `category`, `reserve_cat`, `phy_han`, `eco_back`, `added_on`, `isActive`
 FROM `student_details` WHERE USID=$usid";
    $query=$this->db->query($sql);
        while($result=mysql_fetch_array($query->result_id))
        {
            $id=$result['USID'];
            $title=$result['title'];
            $firstname=$result['firstname'];
            $middlename=$result['middlename'];
            $lastname=$result['lastname'];
            $mName=$result['mName'];
            $fName=$result['fName'];
            $pAddress=$result['pAddress'];
            $cAddress=$result['cAddress'];
            $phone=$result['phone'];
            $mobile=$result['mobile'];
            $gender=$result['gender'];
            $dob=$result['dob'];
            $religion=$result['religion'];
            $nationality=$result['nationality'];
            $category=$result['category'];
            if($result['reserve_cat']==1)
            {
                $reserve_cat="YES";
            }
            else 
            {
                $reserve_cat="NO";
            }
            if($result['phy_han']==1)
            {
                $phy_han="YES";
            }
            else
            {
                $phy_han="NO";
            }
            if($result['eco_back']==1)
            {
                $eco_back="YES";
            }
            else
            {
                $eco_back="NO";
            }
          
        }
}



?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>student/registration"><i class="fa fa-gear"></i> Student</a></li>
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
     			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Message: </strong> <?php echo $msg;?>
				</div>
     			<?php 
     			$this->session->set_userdata('status', null);
     		}
     		?>

     		<?php echo form_open('data_controller/student_reg');?>
     		<div class="row">
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Title
		                  </div>
		                  <select name="txtTitle" class="form-control form-control-lg" >
  								<option value="Mr">Mr</option>
  								<option value="Miss">Miss</option>
  								<option value="Ms">Ms</option>
								</select>
		                </div>
		                <?php echo form_error('txtTitle');?>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     Name
		                  </div>
		                  <input id="postType" type="hidden" name="postType" value="<?php echo $id;?> ">
		                  <input  name="txtFirstName" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$firstname:set_value('txtFirstName');?> ">
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
		                  <input  name="txtMiddleName" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$middlename:set_value('txtMiddleName');?> ">
		                </div>
	              
	              </div>
     			</div>
     			
     			</div>
     			     		
     		     			<div class="row">
     			
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Last Name
		                  </div>
		                  
		                  <input  name="txtlastName" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$lastname:set_value('txtlastName');?>" >
		                </div>
	              <?php echo form_error('txtlastName');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Mother's name
		                  </div>
		                  
		                  <input  name="txtMother" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$mName:set_value('txtMother');?> ">
		                </div>
	              <?php echo form_error('txtMother');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Father's name
		                  </div>
		                  <input  name="txtFather" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$fName:set_value('txtFather');?> ">
		                </div>
	              <?php echo form_error('txtFather');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                   Permanent Address
		                  </div>
		                  <input  name="txtPermanentAddress" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$pAddress:set_value('txtPermanentAddress');?>" >
		                </div>
	              <?php echo form_error('txtPermanentAddress');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Address for Communication
		                  </div>
		                  <input  name="txtCAdress" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$cAddress:set_value('txtCAdress');?> ">
		                </div>
	              <?php echo form_error('txtCAdress');?>
	              </div>
     			</div>
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Residence Phone No
		                  </div>
		                  
		                  <input  name="txtPhone" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$phone:set_value('txtPhone');?>" >
		                </div>
	              <?php echo form_error('txtPhone');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Mobile No
		                  </div>
		                   
		                  <input  name="txtMobile" type="text" class="form-control"  value="<?php echo (isset($_GET['USID']))?$mobile:set_value('txtMobile');?> ">
		                </div>
	              <?php echo form_error('txtMobile');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Gender
		                  </div>
		                  <select  name="txtGender" class="form-control form-control-lg" value="<?php echo (isset($_GET['USID']))?$gender:set_value('txtGender');?> " >
  								<option value="Male">Male</option>
  								<option value="Female">Female</option>
  								<option value="Others">Others</option>
								</select>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Date of Birth
		                  </div>
		           
		                  <input  class="form-control" type="date" name="dateDOB" value="<?php echo (isset($_GET['USID']))?$dob:set_value('dateDOB');?>">
		                        
		                </div>
	              			 <?php echo form_error('dateDOB');?>
	              </div>
     			</div>
     			
     			</div>
     			
     				<div class="row">
     				<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Religion
		                  </div>
		                  <input  name="txtReligion" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$religion:set_value('txtReligion');?>" >
		                </div>
	              <?php echo form_error('txtReligion');?>
	              </div>
     			</div>
     			
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Nationality
		                  </div>
		                  <input  name="txtNationality" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$nationality:set_value('txtNationality');?> ">
		                </div>
	              <?php echo form_error('txtNationality');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Category
		                  </div>
		                  <input  name="txtCategory" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$category:set_value('txtCategory');?>" >
		                </div>
	              <?php echo form_error('txtCategory');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Reserve Category
		                  </div>
		                  <select name="choiceRcategory" class="form-control form-control-lg" value="<?php echo (isset($_GET['USID']))?$reserve_cat:set_value('choiceRcategory');?>" >
  								<option value=0>No</option>
  								<option value=1>Yes</option>
								</select>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Physically Handicapped
		                  </div>
		                  	   <select name="PhyHandicap" class="form-control form-control-lg" value="<?php echo (isset($_GET['USID']))?$phy_han:set_value('PhyHandicap');?>" >
  								<option value=0>No</option>
  								<option value=1>Yes</option>
								</select>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Economically Backward 
		                  </div>
		                  <select name="EcoBackward" class="form-control form-control-lg" value="<?php echo (isset($_GET['USID']))?$eco_back:set_value('EcoBackward');?>" >
  								<option value=0>No</option>
  								<option value=1>Yes</option>
								</select>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Photo Url
		                  </div>
		                  	<label class="custom-file">
 					 <input type="file" id="file" class="form-control">
 					 <span class="custom-file-control"></span>
					</label>
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
						   <input class="btn btn-default" type="reset" value="Reset">
						   </div>						 
					</div>
		          
	              
	              </div>
     			</div>
     			</div>    			
     	<?php echo form_close();?>   			   			
     		</div>
     	</div>
    </section>
  
  </div>

 
  <?php $this->load->view('global/footer.php');?>