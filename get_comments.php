<?php 

header("Access-Control-Allow-Origin: *");
	 $conn = mysqli_connect('localhost','root','','db_lms');
	if (!$conn) {
		echo "Database connection failed";
	}
		if(isset($_POST['activity_id'])){
		$activity_id = $_POST['activity_id'];

		$query = "SELECT comment_table.id, comment_table.comment, comment_table.user_id, comment_table.activity_id, comment_table.created_date, user_table.firstname, user_table.middlename, user_table.lastname 
		FROM comment_table INNER JOIN user_table ON comment_table.user_id = user_table.user_id WHERE activity_id = '".$activity_id."'";
		$query_result = mysqli_query($conn,$query);

		$activities = array();

		while($rowData = mysqli_fetch_assoc($query_result)){
			
			$comments[] = $rowData;

		}

			echo json_encode($comments);
	
	}

	$conn -> close();

	

?>
