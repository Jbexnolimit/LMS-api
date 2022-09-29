<?php 

header("Access-Control-Allow-Origin: *");
	 $db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}

	$userId = $_POST['user_id'];


	$sql = "SELECT * FROM user_table WHERE user_id = '".$userId."'";

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
