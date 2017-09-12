<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Exam Type Name</th>
                <th>Active</th>
                <th>Edit</th>
				<th>Remove</th>
            </tr>
        </thead>
       
        <tbody>
        <?php
        $sem=$_GET['j'];
        $course=$_GET['q'];
        $trade=$_GET['k'];
$sql="SELECT sd.USID as USID,CONCAT(sd.firstname, sd.middlename, sd.lastname)as Name,scr.MU_roll as MU_Roll,scr.reg_no as Registration_No,
		scr.course_id as Course,scr.trade_id as Trade,asr.sem_id as Semester 
		FROM student_details sd LEFT JOIN std_col_relation scr ON scr.USID=sd.USID
		LEFT JOIN admission_std_relation asr ON asr.USID=sd.USID
		WHERE scr.course_id=1 
		AND scr.trade_id= 1 
		AND asr.sem_id= 1 

";
$query = $this->db->query($sql);
if($query){
	while($result=mysql_fetch_array($query->result_id)){
	
	?>
	  <tr onclick="loadDT_Exam()">
                <td ><?php echo $result['USID']; ?></td>
                <td><?php echo $result['Name']?></td>
                <td><?php echo "helo";?></td>
                
                <td><i style="cursor: pointer" onclick="edit('<?php echo $result['USID']; ?>','<?php echo $result['Name']; ?>')" class="fa fa-edit"></i></td>
                <td><i style="cursor: pointer" onclick="remove('<?php echo $result['USID']; ?>')" class="fa fa-remove"></i></td>
               
            </tr>
	<?php 
	
}
}
?>
          
            
            
  </tbody>
 </table>
            