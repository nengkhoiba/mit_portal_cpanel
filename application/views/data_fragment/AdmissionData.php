<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Student Id</th>
<th>Name</th>
<th>Admission Date</th>
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
$sql="SELECT S.USID,A.date_of_admission,S.firstname,S.middlename,S.lastname,A.other
FROM student_details S LEFT JOIN admission_std_relation A on S.USID=A.USID
                       LEFT JOIN std_col_relation C on C.USID=A.USID
WHERE C.course_id=CASE WHEN $course=0 THEN C.course_id ELSE '$course' END
   AND C.trade_id=CASE WHEN $trade=0 THEN C.trade_id ELSE'$trade' END
     AND A.sem_id=CASE WHEN $Semester=0 THEN A.sem_id ELSE'$Semester' END

AND (S.firstname like'%$name%' OR S.middlename like '%$name%' OR S.lastname like '%$name%')
        ";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['USID']; ?></td>
                <td><?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?></td>
                <td><?php echo $result['date_of_admission']; ?></td>                 
                               <?php 
               if($result['other']==''){
                ?>
                 <td><label style="cursor: pointer" onclick="admit('<?php echo $result['USID']; ?>','<?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?>')" class="btn btn-danger">Admit Now</label></td>
                                <td></td>
               
                <?php
                }else{
                 ?>
                 <td><label style="cursor: pointer" class="btn btn-success">Admitted</label></td>
               	 <td><i style="cursor: pointer" onclick="edit('<?php echo $result['USID']; ?>','<?php echo $result['date_of_admission']; ?>','<?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?>','<?php echo $result['other'];?>')" class="fa fa-edit"></i></td>
               	
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
            