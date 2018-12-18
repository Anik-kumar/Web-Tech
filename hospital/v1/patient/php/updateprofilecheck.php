<?php

	require_once('../db.php');

	if(isset($_REQUEST['submit'])){
		
		$fname = $_REQUEST['firstname'];
		$lname = $_REQUEST['lastname'];		
		$email = $_REQUEST['email'];
		$contact = $_REQUEST['contact'];
		
		$error = array();
		if($fname == '' || $lname=='' ){
			//header('location: registration.php?error=FirstName or lastName can not be empty');
			$error[] = "Name is required" ;			
		}		
		else if(!preg_match("/^[A-Za-z ]*$/", $fname )){
			$error[] = "Only letters and white space allowed" ; 			
		}
		else if(!preg_match("/^[A-Za-z ]*$/", $lname )){
			$error[] = "Only letters and white space allowed" ; 			
		}		
	
		if ($email == '') {
			$error[] = "Email is required" ; 				
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error[] = "Invalid email format";			
		}
		if($contact== ''){
			$error[] = " Phone number is required" ;			
		}		
		else if(strlen($contact)!= 11 ){
			$error[] = "Invalid Phone number" ;			
		}
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}else{

				$conn = getConnection();
				session_Start();
				
				$userid = $_SESSION['id'];

				$sql = "UPDATE patients set first_name='".$fname."', last_name='".$lname."', email='".$email."',contact_no='".$contact."' where patient_id= '".$userid."' "  ;
				$sql2 = "UPDATE all_users2 set first_name='".$fname."', last_name='".$lname."', email='".$email."' where upatient_id= '".$userid."' "  ;

				if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
					echo "Update Successfull";
					header("location: ../profile.php");
				}else{
					
					header('location: ../updateprofile.php?ID='.$uid);
				}

				mysqli_close($conn);
		}

	}else{
		header('location: ../patienthome.php');
	}

?>