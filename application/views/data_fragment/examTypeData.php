<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>USID</th>
                <th>Name</th>
                <th>MU Roll</th>
                <th>Registration No.</th>
				<th>Course</th>
				<th>Trade</th>
				<th>Semester</th>
            </tr>
        </thead>
       
        <tbody>
        <?php
        $sem=$_GET['j'];
        $course=$_GET['q'];
        $trade=$_GET['k'];
		$sql="SELECT sd.USID as USID,CONCAT(sd.firstname,' ', sd.middlename,' ', sd.lastname)as Name,scr.MU_roll as MU_Roll,scr.reg_no as Registration_No,
		c.name as Course,t.name as Trade,s.name as Semester 
		FROM student_details sd LEFT JOIN std_col_relation scr ON scr.USID=sd.USID
		LEFT JOIN admission_std_relation asr ON asr.USID=sd.USID
        LEFT JOIN course c ON scr.course_id = c.id 
 		LEFT JOIN semester s ON asr.sem_id = s.id 
  		LEFT JOIN trade t ON scr.trade_id = t.id 
		WHERE scr.course_id= CASE WHEN $course=0 THEN scr.course_id ELSE '$course' END 
		AND scr.trade_id=  CASE WHEN $trade=0 THEN scr.trade_id ELSE '$trade' END  
		AND asr.sem_id= CASE WHEN $sem=0 THEN asr.sem_id ELSE '$sem' END 

";
$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
	
	?>
	  <tr style="cursor: pointer" onclick="loadDT_Exam('<?php echo $result['USID']; ?>','<?php echo $result['Name']; ?>','<?php echo $result['MU_Roll']; ?>','<?php echo $result['Registration_No']; ?>','<?php echo $sem; ?>','<?php echo $this->session->userdata('session'); ?>')">
                <td ><?php echo $result['USID']; ?></td>
                <td><?php echo $result['Name']?></td>
                <td><?php echo $result['MU_Roll']?></td>
                <td><?php echo $result['Registration_No']?></td>
                <td><?php echo $result['Course']?></td>
                <td><?php echo $result['Trade']?></td>
                <td><?php echo $result['Semester']?></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>
            