<?php

	require_once('../db.php');

	if(isset($_REQUEST['submit'])){		
		$fname = $_REQUEST['firstname'];
		$lname = $_REQUEST['lastname'];		
		$email = $_REQUEST['email'];
		$contact = $_REQUEST['contact'];
		
		$error = array();
		if($fname == '' || $lname=='' ){			
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
				session_start();
				$userid = $_SESSION['id'];

				$sql = "UPDATE employee set first_name='".$fname."', last_name='".$lname."', email='".$email."',contact_no='".$contact."' where UserID= '".$userid."' "  ;
				$sql2 = "UPDATE all_users2 set user_first_name='".$fname."', user_last_name='".$lname."', user_email='".$email."', contact_no='".$contact."' where uemp_id= '".$userid."' "  ;

				if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
					echo "Update Successfull";
					header("location: ../viewDocProfile.php");
				}else{
					
					header('location: ../updateDocProfile.php?UserID='.$userid);
				}

				mysqli_close($conn);
		}

	}else{
		header('location: ../doctorHome.php');
	}

?>