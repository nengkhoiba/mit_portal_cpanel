<table id="table" class="table table-striped table-bordered studentList_table" cellspacing="0" width="100%">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Name</th>
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
$Name=$_GET['q'];
$Startdate=$_GET['j'];
$EndDate=$_GET['k'];
$mobile=$_GET['l'];
$isActive=$_GET['n'];


$sql="SELECT `USID`, `title`, `firstname`, `middlename`, `lastname`, `mName`, `fName`, `pAddress`, `cAddress`, `phone`, `mobile`, `gender`, `dob`, `religion`, `nationality`, `category`, `reserve_cat`, `phy_han`, `eco_back`, `added_on`, `isActive`
 FROM `student_details` WHERE
		firstname like '%$Name%' OR middlename like '%$Name%' AND mobile like '%$mobile%' AND DATE(added_on)between '$Startdate' and '$EndDate' AND isActive='$isActive'
";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['USID']; ?></td>
                <td><?php echo $result['title']; ?></td>
                <td><?php echo $result['firstname'].' '.$result['middlename'].' '.$result['lastname']; ?></td>
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
            