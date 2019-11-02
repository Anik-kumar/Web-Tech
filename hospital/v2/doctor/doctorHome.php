<?php 
	//include ('header.php');
	error_reporting(0);
	session_start();
	include ('db.php');
	$conn = getConnection();
	if(isset($_SESSION['id']) || isset($_COOKIE['email'])){
		echo " ";
	}else{
		header("location: ../login.php");
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Profile</title>
</head>
<body>

	<form>
	<fieldset>
		<legend>Home Page</legend>
		<table>
			<tr>
				<td>
					<h2> <?php echo "Welcome"." ".$_SESSION['first_name']."!!!!"; ?></h2></br>
					<a href="viewDocProfile.php">View Profile</a></br>
					<a href="updateDocProfile.php">Update Profile</a></br>
					<a href="AppoinmentList.php">Appointment List</a></br>
					<a href="NewAppointment.php">New Appointment</a></br>
					<a href="confirmAppointments.php">Confirm Appointment</a></br>
					<a href="viewAppointments.php">View All Appointment</a></br>
					<a href="OTSchedule.php">OT Schedule</a></br>
					<a href="createPrescription.php">Create Prescription</a></br>
					<a href="updatePrescription2.php">View Prescription</a></br>
					<a href="changePassword.php">Change Password</a></br>
					<a href="../logout.php">Logout</a>
				</td>
			</tr>
		</table>
		</fieldset>
	</form>
			
					
	

</body>
</html>