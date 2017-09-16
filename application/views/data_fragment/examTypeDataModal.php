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
			      <?php 
			      
			      if(isset($_GET['q'])){
			      	$usid =trim($_GET['q']);
			      	$sql=" SELECT ed.id, ed.sem_id, ed.exam_type_id, ed.USID, ed.session_id, ed.status, ed.mark_scored, ed.Grand_total, ed.marksheet_no, ed.DOE, ed.DOR,ed.DOP, ed.isActive, et.name
							 FROM exam_details ed
                             LEFT JOIN exam_type et on et.id= ed.exam_type_id
                             WHERE USID ='$usid'
						";
			      	$query=$this->db->query($sql);
			      	$flag = $query->num_rows();
			      	if($flag != null){
			      		while($result=mysql_fetch_array($query->result_id)){
			      			$sid=$result['USID'];
			      			$id=$result['id'];
			      			$exam_type_id=$result['name'];
			      			$session_id=$result['session_id'];
			      			$status=$result['status'];
			      			$mark_score=$result['mark_scored'];
			      			$grand_total=$result['Grand_total'];
			      			$marksheet_no=$result['marksheet_no'];
			      			$doe=$result['DOE'];
			      			$dop=$result['DOP'];
			      			$dor=$result['DOR'];
			      			
			      	}
			      	}
			      	else {
			      		
			      		
			      		$exam_type_id=null;
			      
			      	}
			      	
			      		
			      		
			  
			      	
			      	$sql1 = "SELECT sd.firstname,sd.middlename,sd.lastname ,scr.MU_roll,scr.reg_no,scr.reg_year 
							FROM std_col_relation scr 
							LEFT JOIN student_details sd ON scr.USID=sd.USID WHERE scr.USID= '$usid'";
			      	$query1=$this->db->query($sql1);
			      	while($result=mysql_fetch_array($query1->result_id)){
			      		$name=$result['firstname'].' '.$result['middlename'].' '.$result['lastname'];
			      		$mu_roll=$result['MU_roll'];
			      		$reg_no=$result['reg_no'];
			      		$reg_year=$result['reg_year'];
			      		
			      	}
			      	
			      }
			      ?>
			      
			      <label id="lblStudentName" > <?php echo $name; ?></label>
			      <br>
			      <label>     MU Roll No. : </label>
			      <label id="lblStdRoll"><?php echo $mu_roll;?> </label>
			      <br>
			      <label>Reg no.</label>
			       <label id="lblStdReg"><?php echo $reg_no;?></label>
			       <label> of </label>
			         <label id="lblStdRegYear"><?php echo $reg_year;?></label>
			           <div class='row '>
			         	<div class='col-sm-12'>
			         		<?php
			         		if($exam_type_id!=null)
			         		{
			         			
			         		?>
			         		<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			Exam Type
			         			<span style="color: red"> * </span>
			         			</div>
			         			<select class="form-control form-control-lg">
											  <option ><?php echo $exam_type_id;?></option>
											  
											  
											</select> 
						                    
						                </div>
					              </div>
					        </div>
			         		
			         			
			         			<?php 
			         		}
			         		else {
			         		
			         		?>
			         			<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			Exam Type
			         			<span style="color: red"> * </span>
			         			</div>
						                    <?php $this->load->view('global/drop_down_exam_type')?>
						                </div>
					              </div>
					        </div>
			         		<?php }
			         		?>
			         		
			         		<?php
			         		if($exam_type_id!=null)
			         		{
			         			
			         		?>
			         		<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			Status 
			         			<span style="color: red"> * </span>
			         			</div>
			         			<select class="form-control form-control-lg">
											  <option ><?php echo $status;?></option>
											  
											  
											</select> 
						                    
						                </div>
					              </div>
					        </div>
			         		
			         			
			         			<?php 
			         		}
			         		else {
			         		
			         		?>
			         			<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			Status 
			         			<span style="color: red"> * </span>
			         			</div>
						                   <select  id="status" class="form-control form-control-lg">
											  <option value=''>-Select-</option>
											  <option value='pass'>Pass</option>
											  <option value='fail'>Fail</option>
											  
											</select> 
						                </div>
					              </div>
					        </div>
			         		<?php }
			         		?>
			         		
			         		
			
				
					        
			         	</div>
			          </div>
			         
			           <div class='row'>
			         	<div class='col-sm-12'>
			         		
							<?php
			         		if($exam_type_id!=null)
			         		{
			         			
			         		?>
			         		<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			Mark Score 
			         			<span style="color: red"> * </span>
			         			</div>
			         			<select class="form-control form-control-lg">
											  <option ><?php echo $mark_score;?></option>
											  
											  
											</select> 
						                    
						                </div>
					              </div>
					        </div>
			         		
			         			
			         			<?php 
			         		}
			         		else {
			         		
			         		?>
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
			         		<?php }
			         		?>
					      
					      <?php
			         		if($exam_type_id!=null)
			         		{
			         			
			         		?>
			         		<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			Grand Total
			         			<span style="color: red"> * </span>
			         			</div>
			         			<select class="form-control form-control-lg">
											  <option ><?php echo $grand_total;?></option>
											  
											  
											</select> 
						                    
						                </div>
					              </div>
					        </div>
			         		
			         			
			         			<?php 
			         		}
			         		else {
			         		
			         		?>
			         			<div class='col-sm-6'>
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
			         		<?php }
			         		?>
					        
			         	</div>
			          </div>
			            <div class='row'>
			         	<div class='col-sm-12'>
			         		<?php
			         		if($exam_type_id!=null)
			         		{
			         			
			         		?>
			         		<div class='col-sm-6'>
			         			<div class="form-group">
			         			<div class="input-group">
			         			<div class="input-group-addon">
			         			  Mark Sheet Number
			         			<span style="color: red"> * </span>
			         			</div>
			         			<select class="form-control form-control-lg">
											  <option ><?php echo $marksheet_no;?></option>
											  
											  
											</select> 
						                    
						                </div>
					              </div>
					        </div>
			         		
			         			
			         			<?php 
			         		}
			         		else {
			         		
			         		?>
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
			         		<?php }
			         		?>
			         		
			         		
			         		
			         		
			         		
			         		
			         		
					        <div class="col-sm-6">
					     			<div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Date Of Examination
						                    <span style="color: red"> * </span>
						                  </div>
										<input  class="form-control"  id="doe" >
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
						                    Date Of Result 
						                    <span style="color: red"> * </span>
						                  </div>
						           <input  class="form-control"  id="dor" >
						                </div>
					              </div>
					         </div>
					        <div class="col-sm-6">
					     			<div class="form-group">
						                <div class="input-group">
						                  <div class="input-group-addon">
						                    Date of Publish
						                    <span style="color: red"> * </span>
						                  </div>
						                  <input  class="form-control"  id="dop" >						                </div>
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