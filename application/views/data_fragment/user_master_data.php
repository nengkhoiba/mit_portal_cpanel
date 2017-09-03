
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>ID</th>
<th>Username</th>
<th>Password</th>
<th>Active</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$user=$_GET['q'];
$pass=$_GET['j'];
$isFirst=$_GET['k'];
$sql="SELECT `UEID`, `user`,`password`, `isFirst` FROM `emp_login` WHERE
isFirst='1'
";

/*$sql="SELECT `UEID`, `user`,`password`, `isFirst` FROM `emp_login` WHERE
user like '%$user%'
AND isFirst='$isFirst'*/


$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
	  <tr>
                <td><?php echo $result['UEID']; ?></td>
                <td><?php echo $result['user']; ?></td>
                <td><?php echo $result['password']; ?></td>
                <td><?php echo $result['isFirst']; ?></td>
                <td><i style="cursor: pointer" onclick="edit('<?php echo $result['UEID']; ?>','<?php echo $result['user']; ?>','<?php echo $result['password']; ?>')" class="fa fa-edit"></i></td>
                <td><i style="cursor: pointer" onclick="remove('<?php echo $result['UEID']; ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>