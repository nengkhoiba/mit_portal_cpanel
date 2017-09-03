<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>ID</th>
<th>Course Name</th>
<th>Abbrebiation</th>
<th>Active</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$course=$_GET['q'];
$isActive=$_GET['j'];
$abv=$_GET['k'];

$sql="SELECT `id`, `name`, `abv` ,`isActive` FROM `course` WHERE
		name like '%$course%'
AND isActive='$isActive'
";
$query = $this->db->query($sql);
if($query){
    while($result=mysql_fetch_array($query->result_id)){
        
        ?>
	  <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['abv']; ?></td>
                <td><?php echo $result['isActive']; ?></td>
                <td><i onclick="edit('<?php echo $result['id']; ?>','<?php echo $result['name']; ?>','<?php echo $result['abv']; ?>')" class="fa fa-edit"></i></td>
                <td><i onclick="remove('<?php echo $result['id']; ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>
            