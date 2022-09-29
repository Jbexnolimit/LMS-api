<?php 
header("Access-Control-Allow-Origin: *");
	$db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}
	
	
	$municipality_code = $_POST['municipality_code'];
	

	$query = "SELECT * FROM tbl_ref_barangay WHERE municipality_code = '".$municipality_code."' ORDER BY barangay asc";
	$result = mysqli_query($db,$query);

	$list = array();


	while($rowdata = mysqli_fetch_assoc($result))
	{
		$list[] = $rowdata;
	}	

	echo json_encode($list);


?>
