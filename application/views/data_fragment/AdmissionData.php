<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Student Id</th>
<th>Name</th>
<th>Course</th>
<th>Trade</th>
<th>Previous Semester</th>
<th>Previous Admission Date</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php
$course=trim($_GET['q']);
$trade=trim($_GET['j']);
$Semester=trim($_GET['k']);
$name=trim($_GET['l']);
$viewtype=trim($_GET['m']);
$curSession=$this->session->userdata('session');
$sql2="SELECT `id` FROM `session` WHERE id<$curSession  order by id DESC LIMIT 1";
$query2=$this->db->query($sql2);
$flag=$query2->num_rows();
                while($result=mysql_fetch_array($query2->result_id))
                {
                    $previous=$result['id'];
                }
                if($flag==0)
                {
                    $previous=$curSession;
                }
$sql="SELECT S.USID,
A.date_of_admission,
S.firstname,
S.middlename,
S.lastname,
A.other,
D.abv as course_name,
T.abv as trade_name,
sem.name as sem_name,
A.sem_id as semid,
A.isActive
FROM admission_std_relation A 
 LEFT JOIN student_details S on S.USID=A.USID
 LEFT JOIN std_col_relation SCR on SCR.USID=A.USID
 LEFT JOIN semester sem on sem.id= A.sem_id
 LEFT JOIN course D on D.id=SCR.course_id
 LEFT JOIN trade T on T.id=SCR.trade_id
WHERE
 SCR.course_id=CASE WHEN $course=0 THEN SCR.course_id ELSE '$course' END AND
 SCR.trade_id=CASE WHEN $trade=0 THEN SCR.trade_id ELSE'$trade' END AND 
 A.session_id=CASE WHEN $viewtype=1 THEN A.session_id ELSE $previous END  AND 
(S.firstname like'%$name%' OR S.middlename like '%$name%' OR S.lastname like '%$name%')";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        $challan=$result['other'];
        $sem=$result['semid'];
        ?>
	  <tr>
                <td><?php echo $result['USID']; ?></td>
                <td><?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?></td>           
                <td><?php echo $result['course_name']; ?></td>
                <td><?php echo $result['trade_name']; ?></td>
                <td><?php echo $result['sem_name']; ?></td>   
                <td><?php echo $result['date_of_admission']; ?></td>    
                 
                 
                 <?php 
                 $usid=$result['USID'];
                 $sql1="SELECT `USID`
                 FROM `admission_std_relation`
                 WHERE USID='$usid' AND session_id='$curSession' AND isActive=1";                 
                 $query1 = $this->db->query($sql1);
                 $admission=$query1->num_rows();
                 ?>          
                               <?php 
                               if($admission>0){
                ?>
             
                <td><label style="cursor: pointer" class="btn btn-success" disabled>Admitted</label></td>
               	<td><i style="cursor: pointer" onclick="edit('<?php echo $result['USID']; ?>','<?php echo $result['date_of_admission']; ?>','<?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?>','<?php echo $challan;?>')" class="fa fa-edit"></i></td>
               <?php
                }else{
                 ?>
                     <td><label style="cursor: pointer" onclick="admit('<?php echo $result['USID']; ?>','<?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?>','<?php echo $sem;?>')" class="btn btn-danger">Admit Now</label></td>
                                <td></td>
                 <?php
                 }
                
                
                ?>
                
      </tr>
	<?php 
	
}
}
?>
 </tbody>
 </table>
            