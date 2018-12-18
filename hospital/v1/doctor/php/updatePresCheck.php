<?php
	require '../db.php';

	if(isset($_REQUEST['submit'])){

		$pid = $_REQUEST['pid'];
		$dcontact = $_REQUEST['dcontact'];
		$date = $_REQUEST['date'];				
		$page = $_REQUEST['page'];
		$disease = $_REQUEST['disease'];
		$medicine = $_REQUEST['medicine'];
		$test = $_REQUEST['test'];
		$comment = $_REQUEST['comment'];
		
		$error = array();
		
		if($dcontact== ''){
			$error[] = " Phone number is required" ;			
		}		
		else if(strlen($dcontact)!= 11 ){
			$error[] = "Invalid Phone number" ;			
		}
		if($date == '' ){
			$error[] = "Current date  is required" ;			
		}
				
		if ($page == '') {
			$error[] = "Age is required" ; 				
		}
		
		if($disease == '' ){
			$error[] = "This field is required" ;						
		}
		/*if(strlen($comment)<10 or strlen($comment)>50 ){
			$error[] = "Comment  must be between 10 to 50 words"  ;			
		}*/	
		
		if(!empty($error)){
			foreach ($error as $value) {
				echo "$value <br>";
			}
		}
		else{
				$conn = getConnection();												
				$sql = "UPDATE prescription set prescrip_date='".$date."', disease='".$disease."', medicine='".$medicine."', tests='".$test."', comment='".$comment."' where pat_id= '$pid' "  ;

					if(mysqli_query($conn, $sql)){
						echo "Prescription is updated";
					}else{
							echo "failed";
						}

					mysqli_close($conn);
							
		}

	}else{
		header('location: ../UpdatePrescription.php');
	}

?>