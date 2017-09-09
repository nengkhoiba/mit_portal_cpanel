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
$sql="SELECT S.USID,A.date_of_admission,S.firstname,S.middlename,S.lastname,A.other
FROM student_details S,admission_std_relation A,std_col_relation C
WHERE C.course_id='$course' AND C.trade_id='$trade' AND A.sem_id='$Semester' AND C.USID=A.USID AND S.USID=C.USID
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
               
                <?php
                }else{
                 ?>
                 <td><label style="cursor: pointer" class="btn btn-success">Admitted</label></td>
               	
                <?php
                 }
                
                
                ?>
                 <td><i style="cursor: pointer" onclick="edit('<?php echo $result['USID']; ?>','<?php echo $result['date_of_admission']; ?>','<?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?>','<?php echo $result['other'];?>')" class="fa fa-edit"></i></td>
                
      </tr>
	<?php 
	
}
}
?>
 </tbody>
 </table>
            