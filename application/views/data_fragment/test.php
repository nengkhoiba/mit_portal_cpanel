      <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');?>
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h6>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url()?>student/student_list"><i class="fa fa-gear"></i> Student</a></li>
            <li class="active">List</li>
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
     		    $sql="SELECT R.MU_roll,R.reg_no,R.reg_year,S.firstname,S.middlename,S.lastname,S.fName,S.pAddress,
                        S.gender,S.category,S.added_on,C.name as course_name,T.name as trade_name
                         FROM `student_details` S LEFT JOIN admission_std_relation A on S.USID=A.USID
                         LEFT JOIN std_col_relation R on R.USID=A.USID
                         LEFT JOIN course C on C.id=R.course_id
                         LEFT JOIN trade T on T.id=R.trade_id
                         LEFT JOIN semester P on P.id=A.sem_id
                         WHERE S.USID='$id'";
     		    $query=$this->db->query($sql);
     		    if($query){
     		        while($result=mysql_fetch_array($query->result_id)){
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
		 <h4 > ADMISSION(1ST SEM) : <?php echo $result['added_on'];?></h4>
		 <br>
		 <br>
		     </section>
  <?php }?>
  
  <h2 style="text-align:center;color:blue;">YEAR OF EXAMINATION HELD</h2>
	 
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Semester</th>
<?php 
$sql1="SELECT  `name` FROM `exam_type` WHERE `isActive`=1";
$query1=$this->db->query($sql1);
if($query1)
{
    while($result=mysql_fetch_array($query1->result_id))
    {
        ?>
        <th><?php echo $result['name']?></th>
<?php 
    }
    }?>
<th>Course</th>
<th>Mark</th>
<th>Year of passing</th>
</tr>
</thead>
<tbody>
<?php
$sql2="SELECT  `id`,`name` FROM `semester` WHERE `isActive`=1";
$query2 = $this->db->query($sql2);
if($query2){
    while($result=mysql_fetch_array($query2->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['name']; ?></td>
                <?php $sid=$result['id'];
                $sql3="SELECT  `mark_scored`,`status`, `DOE`, `DOP`
                                 FROM `exam_details` WHERE `USID`='$id' AND `sem_id`='$sid'";
                $query3 = $this->db->query($sql3);
                if($query3){
                    while($result=mysql_fetch_array($query3->result_id))
                    {?>
                        <td><?php echo $result['status'];?></td>
                		<td><?php echo $result['mark']; ?></td>
                		<td><?php echo $result['DOP']; ?></td>
                  <?php  }
                         }?>
                
                
      </tr>
	<?php 
	}
	}
    ?>
 </tbody>
 </table>
  
  
  
  
  
  
  
  
  
  
  
     		       <?php  }
     		        }?>
  </div>
   <?php $this->load->view('global/footer.php');?>