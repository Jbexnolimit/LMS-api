<?php 
//session_start();
header("Access-Control-Allow-Origin: *");
	 $db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}

	$query = "SELECT * FROM learningfiles_table WHERE learningfile_id = 7";
	$result = mysqli_query($db,$query);
	$activities = array();

	while($row =  mysqli_fetch_assoc($result)){
	
		$activities[] = $row;
	
	}

	foreach($activities as $key=>$value){
		$newArrData[$key] =  $activities[$key];
		$newArrData[$key]['file'] = base64_encode($activities[$key]['file']);
		//$newArrData[$key]['thumbnail'] = base64_encode($spots[$key]['thumbnail']);
	}
	header('Content-type: application/json');
	echo json_encode($newArrData);


	//echo json_encode($activities);


?>
