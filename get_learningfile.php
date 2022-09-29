<?php 
header("Access-Control-Allow-Origin: *");

	$dbh = new PDO("mysql:host=localhost;dbname=db_lms", "root", "");

	// if(isset($_POST['activity_id'])){
	// 	$activity_id = $_POST['activity_id'];
	$result = $dbh->prepare("SELECT * FROM learningfiles_table");
	$result->execute();
	$activities = array();

	while($row = $result->fetch()){
	
		echo("<li><a target='_blank' href='view_file.php?id='".$row['learningfile_id']."'>".$row['file_name']."</a><br/>
		<embed src='data:".$row['mime'].";base64,".base64_encode($row['file'])."' width='200'/></li>");

	//	$activities[] = "view_file.php?id=".$row['learningfile_id']."'";


	//	echo "<iframe src="https://docs.google.com/viewer?url=http://localhost/LMS/view_file.php&embedded=true"width="100%"height="400"></iframe>";
	
	}

	//echo json_encode($activities);

	
//}

?>
