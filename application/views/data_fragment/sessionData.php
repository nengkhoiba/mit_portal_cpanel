<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>ID</th>
<th>Session Name</th>
<th>Active</th>
<th>Edit</th>
<th>Remove</th>
<th>Status</th>
</tr>
</thead>

<tbody>
<?php
$session=$_GET['q'];
$isActive=$_GET['j'];
$sql="SELECT `id`, `name`, `isActive` FROM `session` WHERE
		name like '%$session%'
AND isActive=CASE WHEN '$isActive'=2 THEN isActive ELSE '$isActive' END";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php if($result['isActive']==1){
                	echo 'YES';
                          }else{
                	echo 'NO'; 
                          }?></td>
                <td><i style="cursor: pointer" onclick="edit('<?php echo $result['id']; ?>','<?php echo $result['name']; ?>')" class="fa fa-edit"></i></td>
                <td><i style="cursor: pointer" onclick="remove('<?php echo $result['id']; ?>')" class="fa fa-remove"></i></td>

               <?php 
                if($result['isActive']==1){
                ?>
                 <td><label style="cursor: pointer" class="btn btn-success" disabled>Active</label></td>
               
                <?php
                }else{
                 ?>
                 <td><label style="cursor: pointer" onclick="enable('<?php echo $result['id']; ?>')" class="btn btn-warning">Set As Current</label></td>

               
            </tr>
	<?php 
                }	
}
}
?>
          
            
            
  </tbody>
 </table>
            