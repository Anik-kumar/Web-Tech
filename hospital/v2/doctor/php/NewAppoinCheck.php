<?php
	require '../db.php';

	if($_REQUEST['status']=="done"){

		$did = $_REQUEST['did'];
		$pid = $_REQUEST['pid'];
		$date = $_REQUEST['date'];
		$time = $_REQUEST['time'];

        $conn = getConnection();
        $sql = "INSERT INTO appointment values( NULL, '".$did."','".$pid."','".$date."','".$time."', NULL)";
//				echo $sql;
        if(mysqli_query($conn, $sql)){
            echo "Appointment is created";
        }else{
            echo "failed ".mysqli_error($conn);
        }
        mysqli_close($conn);
	}else{
		header('location: ../newAppointment.php');
	}

?>