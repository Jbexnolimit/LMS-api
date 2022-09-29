<?php 

//session_start();

header("Access-Control-Allow-Origin: *");
$db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}

	//if( isset( $_SESSION['login_user'])){
//	$user_check = $_SESSION['login_user']; 


	// $sql = "SELECT * FROM user_table WHERE email = '$user_check'";
	$sql = "SELECT * FROM user_table WHERE email = '".$user_check."'";
	$result = mysqli_query($db,$sql);

	$row = mysqli_fetch_assoc($result);

	$email = $row['email'];
	$user_id = $row['user_id'];
	
	$firstname = $row['firstname'];
	$middlename = $row['middlename'];
	$lastname = $row['lastname'];
	$fullname = $firstname . ' ' . $middlename . ' ' . $lastname;

	$usertype_id = $row['usertype_id'];
	$course_id = $row['course_id'];
	$is_active = $row['is_active'];

	echo json_encode($user_check);


	if(!isset($user_check)){
		mysqli_close($connection); // Closing Connection
		}

	//}
?>
