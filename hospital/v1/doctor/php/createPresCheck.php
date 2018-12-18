<?php
	require '../db.php';

	if(isset($_REQUEST['submit'])){

		$hname = $_REQUEST['hname'];
		$dname = $_REQUEST['dname'];
		$did = $_REQUEST['did'];
		$dcontact = $_REQUEST['dcontact'];
		$date = $_REQUEST['date'];
		$pid= $_REQUEST['patientid'];
		$disease = $_REQUEST['disease'];
		$medicine = $_REQUEST['medicine'];
		$test = $_REQUEST['test'];
		$comment = $_REQUEST['comment'];
		
		$error = array();
		if($hname == ''  ){			
			$error[] = "Name is required" ;			
		}
		if($dname == ''  ){		
			$error[] = "Name is required" ;			
		}
		else if(!preg_match("/^[A-Za-z ]*$/", $dname )){
			$error[] = "Only letters and white space allowed" ; 			
		}		
		if($did == '' ){
			$error[] = "Doctor Id is required" ;			
		}
		if($dcontact== ''){
			$error[] = " Phone number is required" ;			
		}
		if($date == '' ){
			$error[] = "Current date  is required" ;			
		}

		if($pid == '' ){
			$error[] = "Patient Id is required" ;			
		}
		if($disease == '' ){
			$error[] = "This field is required" ;						
		}
		
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}
		else{
				$conn = getConnection();												
				$sql = "INSERT INTO prescription values( NULL, '".$did."','".$pid."','".$date."','".$disease."','".$test."','".$medicine."','".$comment."')";

					if(mysqli_query($conn, $sql)){
						echo "Prescription is created";
					}else{
							echo "failed";
						}

					mysqli_close($conn);
				
				

			
		}

	}else{
		header('location: ../prescription.php');
	}

?>