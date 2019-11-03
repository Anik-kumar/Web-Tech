<?php
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Doctor Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/doctor.css">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
        <div class="container" id="firstContainer">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <a href="doctorHome.php" class="navbar-brand"> <img alt="Hospital Logo" src="../assets/images/Hospital_Logo_02.png"> </a>
            </div>
            <div class="collapse navbar-collapse" id="collapse1">
                <ul class="nav navbar-nav gap">
                    <li> <a href="doctorHome.php" >Home</a> </li>
                    <li><a href="../changePassword.php">Change Password</a></li>
                    <li><a href="../viewProfile.php">Profile</a></li>
                    <li>
                        <form action="../admin/searchAll.php" method="post" class="form-inline">
                            <input type="text" name="searchText" class="form-control" id="searchTest">
                            <button type="submit" name="searchBtn" class="btn btn-default">Search</button>
                        </form>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../viewProfile.php"><?php echo $name; ?></a></li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- body start -->
    <div class="container-fluid" id="left">
        <div class="row">
            <!-- sidebar start -->
            <div class="col-md-3 col-sm-12" id="sidebar">
                <ul class="nav nav-pills nav-stacked navbar-inverse">
                    <li><a href="viewAppointmentList.php">Appointments</a>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="viewAppointmentList.php">Appointment List</a></li>
                            <li><a href="confirmAppointments.php">Confirm Appointment</a></li>
                            <li><a href="newAppointment.php">New Appointment</a></li>
                        </ul>
                    </li>
                    <li><a href="../changePassword.php">Change Password</a></li>
                    <li><a href="../admin/showDepartments.php">Departments</a>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="../admin/showDepartments.php">Show Departments</a></li>
                        </ul>
                    </li>
                    <li><a href="otSchedule.php">OT Schedule</a></li>
                    <li><a href="../admin/addOtSchedule.php">Add OT Schedule</a></li>
                    <li><a href="showAllPrescription.php">Prescription</a>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="createPrescription.php">Create Prescription</a></li>
                            <li><a href="showAllPrescription.php">Show Prescription</a></li>
                        </ul>
                    </li>


                    <li><a href="../admin/showPatientApplication.php">Show Patient Application</a></li>
                    <li><a href="../admin/showAdmittedPatients.php">Show Admitted Patients</a></li>
                    <li><a href="../admin/showRooms.php">Show Rooms</a></li>
                    <li><a href="../admin/showPatients.php">Show Patients</a></li>
                    <li><a href="viewDocProfile.php">View Profile</a></li>
                </ul>
            </div>
            <!-- sidebar end -->

            <!-- content part -->
            <div class="col-md-9 col-sm-12">
                <div class="container" id="center">
                    <div id="back">
                        <h1>Doctor Home Page</h1>
                        <h2>Welcome <?php echo $_SESSION['first_name']."!!!!"; ?></h2><br>
                        <a href="viewDocProfile.php">View Profile</a><br>
                        <a href="updateDocProfile.php">Update Profile</a><br>
                        <a href="viewAppointmentList.php">Appointment List</a><br>
                        <a href="newAppointment.php">New Appointment</a><br>
                        <a href="confirmAppointments.php">Confirm Appointment</a><br>
                        <a href="otSchedule.php">OT Schedule</a><br>
                        <a href="createPrescription.php">Create Prescription</a><br>
                        <a href="showAllPrescription.php">Show Prescriptions</a><br>
                        <a href="../changePassword.php">Change Password</a><br>
                        <a href="../logout.php">Logout</a>
                    </div>

                    <div>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <!-- end of content part	 -->
        </div>
    </div>

    <div class="container" id="center">
        <div id="back">

        </div>
    </div>




			
					
	

</body>
</html>