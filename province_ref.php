<?php 
header("Access-Control-Allow-Origin: *");
	$db = mysqli_connect('localhost','root','','db_lms');
	if (!$db) {
		echo "Database connection failed";
	}
	

	$query = "SELECT * FROM tbl_ref_province ORDER BY province asc";
	$result = mysqli_query($db,$query);

	$list = array();



	while($rowdata = mysqli_fetch_assoc($result))
	{
		$list[] = $rowdata;
	}	

	echo json_encode($list);



?>
