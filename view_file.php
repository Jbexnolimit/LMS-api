<?php 
//session_start();

	
	$id = isset($_GET['id'])? $_GET['id'] : "";
	$dbh = new PDO("mysql:host=localhost;dbname=db_lms", "root", "");
	//$id = 5;
	$stat = $dbh->prepare("SELECT * FROM learningfiles_table where learningfile_id=?");
	$stat->bindParam(1, $id);
	$stat->execute();
	$row = $stat->fetch();
	header('Content-Type:'.$row['mime']);

	echo $row['file'];

	//echo "<embed src='data:".$row['mime'].";base64,".base64_encode($row['file'])."'/>";
	

?>
