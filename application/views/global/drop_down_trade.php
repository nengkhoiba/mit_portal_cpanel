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
