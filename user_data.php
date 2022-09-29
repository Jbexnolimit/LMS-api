<?php 
//session_start();
header("Access-Control-Allow-Origin: *");
	 $db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}


	$email = $_POST['email'];


	$sql = "SELECT * FROM user_table WHERE email = '".$email."'";

	$result = mysqli_query($db,$sql);


	if($result->num_rows > 0)
	{
		while($row[] = $result->fetch_assoc()){

			$tem = $row;

			$json = json_encode($tem);

		}



	}

	else {
		echo json_encode("No Data Found");
	}

	echo $json;

	
	$db -> close();


?>
