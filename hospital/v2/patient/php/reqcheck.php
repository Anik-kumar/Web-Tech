<?php
    
	require '../db.php';

	if(isset($_REQUEST['submit'])){
		$Did = $_REQUEST['doctorname'];
		$Pid = $_REQUEST['patientid'];
		$Pname = $_REQUEST['patientname'];
		$date = $_REQUEST['date'];
		$time = $_REQUEST['time'];

		
		$error = array();
		if($Did == '' ){
			$error[] = "Doctor Id is required" ;			
		}
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
		
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}
		else {

            $conn = getConnection();

            $sql = "INSERT INTO appointment values( NULL, '" . $Did . "','" . $Pid . "','" . $date . "','" . $time . "')";
            echo $sql;

            if (mysqli_query($conn, $sql)) {
                echo " REQUEST SUCCESSFUL";
            } else {
                echo "FAILD";
            }

            mysqli_close($conn);
        }

	}else{
		header('location: ../reqAppoitnment.php');
	}

?>