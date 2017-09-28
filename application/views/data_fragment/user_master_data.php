
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>ID</th>
<th>Username</th>
<th>Password</th>
<th>Department</th>
<th>Designation</th>
<th>Role</th>
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
$sql="SELECT el.UEID AS UEID,el.user AS Username,el.password as Password ,el.isFirst,r.id as r_id,d.id as dept_id,dg.id as deg_id, 
r.name AS Role_Id,d.name AS Department, dg.name AS Designation 
FROM emp_login el 
LEFT JOIN emp_col_relation ecr ON ecr.UEID=el.UEID 
LEFT JOIN role r ON r.id=ecr.role_id 
LEFT JOIN department d ON d.id= ecr.dept_id 
LEFT JOIN designation dg ON dg.id=ecr.deg_id
WHERE ecr.UEID=el.UEID AND el.isFirst=1
AND user like '%$user%'";

$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
	  <tr>
                <td><?php echo $result['UEID']; ?></td>
                <td><?php echo $result['Username']; ?></td>
                <td><?php echo $result['Password']; ?></td>
                <td><?php echo $result['Department']; ?></td>
                <td><?php echo $result['Designation']; ?></td>
                <td><?php echo $result['Role_Id']; ?></td>
                <td><?php if($result['isFirst']==1){
                	echo 'YES';
                }else{
                	echo 'NO';
                }?></td>
                <td><i style="cursor: pointer" onclick="edit('<?php echo $result['UEID']; ?>','<?php echo $result['Username']; ?>','<?php echo $result['Password']; ?>','<?php echo $result['r_id']; ?>','<?php echo $result['deg_id']; ?>','<?php echo $result['dept_id']; ?>')" class="fa fa-edit"></i></td>
                <td><i style="cursor: pointer" onclick="remove('<?php echo $result['UEID']; ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>