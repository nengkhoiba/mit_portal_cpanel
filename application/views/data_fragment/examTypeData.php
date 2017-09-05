<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Exam Type Name</th>
                <th>Active</th>
                <th>Edit</th>
				<th>Remove</th>
            </tr>
        </thead>
       
        <tbody>
        <?php
      		$examType=$_GET['q'];
			$isActive=$_GET['j'];
$sql="SELECT `id`, `name`, `isActive` FROM `exam_type` WHERE
		name like '%$examType%'
AND isActive='$isActive'
";
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
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>
            