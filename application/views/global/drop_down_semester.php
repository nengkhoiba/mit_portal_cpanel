<select name="OptSemester" class="form-control form-control-lg" id="OptSemester">
  								<option value=0>Select</option>
  								
  								
  								
  
    <?php $sql="SELECT `id`, `name`, `isActive` FROM `semester` WHERE isActive=1 ";
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