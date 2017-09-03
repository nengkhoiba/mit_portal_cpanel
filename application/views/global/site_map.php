<?php
$role=$this->session->userdata('Role');
$sql="SELECT sm.url,sm.name,sm.css from site_map sm 
LEFT JOIN page_manager pm on pm.site_map_id=sm.id
LEFT JOIN role r on r.id=pm.role_id

WHERE r.name='$role'
AND pm.isActive=1";
$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
	
	?>
	<li><a href="<?php echo base_url(); ?><?php echo $result['url']; ?>"><i class="<?php echo $result['css']; ?>"></i> <span><?php echo $result['name']; ?></span></a></li>
	
	<?php 
	
}
}
?>
