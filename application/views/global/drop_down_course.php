
 <select  class="form-control form-control-lg " id="OptCourse" name="OptCourse">
 <option value=0 <?php echo isset($_GET['USID'])?set_select('OptCourse',0,FALSE):set_select('OptCourse','OptCourse',TRUE);?>>- Select - </option>
 
 <?php $sql="SELECT `id`, `name`  FROM `course` WHERE `isActive`=1" ;

$query = $this->db->query($sql);
if($query)
{
	
	while($result=mysql_fetch_array($query->result_id)){
		
		?>
		<option value="<?php echo $result['id']?>" <?php echo set_select('OptCourse',$result['id']);?>><?php echo $result['name']?></option>
		<?php 
	}
	
}

?>
 </select>