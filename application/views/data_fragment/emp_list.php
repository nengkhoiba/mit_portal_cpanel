
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>Name</th>
<th>Address</th>
<th>Mobile</th>
<th>Qualification</th>
<th>Email</th>
<th>Gender</th>
<th>Active</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$name = $_GET['q'] ;
$address = $_GET['j'] ;
$mobile = $_GET['k'];
$qulf = $_GET['l'];
$email = $_GET['n'];
$gender = $_GET['o'];

$sql="SELECT name,address,mobile,qualification,email,gender, isActive FROM emp_details 
WHERE isActive=1";

$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
	  <tr>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['address'];?></td>
                <td><?php echo $result['mobile'];?></td>
                <td><?php echo $result['qualification'];?></td>
                <td><?php echo $result['email'];?></td>
                <td><?php echo $result['gender'];?></td>
                <td><?php if($result['isActive']==1){
                	echo 'YES';
                }else{
                	echo 'NO';
                }?></td>
                <td><i style="cursor: pointer" onclick="edit()" class="fa fa-edit"></i></td>
                <td><i style="cursor: pointer" onclick="remove('<?php ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>