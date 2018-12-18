<?php
error_reporting(E_ALL & ~E_NOTICE);
    require_once 'db.php';

	session_start();
	$name;
	if(isset($_SESSION['full_name']) && !empty(trim($_SESSION['full_name']))){
		$name = $_SESSION['first_name'];
		// echo "SESSION name ".$_SESSION['name'];
	}else{
		header("Location: ../login.php");
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/admin.css">
</head>
<body>
	

    <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <a href="admin.php" class="navbar-brand"> <img src="./resources/images/Hospital_Logo_02.png"> </a>
            </div>
            <div class="collapse navbar-collapse" id="collapse1">
                <ul class="nav navbar-nav gap">
                    <li> <a href="admin.php" >Home</a> </li>
                    <li><a href="changePassword.php">Change Password</a></li>
                    <li><a href="../viewProfile.php">Profile</a></li>
                    <li>
                        <form action="searchAll.php" method="post" class="form-inline">
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
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar start -->
            <div class="col-md-2 col-sm-12" id="sidebar">
                <ul class="nav nav-pills nav-stacked navbar-inverse">
                    <li><a href="addDepartment.php">Add Department</a></li>
                    <li><a href="addRoom.php">Add Room</a></li>
                    <li><a href="addRoomType.php">Add Room Type</a></li>
                    <li><a href="addEmp.php">Add Employee</a></li>
                    <li><a href="confirmAppointments.php">Confirm Appointment</a></li>
                    <li><a href="deleteEmp.php">Delete Employee</a></li>
                    <li><a href="showAppointments.php">Show Appointments</a></li>
                    <li><a href="showDepartments.php">Show Departments</a></li>
                    <li><a href="showOTschedules.php">Show Operation Schedules</a></li>
                    <li><a href="showPatientApplication.php">Show Patient Application</a></li>
                    <li><a href="showAdmittedPatients.php">Show Admitted Patients</a></li>
                    <li><a href="showRooms.php">Show Rooms</a></li>
                    <li><a href="showPatients.php">Show Patients</a></li>
                    <li><a href="showEmp.php">Show Employees</a></li>
                    <li><a href="updateProfileAdmin.php">Update Profile</a></li>
                    <li><a href="updateInfo.php">Update Users Profile</a></li>
                </ul>
            </div>
            <!-- sidebar end -->

            <!-- content part -->
            <div class="col-md-10 col-sm-12">
                <div class="container" id="center">
                    <div id="back">
                        <h1>Admin Home Page</h1>
                        <h2>Welcome <?php echo $name."!!"; ?></h2>
                    </div>
                </div>
            </div>
            <!-- end of content part	 -->
        </div>
    </div>


    <?php require_once "../footer.php"; ?>


    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
</body>
</html>