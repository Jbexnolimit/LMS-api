<?php 

	//session_start();

	header("Access-Control-Allow-Origin: *");
	$db = mysqli_connect('localhost','root','','db_lms');

	// try{
	// if (empty($_POST['email']) || empty($_POST['password'])) {
	// 	throw new Exception("email or Password is empty!");
	// }else{

	

	$email = $_POST['email'];
	$password = $_POST['password'];

	// $email = "jbexautomatic@gmail.com";
	// $password = "111";

	$sql = "SELECT * FROM user_table WHERE email = '".$email."' AND password = '".$password."'";

	$result = mysqli_query($db,$sql);

	$count = mysqli_num_rows($result);
	//$row = mysqli_fetch_assoc($result);

	//$_POST['id'] = $row['course_id'];
	//$_SESSION['id'] = $row['course_id'];

	if ($count == 1){
		echo json_encode("Success");
	}

	$db -> close();
	
	
	//	}

	// }
	// catch (Exception $e) {
    //     $_SESSION['login_error'] = $e->getMessage();
    // }


	
?>
