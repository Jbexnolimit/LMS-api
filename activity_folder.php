<?php 

header("Access-Control-Allow-Origin: *");
	 $conn = mysqli_connect('localhost','root','','db_lms');
	if (!$conn) {
		echo "Database connection failed";
	}
		if(isset($_POST['course_id'])){
		$course_id = $_POST['course_id'];

		$query = "SELECT * FROM activity_folder WHERE course_id = '".$course_id."'";
		$query_result = mysqli_query($conn,$query);

		$activities = array();

		while($rowData = mysqli_fetch_assoc($query_result)){
			
			$activities[] = $rowData;
			

		}

			echo json_encode($activities);
	
	}

	$conn -> close();
	

?>
