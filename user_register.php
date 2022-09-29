
<?php 
header("Access-Control-Allow-Origin: *");
$db = mysqli_connect('localhost','root','','db_lms');
if (!$db) {
	echo "Database connection failed";
}	

			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "SELECT email FROM user_table WHERE email = '".$email."'";

			$result = mysqli_query($db,$sql);
			 
			$count = mysqli_num_rows($result);


			if ($count == 1) {

				//user exist
				echo json_encode("Error");
		
		
			}else{

				
			$usertype_id = getUsertypeId($db);
			$course_id = getCourseId($db);
			$address_details = getAddressDetails($db);
			$barangay_id = getBarangayId($db);
			$municipality_id = getMunicipalityId($db);
			$province_id = getProvinceId($db);

			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$date_of_birth = $_POST['date_of_birth'];
			$gender = $_POST['gender'];
			$contact_number = $_POST['contact_number'];
			$password = $_POST['password'];
		
	
		

		
		$insert = "INSERT INTO user_table(firstname,middlename,lastname,usertype_id,course_id,date_of_birth,gender,addressdetails,contact_number,email,password,status,is_active,barangay_id,municipality_id,province_id)
		VALUES('".$firstname."','".$middlename."','".$lastname."',
		(SELECT usertype_id FROM usertype_table WHERE usertype_id = '$usertype_id'),
		(SELECT course_id FROM course_table WHERE course_id = '$course_id'),
		'".$date_of_birth."','$gender','".$address_details."','".$contact_number."','".$email."','".$password."','1','0',
		(SELECT id FROM tbl_ref_barangay WHERE id = '$barangay_id'),
		(SELECT id FROM tbl_ref_municipality WHERE id = '$municipality_id'),
		(SELECT id FROM tbl_ref_province WHERE id = '$province_id'))";
		
			
		$query = mysqli_query($db,$insert);
		if ($query) {
			echo json_encode("Success");
		}

		mysqli_close($db);
	
	}
	


	function getUsertypeId($db){

		$usertype = $_POST['usertype'];


		$sql1 = "INSERT INTO usertype_table (usertype,is_active) VALUES ('$usertype','0')";
		$result = mysqli_query($db,$sql1);
	
		if ($result == TRUE) {
			$usertype_id = mysqli_insert_id($db);
			// $usertype_id = "New record created successfully. Last inserted ID is: " . $usertype_id;
		  } else {
			echo "Error";
		  }
		  
		  return $usertype_id;
	
	}

	function getCourseId($db){

		$course = $_POST['course'];

		$sql_course = "SELECT * FROM course_table WHERE course_code = '".$course."'";
		$result_course_id = mysqli_query($db,$sql_course);
		$row = mysqli_fetch_assoc($result_course_id);
		$course_id = $row['course_id'];
	
		return $course_id;
		
	}
	
	
	
	function getAddressDetails($db){

	
		$barangay_code = $_POST['barangay_code'];
		$municipality_code = $_POST['municipality_code'];
		$province_code = $_POST['province_code'];

		
		$sql_prov = "SELECT * FROM tbl_ref_province WHERE province_code = '".$province_code."'";
		$sql_mun = "SELECT * FROM tbl_ref_municipality WHERE municipality_code = '".$municipality_code."'";
		$sql_brngy = "SELECT * FROM tbl_ref_barangay WHERE barangay_code = '".$barangay_code."'";
	
		$result_prov = mysqli_query($db,$sql_prov);
		$result_mun = mysqli_query($db,$sql_mun);
		$result_brngy = mysqli_query($db,$sql_brngy);
	

		$row_prov = mysqli_fetch_assoc($result_prov);
		$province = $row_prov['province'];

		$row_mun = mysqli_fetch_assoc($result_mun);
		$municipality = $row_mun['municipality'];

		$row_brngy = mysqli_fetch_assoc($result_brngy);
		$barangay = $row_brngy['barangay'];

		$address_details = $barangay . ', ' . $municipality . ', ' . $province;
		 
		return $address_details;

	}

	function getBarangayId($db){

		$barangay_code = $_POST['barangay_code'];

		
		$sql_brngy = "SELECT * FROM tbl_ref_barangay WHERE barangay_code = '".$barangay_code."'";
		$result_brngy = mysqli_query($db,$sql_brngy);

		$row_brngy = mysqli_fetch_assoc($result_brngy);
		$id = $row_brngy['id'];

		return $id;
		
	}

	function getMunicipalityId($db){

	
		$municipality_code = $_POST['municipality_code'];
		
		
		$sql_municipality = "SELECT * FROM tbl_ref_municipality WHERE municipality_code = '".$municipality_code."'";
		$result_municipality = mysqli_query($db,$sql_municipality);

		$row_municipality = mysqli_fetch_assoc($result_municipality);
		$id = $row_municipality['id'];

		return $id;
		
	}

	function getProvinceId($db){

		
		$province_code = $_POST['province_code'];
		
		
		$sql_province = "SELECT * FROM tbl_ref_province WHERE province_code = '".$province_code."'";
		$result_province = mysqli_query($db,$sql_province);

		$row_province = mysqli_fetch_assoc($result_province);
		$id = $row_province['id'];

		return $id;
		
	}





	?>