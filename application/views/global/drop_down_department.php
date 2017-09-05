
 <select  class="form-control form-control-lg " id="optDept" name="optDept">
 <option value='0'>- Select - </option>
 
 <?php $sql="SELECT `id`, `name`  FROM `department` WHERE `isActive`=1" ;

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