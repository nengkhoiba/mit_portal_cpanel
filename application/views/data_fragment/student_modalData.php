<html>
<head>
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.content-wrapper{
    margin-left: 20%;
    margin-right: 20%;
    border: 1px solid #d8d5d5;
    padding: 50px;
    font-size: 18px;
}
span{font-weight: 300;}

</style>
</head>
<body>
       <div class="content-wrapper">
  
     <section class="content">
     	
     		<?php if (isset($_GET['usid']))
     		{
     		    $session=$this->session->userdata('session');
     		$id=mysql_real_escape_string(trim($_GET['usid']));
     		    $sql="SELECT R.MU_roll,R.reg_no,R.reg_year,R.course_id,S.firstname,S.middlename,S.lastname,S.fName,S.pAddress,
                        S.gender,S.category,S.photo,date(S.added_on) AS date,C.name as course_name,T.name as trade_name
                         FROM admission_std_relation A LEFT JOIN  `student_details` S on S.USID=A.USID
                         LEFT JOIN std_col_relation R on R.USID=A.USID
                         LEFT JOIN course C on C.id=R.course_id
                         LEFT JOIN trade T on T.id=R.trade_id
                         LEFT JOIN semester P on P.id=A.sem_id
                         WHERE S.USID='$id' AND A.session_id='$session'";
     		    $query=$this->db->query($sql);
     		    if($query){
     		        while($result=mysql_fetch_array($query->result_id)){
     		            $cid=$result['course_id'];
     		            ?>
         <h3 style="text-align:center;color:red;"></h3>
         <h2 style="text-align:center;">Student Bio-data</h2>
         <div>
		 <h5 >MU.ROLL NO. : <span><?php echo $result['MU_roll'];?></span></h5>
		 <h5 >REDG. NO. :<span><?php echo $result['reg_no'].' of '.$result['reg_year']?></span></h5>
		 <h5 >COURSE : <span><?php echo $result['course_name'];?></span></h5>
		 <h5 >TRADE : <span><?php echo $result['trade_name'];?></span></h5>
		 <img src="<?php echo $result['photo'];?>" style="
    width: 120px;
    float: right;
    margin-top: -100px;
    margin-right: 10px;
">
		 </div>
		 <br>
		 <br>
		 <h5 > NAME : <span><?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname'];?></span></h5>
		 <h5 > FATHER'S NAME : <span><?php echo $result['fName'];?></span></h5>
		 <h5 > ADDRESS : <span><?php echo $result['pAddress'];?></span></h5>
		 <h5 > CATEGORY : <span><?php echo $result['gender'].' - '.$result['category'];?></span></h5>
		 <h5 > ADMISSION(1ST SEM) : <span><?php echo $result['date'];?></span></h5>
		 <h5 ><?php if($cid==1)
		 {
		     echo "4 YEARS COMPLETE";
		 }
		 else 
		 {
		     echo "2 YEARS COMPLETE";
     		        }?></h5>
		 <h5 ><?php if($cid==1)
		 {
		     echo "8 YEARS COMPLETE";
		 }
		 else 
		 {
		     echo "4 YEARS COMPLETE";
     		        }?></h5>
		 <br>
		
		     </section>
  <?php }
     		        }?>
 <h4 style="text-align:center;">YEAR OF EXAMINATION HELD</h4>	 
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
        $mark="-";
        $YOP="-";
        ?>
	  <tr>
                <td><?php echo $result['name']; ?></td>
                
                <?php $sid=$result['id'];
                
                $sql3="SELECT `id`, `name`, `isActive` FROM `exam_type`";
                $query3 = $this->db->query($sql3);
                if($query3){
                    while($result=mysql_fetch_array($query3->result_id))
                                    { 
                                        $e_id=$result['id'];
                                        $sql4="SELECT  mark_scored as mark,DOE,DOP,status
                                 FROM exam_details
                                 
                                WHERE USID='$id'
                                AND sem_id='$sid'
                                AND exam_type_id='$e_id'
                                ";
                                        $query4 = $this->db->query($sql4);
                                        if($query4){
                                            while($result1=mysql_fetch_array($query4->result_id))
                                            {
                                                
                                                if($result1['status']==1){
                                                    
                                                    $mark=$result1['mark'];
                                                    $YOP=$result1['DOP'];
                                        ?>
                                    
                                    <td>Passed<br><?php echo $result1['DOE']?></td> 
                                    
                                    <?php }elseif($result1['status']==3){
                                        
                                        ?>
                                    
                                    <td>Back<br><?php echo $result1['DOE']?></td> 
                                    
                                    <?php
                                    }
                                            }
                                        }
                                        if($query4->num_rows()==0){
                                            ?>
                                            <td>-</td>
                                            <?php 
                                        }
                    }
                }
                
                ?>
              <td><?php echo $mark;?></td>
              <td><?php echo $YOP;?></td>
                
                
      </tr>
      <?php }?>
 </tbody>

 </table>
  <?php 
      $sql4="SELECT   SUM(`mark_scored`) as mark, SUM(`Grand_total`) as total
                       FROM `exam_details` WHERE  `status`=1 AND `USID`='$id' order by sem_id DESC limit 6";
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
}
?>
  </div>
</body>
</html>
