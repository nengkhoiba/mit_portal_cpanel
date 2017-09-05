<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Page</th>
                <th>Action</th>
            </tr>
        </thead>
       
        <tbody>
        <?php
      		$role=$_GET['q'];
			$isActive=$_GET['j'];
$sql="SELECT sm.id, sm.name , (SELECT count(*) from page_manager pm where pm.site_map_id=sm.id AND pm.role_id='$role' AND pm.isActive =1 ) AS pageEnable
FROM site_map sm
WHERE sm.isActive=1
";
$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
	
	?>
	  <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <?php 
                if($result['pageEnable']==1){
                ?>
                 <td><label style="cursor: pointer" onclick="disable('<?php echo $result['id']; ?>','<?php echo $role ?>')" class="btn btn-danger">Disable</label></td>
               
                <?php
                }else{
                 ?>
                 <td><label style="cursor: pointer" onclick="enable('<?php echo $result['id']; ?>','<?php echo $role ?>')" class="btn btn-success">Enable</label></td>
               
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