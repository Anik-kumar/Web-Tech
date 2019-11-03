<?php
	require '../db.php';

	if(isset($_REQUEST['submit'])){

		$did = $_REQUEST['did'];
		$date = $_REQUEST['date'];
		$pid= $_REQUEST['patientid'];
		$disease = $_REQUEST['disease'];
		$medicine = $_REQUEST['medicine'];
		$test = $_REQUEST['test'];
		$comment = $_REQUEST['comment'];
		
		$error = array();

		if($did == '' ){
			$error[] = "Doctor Id is required" ;			
		}
		if($date == '' ){
			$error[] = "Current date  is required" ;			
		}
		if($pid == '' ){
			$error[] = "Patient Id is required" ;			
		}
		if($disease == '' ){
			$error[] = "Disease field is required" ;
		}
		if($medicine == '' ){
			$error[] = "Medicine field is required" ;
		}
		if($test == '' ){
			$error[] = "Test field is required" ;
		}
		if($comment == '' ){
			$error[] = "Comment field is required" ;
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
                header('location: ../createPrescription.php?flag=done');
            }else{
                header('location: ../createPrescription.php?flag=fail');
            }
            mysqli_close($conn);
		}

	}else{
		header('location: ../createPrescription.php');
	}

?>