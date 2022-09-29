<?php 
//session_start();
header("Access-Control-Allow-Origin: *");
	 $db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}
	
	if(isset($_POST['learner_id_fk'])){
		$learner_id = $_POST['learner_id_fk'];

	$query = "SELECT tbl_learner_courses.id, tbl_learner_courses.course_id_fk, tbl_learner_courses.learner_id_fk, course_table.course_description, course_table.course_code 
	FROM tbl_learner_courses INNER JOIN course_table ON tbl_learner_courses.course_id_fk = course_table.course_id WHERE learner_id_fk = '".$learner_id."'";

	$result = mysqli_query($db,$query);
	$courses = array();

	while($row =  mysqli_fetch_assoc($result)){
		$courses[] = $row;
	}
	

	
}

	echo json_encode($courses);


	$db -> close();

?>
