      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content">
     	<div class="row">    
     		<div class="col-sm-12">
     		<?php 
     		if($this->session->userdata('status')!=null){
     		
     			$msg=$this->session->userdata('status');
     			?>
     			<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><?php echo $msg;?></strong> 
				</div>
     			<?php 
     			$this->session->set_userdata('removedt_student_status', null);
     		}
     		?>

     		
     		</div>
    			   			
     		</div>
     		<?php if (isset($_GET['usid']))
     		{
     		$id=mysql_real_escape_string(trim($_GET['usid']));
     		    $sql="SELECT R.MU_roll,R.reg_no,R.reg_year,R.course_id,S.firstname,S.middlename,S.lastname,S.fName,S.pAddress,
                        S.gender,S.category,date(S.added_on) AS date,C.name as course_name,T.name as trade_name
                         FROM `student_details` S LEFT JOIN admission_std_relation A on S.USID=A.USID
                         LEFT JOIN std_col_relation R on R.USID=A.USID
                         LEFT JOIN course C on C.id=R.course_id
                         LEFT JOIN trade T on T.id=R.trade_id
                         LEFT JOIN semester P on P.id=A.sem_id
                         WHERE S.USID='$id'";
     		    $query=$this->db->query($sql);
     		    if($query){
     		        while($result=mysql_fetch_array($query->result_id)){
     		            $cid=$result['course_id'];
     		            ?>
         <h3 style="text-align:center;color:red;"></h3>
         <h4 style="text-align:center;">Student Bio-data</h4>
		 <h4 >MU.ROLL NO. : <?php echo $result['MU_roll'];?></h4>
		 <h4 >REDG. NO. :<?php echo $result['reg_no'].' of '.$result['reg_year']?></h4>
		 <h4 >COURSE : <?php echo $result['course_name'];?></h4>
		 <h4 >TRADE : <?php echo $result['trade_name'];?></h4>
		 <br>
		 <br>
		 <h4 > NAME : <?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname'];?></h4>
		 <h4 > FATHER'S NAME : <?php echo $result['fName'];?></h4>
		 <h4 > ADDRESS : <?php echo $result['pAddress'];?></h4>
		 <h4 > CATEGORY : <?php echo $result['gender'].' - '.$result['category'];?></h4>
		 <h4 > ADMISSION(1ST SEM) : <?php echo $result['date'];?></h4>
		 <h4 ><?php if($cid==1)
		 {
		     echo "4 YEARS COMPLETE";
		 }
		 else 
		 {
		     echo "2 YEARS COMPLETE";
     		        }?></h4>
		 <h4 ><?php if($cid==1)
		 {
		     echo "8 YEARS COMPLETE";
		 }
		 else 
		 {
		     echo "4 YEARS COMPLETE";
     		        }?></h4>
		 <br>
		 <br>
		     </section>
  <?php }
     		        }?>
  
  <h2 style="text-align:center;color:blue;">YEAR OF EXAMINATION HELD</h2>
	 
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Semester</th>
<th>Regular</th> 
<th><center>Year 1</center></th>
<th><center>Year 2</center></th>
<th><center>Year 3</center></th>

<th>Mark</th>
<th>Year of passing</th>
</tr>
</thead>
<tbody>
<?php
if($cid==1)
{
$sql2="SELECT  `id`,`name` FROM `semester` WHERE `isActive`=1 order by id ASC LIMIT 8";
}
else 
{
    $sql2="SELECT  `id`,`name` FROM `semester` WHERE `isActive`=1 ORDER by id ASC LIMIT 4";
}
$query2 = $this->db->query($sql2);
if($query2){
    while($result=mysql_fetch_array($query2->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['name']; ?></td>
                
                <?php $sid=$result['id'];
                $sql3="SELECT  ed.mark_scored as mark,ed.DOE,ed.DOP,et.name,et.id,status
                                 FROM `exam_details` ed LEFT JOIN `exam_type` et ON ed.exam_type_id=et.id WHERE `USID`='$id' AND `sem_id`='$sid' AND status=1 order by session_id ASC";
                $query3 = $this->db->query($sql3);
                if($query3){
                    while($result=mysql_fetch_array($query3->result_id))
                                    { ?>
                                    <td><?php echo $result['status']==1?"Passed".'<br>'.$result['DOE']:"Back";?></td>
                                    <td><?php echo $result['status']==1?"-":"Passed".'<br>'.$result['DOE'];?></td>
                                    <td><?php echo $result['status']==1?"-":"Passed".'<br>'.$result['DOE'];?></td>
                                    <td><?php echo $result['status']==1?"-":"Passed".'<br>'.$result['DOE'];?></td>
                                	<td><?php echo $result['mark'];?></td>
                                	<td><?php echo $result['DOP'];?></td>
                              <?php }//end of while
                         
                           }//end of query3
                                                        }//end of while
                    }//end of query2
                    ?>
                
                
      </tr>
      
 </tbody>

 </table>
  <?php 
      $sql4="SELECT   SUM(`mark_scored`) as mark, SUM(`Grand_total`) as total
                       FROM `exam_details` WHERE  `status`=1 AND `USID`='$id'";
      $query4=$this->db->query($sql4);
      if($query4)
      {
          while($result=mysql_fetch_array($query4->result_id))
          {
              $mark=$result['mark'];
              $total=$result['total'];
              ?>
              
	<?php 
          }//end of while
      }//end of query4
      $sql5="SELECT `marksheet_no` as marksheet,YEAR(`DOP`) as year
                 FROM `exam_details` WHERE `status`=1 AND `USID`='$id' 
                 order by exam_details.sem_id DESC LIMIT 1";
      $query5=$this->db->query($sql5);
      if($query5)
      {
          while($result=mysql_fetch_array($query5->result_id))
            {
   ?>
          <h4 >YEAR OF PASSOUT : <?php echo $result['year'];?></h4>
     			<h4>CLASS : <?php 
     			
     			if($mark*100/$total>=60)
     			{
     			    echo "1st Class";
                }
                  else 
                  {
                      
                    echo "2nd class";
                      
                  }
          ?></h4>
          <h4 >MARK SHEET NO. : <?php echo $result['marksheet'];?></h4>
      	  <h4 >GRAND TOTAL. : <?php echo $mark.' out of '.$total;?></h4>
      	  <h4> ORIGINAL CERTIFICATE : <?php echo "Not asssigned";?></h4>
 <?php 
            }//end of while
      }//end of query5
	}//end of isset
?>
  </div>
   <?php $this->load->view('global/footer.php');?>