<?php 

header("Access-Control-Allow-Origin: *");
	 $conn = mysqli_connect('localhost','root','','db_lms');
	if (!$conn) {
		echo "Database connection failed";
	}
		if(isset($_POST['activityfolder_id'])){
		$folder_id = $_POST['activityfolder_id'];

		// SELECT activity_table.id, activity_table.activityfolder_id, activity_table.activity_title, activity_table.description, activity_table.created_date, learningfiles_table.file, learningfiles_table.file_name, learningfiles_table.mime
        // FROM activity_table INNER JOIN learningfiles_table ON activity_table.id = learningfiles_table.activity_id_fk;

		$query = "SELECT activity_table.id, activity_table.activityfolder_id, activity_table.activity_title, activity_table.description, activity_table.created_date, 
		learningfiles_table.learningfile_id, learningfiles_table.file, learningfiles_table.file_name, learningfiles_table.mime, learningfiles_table.activity_id_fk
        FROM activity_table INNER JOIN learningfiles_table ON activity_table.id = learningfiles_table.activity_id_fk WHERE activityfolder_id = '".$folder_id."'";
		$query_result = mysqli_query($conn,$query);

		$activities = array();

		while($rowData = mysqli_fetch_assoc($query_result)){
			
			$activities[] = $rowData;
			

		}

		foreach($activities as $key=>$value){
			$newArrData[$key] =  $activities[$key];
			$newArrData[$key]['file'] = base64_encode($activities[$key]['file']);
			//$newArrData[$key]['thumbnail'] = base64_encode($spots[$key]['thumbnail']);
		}
		header('Content-type: application/json');
		echo json_encode($newArrData);


			//echo json_encode($activities);
	
	}


	$conn -> close();

?>
