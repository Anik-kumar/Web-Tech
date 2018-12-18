
<?php require_once 'db.php';
	session_start();

	$id = $_REQUEST['id'];
	$user = $_REQUEST['user'];
	$conn = getConnection();

	if($user == 'Patient'){
		$query = "DELETE FROM patients WHERE patient_id='".$id."'";
		$query2 = "DELETE FROM all_users2 WHERE upatient_id='".$id."'";
		if(mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
			header('location: deleteEmp.php?status=done');
		}else{
            echo "<script type='text/javascript'> alert('SQL error')</script>";
		}
	}else{
		$query = "DELETE FROM employee WHERE emp_id='".$id."'";
		$query2 = "DELETE FROM all_users2 WHERE uemp_id='".$id."'";
		if(mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
			header('location: deleteEmp.php?status=done');
		}else{
            echo "<script type='text/javascript'> alert('SQL error')</script>";
		}
	}


 ?>