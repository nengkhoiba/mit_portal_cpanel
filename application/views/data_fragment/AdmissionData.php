<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Student Id</th>
<th>Name</th>
<th>Course</th>
<th>Trade</th>
<th>Previous Semester</th>
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
$viewtype=trim($_GET['m']);
$sql="SELECT S.USID,A.date_of_admission,S.firstname,S.middlename,S.lastname,
A.other,D.abv as course_name,T.abv as trade_name,X.name as sem_name,A.sem_id,A.isActive
FROM student_details S
 LEFT JOIN admission_std_relation A on S.USID=A.USID
 LEFT JOIN std_col_relation C on C.USID=A.USID
 LEFT JOIN course D on D.id=C.course_id
 LEFT JOIN trade T on C.trade_id=T.id
 LEFT JOIN semester X on X.id=A.sem_id WHERE 
 C.course_id=CASE WHEN $course=0 THEN C.course_id ELSE '$course' END AND
 C.trade_id=CASE WHEN $trade=0 THEN C.trade_id ELSE'$trade' END AND 
 A.sem_id=CASE WHEN $Semester=0 THEN A.sem_id ELSE'$Semester' END AND 
 A.isActive=CASE WHEN $viewtype=2 THEN A.isActive ELSE '$viewtype' END AND 
(S.firstname like'%$name%' OR S.middlename like '%$name%' OR S.lastname like '%$name%')";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['USID']; ?></td>
                <td><?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?></td>
               
                <td><?php echo $result['course_name']; ?></td>
                <td><?php echo $result['trade_name']; ?></td>
                <td><?php echo $result['sem_name']; ?></td>   
                 <td><?php echo $result['date_of_admission']; ?></td>              
                               <?php 
               if($result['isActive']!=1){
                ?>
                 <td><label style="cursor: pointer" onclick="admit('<?php echo $result['USID']; ?>','<?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?>','<?php echo $result['sem_id'];?>')" class="btn btn-danger">Admit Now</label></td>
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
            