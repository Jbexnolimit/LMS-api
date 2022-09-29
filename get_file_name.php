<?php 
//session_start();
header("Access-Control-Allow-Origin: *");
	 $db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}

//	$course_id = '2'
	
	$_SESSION['login_user'] = "2";



?>
