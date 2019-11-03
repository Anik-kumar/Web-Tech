<?php
//	error_reporting (0);
	session_start();
	include('db.php');
	$conn = getConnection();

	if(isset($_SESSION['id']) || isset($_COOKIE['email'])){
		echo " "  ;
	}else{
		header("location:../login.php");
//        print_r($_SESSION);
	}
?>	
	
		

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Patient Home</title>
    <link rel="stylesheet" type="text/css" href="../admin/vendors/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="patienthome.css">
</head>
<body>
    <div class="container">
        <form>
            <fieldset>
                <legend>Patient Home Page</legend>
                <table cellpadding="5">
                    <tr>
                        <td>
                            <h1>Welcome <?= $_SESSION['first_name'] ?> !! </h1>
                            <a href="profile.php" class="btn btn-default">Profile</a><br>
                            <a href="updateprofile.php" class="btn btn-default">Update profile</a><br>
                            <a href="doctorinfo.php" class="btn btn-default">Doctor Information</a><br>
                            <a href="reqAppointment.php" class="btn btn-default">Request Appoinment</a><br>
                            <a href="showappoinment.php" class="btn btn-default">Show Apooinment</a><br>
                            <a href="showprescription.php" class="btn btn-default">Show Prescription</a><br>
                            <a href="admit.php" class="btn btn-default">Take Admission</a><br>
                            <a href="changepass.php" class="btn btn-default">Change Pass</a><br>
                            <a href="../logout.php" class="btn btn-default">Logout</a><br>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>


	
	

</body>
</html>