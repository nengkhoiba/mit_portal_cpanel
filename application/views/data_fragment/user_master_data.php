
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
$sql="SELECT el.UEID AS UEID,el.user AS Username,el.password as Password ,el.isFirst,
ecr.role_id AS Role_Id,ecr.dept_id AS Department, ecr.deg_id AS Designation 
FROM emp_login el LEFT JOIN emp_col_relation ecr ON ecr.UEID=el.UEID 
LEFT JOIN role r ON r.id=ecr.role_id WHERE ecr.UEID=el.UEID AND el.isFirst='1'
";

/*
 * 
 * SELECT `UEID`, `user`,`password`, `isFirst` FROM `emp_login` WHERE
isFirst='1'
 * 
 * 
 * 
 * 
 * SELECT el.UEID AS UEID,el.user AS Username,el.password as Password ,ecr.role_id AS Role_Id,ecr.dept_id AS Department 
 * FROM emp_login el LEFT JOIN emp_details ed ON ed.UEID=el.UEID 
 * LEFT JOIN emp_col_relation ecr ON ecr.UEID=el.UEID 
 * LEFT JOIN role r ON r.id=ecr.role_id WHERE el.UEID=ecr.UEID AND ed.isActive=1
 * 
 * 
 * 
 * 
 * 
 * $sql="SELECT el.UEID AS UEID,ed.name AS empName,ecr.role_id AS role_id,r.name AS role   FROM emp_login el
				LEFT JOIN emp_details ed ON ed.UEID=el.UEID
				LEFT JOIN emp_col_relation ecr ON ecr.UEID=el.UEID
				LEFT JOIN role r ON r.id=ecr.role_id
				WHERE
				el.user='$username'
				AND el.password='$password'
				AND ed.isActive=1 ";
 * 
 */

/*$sql="SELECT `UEID`, `user`,`password`, `isFirst` FROM `emp_login` WHERE
user like '%$user%'
AND isFirst='$isFirst'*/


$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
	  <tr>
                <td><?php echo $result['UEID']; ?></td>
                <td><?php echo $result['Username']; ?></td>
                <td><?php echo $result['Password']; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php if($result['isFirst']==1){
                	echo 'YES';
                }else{
                	echo 'NO';
                }?></td>
                <td><i style="cursor: pointer" onclick="edit('<?php echo $result['UEID']; ?>','<?php echo $result['Username']; ?>','<?php echo $result['Password']; ?>')" class="fa fa-edit"></i></td>
                <td><i style="cursor: pointer" onclick="remove('<?php echo $result['UEID']; ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>