
      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
 
<?php 
$id="";
if(isset($_GET['USID']))
{
    $usid=trim($_GET['USID']);
    $id=$usid;
    $sql=$sql="SELECT S.USID, S.title, S.firstname, S.middlename,S.lastname,S.mName, S.fName, S.pAddress, 
S.cAddress,S.phone, S.mobile, S.gender, S.dob, S.religion, S.nationality, S.category, R.other
S.reserve_cat, S.phy_han, S.eco_back,A.MU_roll,A.reg_no,A.reg_year,A.course_id,A.trade_id,R.sem_id
 FROM student_details S LEFT JOIN std_col_relation A on S.USID=A.USID LEFT JOIN admission_std_relation R on S.USID=R.USID
WHERE S.USID=$usid";
    $query=$this->db->query($sql);
        while($result=mysql_fetch_array($query->result_id))
        {
            $id=$result['USID'];
            $title=$result['title'];
            $course=$result['course_id'];
            $trade=$result['trade_id'];
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
            $rcat=$result['reserve_cat'];
            $phand=$result['phy_han'];
            $eco=$result['eco_back'];
            $mu_roll=$result['MU_roll'];
            $reg_no=$result['reg_no'];
            $sem=$result['sem_id'];
            $other=$result['other'];
            $reg_year=$result['reg_year'];//`reserve_cat`, `phy_han`, `eco_back`
          
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
     			<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
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
		                    Student Type
		                    <span style="color: red"> *</span>
		                  </div>
		                  <select id="OptStudentType" name="OptStudentType" class="form-control form-control-lg" >
		                  		<option value=0 <?php echo set_select('OptStudentType',0);?>>Select</option>
  								<option value=1 <?php echo set_select('OptStudentType',1);?>>Fresher</option>
  								<option value=3 <?php echo set_select('OptStudentType',3);?>>Lateral Entry</option>
  								</select>
		                </div> 
		                <?php echo form_error('OptStudentType');?>  
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     Transaction Id/Challan
		                  </div>
		                  <input id="txtChallan" name="txtChallan" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$other:set_value('txtChallan');?>">
		                </div>
	              <?php echo form_error('txtChallan');?>
	              </div>
     			</div>
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     MU reg no.
		                  </div>
		                  <input  name="txtMuRegNo" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$reg_no:set_value('txtMuRegNo');?>">
		                </div>
	              
	              </div>
     			</div>
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                     Registration year
		                  </div>
		                  <input  name="txtRegYear" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$reg_year:set_value('txtRegYear');?>">
		                </div>
	            
	              </div>
     			</div>
     				<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
							MU Roll no.
		                  </div>
		                  <input  name="txtMuRoll" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$mu_roll:set_value('txtMuRoll');?>">
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Title
		                    <span style="color: red"> *</span>
		                  </div>
		                  <select id="txtTitle" name="txtTitle" class="form-control form-control-lg">
		                  		<option value="" <?php echo isset($_GET['USID'])?set_select('txtTitle','',FALSE):set_select('txtTitle','txtTitle',TRUE);?>>Select</option>
  								<option value="Mr" <?php echo set_select('txtTitle','Mr');?>>Mr</option>
  								<option value="Miss" <?php echo set_select('txtTitle','Miss');?>>Miss</option>
  								<option value="Ms" <?php echo set_select('txtTitle','Ms');?>>Ms</option>
								</select>
		                </div>
		                <?php echo form_error('txtTitle');?>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    First Name
		                     <span style="color: red"> *</span>
		                  </div>
		                  <input id="postType" type="hidden" name="postType" value="<?php echo $id;?> ">
		                  <input  name="txtFirstName" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$firstname:set_value('txtFirstName');?>">
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
		                  <input  name="txtMiddleName" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$middlename:set_value('txtMiddleName');?>">
		                </div>
	              
	              </div>
     			</div>
     				<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Last Name
		                    <span style="color: red"> *</span>
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
		                    <span style="color: red"> *</span>
		                  </div>
		                  
		                  <input  name="txtMother" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$mName:set_value('txtMother');?>">
		                </div>
	              <?php echo form_error('txtMother');?>
	              </div>
     			</div>
     			
     			</div>
     			     		
     		     			<div class="row">
     			
     			
     		
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Father's name
		                    <span style="color: red"> *</span>
		                  </div>
		                  <input  name="txtFather" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$fName:set_value('txtFather');?>">
		                </div>
	              <?php echo form_error('txtFather');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                   Permanent Address
		                   <span style="color: red"> *</span>
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
		                    <span style="color: red"> *</span>
		                  </div>
		                  <input  name="txtCAdress" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$cAddress:set_value('txtCAdress');?>">
		                </div>
	              <?php echo form_error('txtCAdress');?>
	              </div>
     			</div>
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Residence Phone No
		                    <span style="color: red"> *</span>
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
		                    <span style="color: red"> *</span>
		                  </div>
		                   
		                  <input  name="txtMobile" type="text" class="form-control"  value="<?php echo (isset($_GET['USID']))?$mobile:set_value('txtMobile');?>">
		                </div>
	              <?php echo form_error('txtMobile');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Gender
		                    <span style="color: red"> *</span>
		                  </div>
		                  <select id="OptGender" name="OptGender" class="form-control form-control-lg" value="<?php echo (isset($_GET['USID']))?$gender:set_value('txtGender');?>" >
  								<option value="" <?php echo set_select('OptGender','');?>>Select</option>
  								<option value="Male" <?php echo set_select('OptGender','Male');?>>Male</option>
  								<option value="Female" <?php echo set_select('OptGender','Female');?>>Female</option>
  								<option value="Others" <?php echo set_select('OptGender','Others');?>>Others</option>
								</select>
		                </div>
	              
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Date of Birth
		                    <span style="color: red"> *</span>
		                  </div>
		           
		                  <input  class="form-control" type="date" name="dateDOB" value="<?php echo (isset($_GET['USID']))?$dob:set_value('dateDOB');?>">
		                        
		                </div>
	              			 <?php echo form_error('dateDOB');?>
	              </div>
     			</div>
     				<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Religion
		                    <span style="color: red"> *</span>
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
		                    <span style="color: red"> *</span>
		                  </div>
		                  <input  name="txtNationality" type="text" class="form-control" value="<?php echo (isset($_GET['USID']))?$nationality:set_value('txtNationality');?>">
		                </div>
	              <?php echo form_error('txtNationality');?>
	              </div>
     			</div>
     			
     			</div>
     			
     				<div class="row">
     			
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Category
		                    <span style="color: red"> *</span>
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
		                    <span style="color: red"> *</span>
		                  </div>
		                  <select id="OptRcategory" name="OptRcategory" class="form-control form-control-lg" value="<?php echo set_value('choiceRcategory');?>" >
  								<option value="" <?php echo set_select('OptRcategory','');?>>Select</option>
  								<option value=0 <?php echo set_select('OptRcategory',0);?>>No</option>
  								<option value=1 <?php echo set_select('OptRcategory',1);?>>Yes</option>
								</select>
		                </div>
	              <?php echo form_error('OptRcategory');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Physically Handicapped
		                    <span style="color: red"> *</span>
		                  </div>
		                  	   <select id="OptPhyHandicap"  name="OptPhyHandicap" class="form-control form-control-lg" value="<?php echo set_value('PhyHandicap');?>" >
  								<option value="" <?php echo set_select('OptPhyHandicap','');?>>Select</option>
  								<option value=0 <?php echo set_select('OptPhyHandicap',0);?>>No</option>
  								<option value=1 <?php echo set_select('OptPhyHandicap',1);?>>Yes</option>
								</select>
		                </div>
	              <?php echo form_error('OptPhyHandicap');?>
	              </div>
     			</div>
     			<div class="col-sm-4">
	     			<div class="form-group">
	            	
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    Economically Backward 
		                    <span style="color: red"> *</span>
		                  </div>
		                  <select id="OptEcoBackward" name="OptEcoBackward" class="form-control form-control-lg" value="<?php echo set_value('EcoBackward');?>" >
  								<option value="" <?php echo set_select('OptEcoBackward','');?>>Select</option>
  								<option value=0 <?php echo set_select('OptEcoBackward',0);?>>No</option>
  								<option value=1 <?php echo set_select('OptEcoBackward',1);?>>Yes</option>
								</select>
		                </div>
	              	              <?php echo form_error('OptEcoBackward');?>
	              
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
   <script type="text/javascript">
  $(document).ready(function() {
	  $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){("#success-alert").slideUp(500);
		});
	  	set();
        });
  function set()
  {
	  <?php if(isset($_GET['USID']))
	      
	  {?>
	  $('#OptCourse').val('<?php echo $course;?>');	
	  $('#txtTitle').val('<?php echo $title;?>');  
      $('#OptTrade').val('<?php echo $trade;?>');
      $('#OptStudentType').val('<?php echo $sem;?>');       
      $('#OptGender').val('<?php echo $gender;?>');       
      $('#OptRcategory').val('<?php echo $rcat;?>');       
      $('#OptPhyHandicap').val('<?php echo $phand;?>');       
      $('#OptEcoBackward').val('<?php echo $eco;?>');
      <?php } ?>
	  
  }
  </script>