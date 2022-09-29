<?php 
//session_start();
header("Access-Control-Allow-Origin: *");
	 $db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}

	if(isset($_POST['comment']) && isset($_POST['user_id']) && isset($_POST['activity_id'])){
		$comment = $_POST['comment'];
		$user_id = $_POST['user_id'];
		$activity_id = $_POST['activity_id'];


		$sql = "INSERT INTO comment_table (comment,user_id,activity_id) VALUES ('".$comment."',
		(SELECT user_id FROM user_table WHERE user_id = '".$user_id."'),
		(SELECT id FROM activity_table WHERE id = '".$activity_id."'))";
		
		
		$result = mysqli_query($db,$sql);
	
		if ($result) {
			echo json_encode("Success");

		  } else {
			echo json_encode ("Error");
		  }

		}
		  
		
		  $db -> close();
	



?>
