<?php
	require '../db.php';

	if(isset($_REQUEST['submit'])){

		$did = $_REQUEST['did'];
		$dname = $_REQUEST['dname'];
		$pid = $_REQUEST['pid'];
		$pname = $_REQUEST['pname'];
		$date = $_REQUEST['date'];
		$time = $_REQUEST['time'];
		
		$error = array();
		if($did == '' || $dname=='' ){
			$error[] = "Doctor ID and Name is required" ;			
		}		
		else if(!preg_match("/^[A-Za-z ]*$/", $dname )){
			$error[] = "Only letters and white space allowed" ; 			
		}
		if($pid == '' || $pname=='' ){
			$error[] = "Patient ID and Name is required" ;			
		}
		else if(!preg_match("/^[A-Za-z ]*$/", $pname )){
			$error[] = "Only letters and white space allowed" ; 			
		}		
		if($date == '' ){
			$error[] = "date is required" ;			
		}	
		if ($time == '') {
			$error[] = "Time is required" ; 				
		}
	
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}
		else{
				$conn = getConnection();												
				$sql = "INSERT INTO appointment values( NULL, '".$did."','".$pid."','".$date."','".$time."', NULL)";
//				echo $sql;
					if(mysqli_query($conn, $sql)){
						echo "Appoinment is created";
					}else{
                        echo "failed ".mysqli_error($conn);
					}

					mysqli_close($conn);
				
			}
		

	}else{
		header('location: ../NewAppointment.php');
	}

?>