<?php
$role=$this->session->userdata('Role');
$sql="SELECT sm.id,sm.url,sm.name,sm.css,sm.site_map_id from site_map sm 
LEFT JOIN page_manager pm on pm.site_map_id=sm.id
LEFT JOIN role r on r.id=pm.role_id

WHERE r.name='$role'
AND pm.isActive=1
AND sm.site_map_id=0
"
		;
$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
	$sitemapId=$result['id'];

	$sql1="SELECT sm.url,sm.name,sm.css,sm.site_map_id from site_map sm
	LEFT JOIN page_manager pm on pm.site_map_id=sm.id
	LEFT JOIN role r on r.id=pm.role_id
	
	WHERE r.name='$role'
	AND pm.isActive=1
	AND sm.site_map_id='$sitemapId'
	"
	;
	$query1 = $this->db->query($sql1);
	if($query1->num_rows()>0)
	{
		?>
		
			
	<li class="treeview">
          <a href="#">
            <i class="<?php echo $result['css']; ?>"></i>
            <span><?php echo $result['name']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
		<?php
	if($query1){
		while($result1=mysql_fetch_array($query1->result_id)){
	
			?>
	
	
            <li><a href="<?php echo base_url(); ?><?php echo $result1['url']; ?>"><i class="<?php echo $result1['css']; ?>"></i> <?php echo $result1['name']; ?></a></li>
         
	<?php 
		}
	}
	
		
		?>
		
		
          </ul>
        </li>
		<?php 
	}else{
		
	?>
	<li><a href="<?php echo base_url(); ?><?php echo $result['url']; ?>"><i class="<?php echo $result['css']; ?>"></i> <span><?php echo $result['name']; ?></span></a></li>

	
	<?php
	}
	
}
}
?>
