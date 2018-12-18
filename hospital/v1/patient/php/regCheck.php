<?php
    
	require '../db.php';

	if(isset($_REQUEST['submit'])){
        $uid = $_REQUEST['userid'];
		$fname = $_REQUEST['firstname'];
		$lname = $_REQUEST['lastname'];
		$email = $_REQUEST['email'];
		$contact = $_REQUEST['contact'];
		$pass = $_REQUEST['password'];
		$repass = $_REQUEST['repassword'];
		$gender = '';
		if(isset($_REQUEST['gender'])){
			$gender = $_REQUEST['gender'];
		}
		$BG = $_REQUEST['bg'];
		$DOB = $_REQUEST['dob'];
		$type = $_REQUEST['type'];
		
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
		if($uid == '' ){
			$error[] = "UserId is required" ;			
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
		if($pass == '' ){
			$error[] = "Password is required" ;						
		}
		else if(strlen($pass)<6 ){
			$error[] = "Password length must be six"  ;			
		}	
		if($pass != $repass ){
			$error[] = "Password and repassword does not match" ;						
		}	
		if($gender == '' || $BG =='' || $DOB =='' || $type ==''){
			$error[] = "Must be filled" ;						
		}
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}
		else{

			if(($pass == $repass) && (strlen($pass)>=6) ){


				$conn = getConnection();
				$sql2 = "select * from reg where ID = '$uid' ";
				$result = mysqli_query($conn, $sql2);
				$data = mysqli_fetch_assoc($result);
				if( $data > 0){
					echo "User ID already exist" ;
					
				}else{	

				    $sql = "INSERT INTO reg values('".$uid."','".$fname."','".$lname."','".$email."','".$contact."','".$pass."','".$gender."','".$BG."','".$DOB."','".$type."')";

					if(mysqli_query($conn, $sql)){
						echo "Successful";
				}else{
						echo "failed";
					
				    }

					mysqli_close($conn);
				
				}

			}
		}

	}else{
		header('location: ../registration.php');
	}

?>