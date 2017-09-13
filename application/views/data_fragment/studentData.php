<table id="table" class="table table-striped table-bordered studentList_table" cellspacing="0" width="100%">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Name</th>
<th>Course</th>
<th>Trade</th>
<th>Semester</th>
<th>MU Roll</th>
<th>Reg No.</th>
<th>Mother's Name</th>
<th>Father's Name</th>
<th>Permanent Address</th>
<th>Address for Communication</th>
<th>Residence Phone No.</th>
<th>Mobile No.</th>
<th>Gender</th>
<th>Date of Birth</th>
<th>Religion</th>
<th>Nationality</th>
<th>Category</th>
<th>Reserve Category</th>
<th>Physically hancdicapped</th>
<th>Economically Backward</th>
<th>Added on</th>
<th>Active</th>
<th>Edit</th>
<th>Remove</th>

</tr>
</thead>

<tbody>
<?php
$Name=trim($_GET['q']);
$Startdate=trim($_GET['j']);
$EndDate=trim($_GET['k']);
$mobile=trim($_GET['l']);
$isActive=trim($_GET['n']);
$course=trim($_GET['c']);
$trade=trim($_GET['t']);
$sem=trim($_GET['s']);
$sql="SELECT S.USID, S.title,S.firstname,S.middlename,S.lastname,S.mName,S.fName,S.pAddress,S.cAddress,S.phone,
S.mobile,S.gender,S.dob,S.religion,S.nationality,S.category,S.reserve_cat,S.phy_han,S.eco_back,S.added_on,S.isActive,
C.abv as course_name,T.abv as trade_name,P.name as semester_name,R.MU_roll,R.reg_no,R.reg_year
 FROM `student_details` S LEFT JOIN admission_std_relation A on S.USID=A.USID LEFT JOIN std_col_relation R on R.USID=A.USID
LEFT JOIN course C on C.id=R.course_id LEFT JOIN trade T on T.id=R.trade_id LEFT JOIN semester P on P.id=A.sem_id
 WHERE S.firstname like '%$Name%' OR S.middlename like '%$Name%'
 AND S.mobile like '%$mobile%' 
AND DATE(S.added_on)between '$Startdate' and '$EndDate'
 AND S.isActive='$isActive'
 AND C.id=CASE WHEN $course=0 THEN C.id ELSE '$course' END
    AND T.id=CASE WHEN $trade=0 THEN T.id ELSE'$trade' END
     AND P.id=CASE WHEN $sem=0 THEN P.id ELSE'$sem' END";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['USID']; ?></td>
                <td><?php echo $result['title']; ?></td>
                <td><?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?></td>
                <td><?php echo $result['course_name']; ?></td>
                <td><?php echo $result['trade_name']; ?></td>
                <td><?php echo $result['semester_name']; ?></td>
                <td><?php echo $result['MU_roll']; ?></td>
                <td><?php echo $result['reg_no'].' of '.$result['reg_year']; ?></td>
                <td><?php echo $result['mName']; ?></td>
                <td><?php echo $result['fName']; ?></td>
                <td><?php echo $result['pAddress']; ?></td>
                <td><?php echo $result['cAddress']; ?></td>
                <td><?php echo $result['phone']; ?></td>
                <td><?php echo $result['mobile']; ?></td>
                <td><?php echo $result['gender']; ?></td>
                <td><?php echo $result['dob']; ?></td>
                <td><?php echo $result['religion']; ?></td>
                <td><?php echo $result['nationality']; ?></td>
                <td><?php echo $result['category']; ?></td>
                 <td><?php if($result['reserve_cat']==1){
                	echo 'YES';
                          }else{
                	echo 'NO'; 
                          }?></td>
                 <td><?php if($result['phy_han']==1){
                	echo 'YES';
                          }else{
                	echo 'NO'; 
                          }?></td>
                 <td><?php if($result['eco_back']==1){
                	echo 'YES';
                          }else{
                	echo 'NO'; 
                          }?></td>
                <td><?php echo $result['added_on']; ?></td>
                <td><?php if($result['isActive']==1){
                	echo 'YES';
                          }else{
                	echo 'NO'; 
                          }?></td>
                          <td><i style="cursor: pointer" onclick="edit('<?php echo $result['USID']; ?>')" class="fa fa-edit"></i></td>
                          <td><i style="cursor: pointer" onclick="remove('<?php echo $result['USID']; ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>
            