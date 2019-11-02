<?php
    
	require '../db.php';

	if(isset($_REQUEST['submit'])){
       
		$Pid = $_REQUEST['patientid'];
		$Pname = $_REQUEST['patientname'];
		$Dep = $_REQUEST['department'];
		$Dis = $_REQUEST['disease'];
		
		
		$error = array();
		
		if($Pid == '' ){
			$error[] = "Patient Id is required" ;			
		}
		if($Pname == ''){
			//header('location: registration.php?error=FirstName or lastName can not be empty');
			$error[] = "Patient Name is required" ;			
		}		
		else if(!preg_match("/^[A-Za-z ]*$/", $Pname )){
			$error[] = "Only letters and white space allowed" ; 			
		}
		if($Dep== ''){
			$error[] = " Department is required" ;			
		}
		if($Dis== ''){
			$error[] = " Disease is required" ;			
		}			
		
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}else{

		    $conn = getConnection();

		    $sql = "INSERT INTO patient_application values(NULL ,'".$Pid ."','".$Dep."','".$Dis."')";

            if(mysqli_query($conn, $sql)){
                echo "SUCCESSFUL";
            }else{
                echo "FAILD";

            }

            mysqli_close($conn);
		}

	}else{
		header('location: ../admit.php');
	}

?>