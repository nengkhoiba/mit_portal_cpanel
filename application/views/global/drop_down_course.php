
 <select  class="form-control form-control-lg " id="ddlCourse" name="ddlCourse">
 <option value='0'>- Select - </option>
 
 <?php $sql="SELECT `UEID`, `name`  FROM `emp_details` WHERE `isActive`=1" ;

$query = $this->db->query($sql);
if($query)
{
	
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
		<option value="<?php echo $result['UEID']?>"><?php echo $result['name']?></option>
		<?php 
	}
	
}

?>
 </select>