<<<<<<< HEAD
<select name="OptTrade" class="form-control form-control-lg" id="OptTrade">
  								<option value=0>Select</option>
  								
  								
  								
  
    <?php $sql="SELECT `id`, `name`, `abv`, `isActive` FROM `trade` WHERE isActive=1";
    	$query=$this->db->query($sql);
    	if($query)
    	{
    	       while($result=mysql_fetch_array($query->result_id))
    	       {
    	           ?>
    	           <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
    	           <?php 
    	       }
    	}?>
    </select>
=======

 <select  class="form-control form-control-lg " id="ddlTrade" name="ddlTrade">
 <option value='0'>- Select - </option>
 
 <?php $sql="SELECT `id`, `name`  FROM `course` WHERE `isActive`=1" ;

$query = $this->db->query($sql);
if($query)
{
	
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
		<option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
		<?php 
	}
	
}

?>
 </select>
>>>>>>> b11b10b09de941f1aad387399baa60b62a825f80
