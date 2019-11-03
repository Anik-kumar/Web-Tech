
<?php require_once 'db.php';
	session_start();

	$patId = $_REQUEST['patId'];
	$empId = $_REQUEST['empId'];
	$user = $_REQUEST['user'];
	$page = $_REQUEST['page'];
	$conn = getConnection();

	if($user == 'patient'){
		$query = "DELETE FROM patients WHERE patient_id='".$patId."'";
		$query2 = "DELETE FROM all_users2 WHERE upatient_id='".$patId."'";
		if(mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
			header('location: showPatients.php?delStatus=done');
		}else{
            echo "<script type='text/javascript'> alert('SQL error')</script>";
            header('location: showPatients.php?delStatus=notdone');
		}
	}else{
		$query = "DELETE FROM employee WHERE emp_id='".$empId."'";
		$query2 = "DELETE FROM all_users2 WHERE uemp_id='".$empId."'";
		if(mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
			header('location: '.$page.'.php?delStatus=done');
		}else{
            echo "<script type='text/javascript'> alert('SQL error')</script>";
            header('location: '.$page.'.php?delStatus=notdone');
		}
	}


 ?>