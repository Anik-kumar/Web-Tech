

<div class="container-fluid" id="wrapper">
    <div id="header">
        <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
            <div class="container-fluid" id="firstContainer">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="row">
                    <div class="navbar-header col-lg-1 col-md-2 col-sm-2 col-xs-3">
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
            </div>
        </nav>
    </div>



    <div id="main">
        <div id="left-side">
            <ul class="nav nav-pills nav-stacked">
                <!-- <li><a href="showDepartments.php">Departments</a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="addDepartment.php">Add Department</a></li>
                        <li><a href="showDepartments.php">Show Departments</a></li>
                    </ul>
                </li>
                <li><a href="addRoom.php">Add Room</a></li>
                <li><a href="addRoomType.php">Add Room Type</a></li>
                <li><a href="addEmp.php">Add Employee</a></li>
                <li><a href="confirmAppointments.php">Confirm Appointment</a></li>
                <li><a href="deleteEmp.php">Delete Employee</a></li>
                <li><a href="showAppointments.php">Show Appointments</a></li>

                <li><a href="showOTschedules.php">Show Operation Schedules</a></li>
                <li><a href="showPatientApplication.php">Show Patient Application</a></li>
                <li><a href="showAdmittedPatients.php">Show Admitted Patients</a></li>
                <li><a href="showRooms.php">Show Rooms</a></li>
                <li><a href="showPatients.php">Show Patients</a></li>
                <li><a href="showEmp.php">Show Employees</a></li>
                <li><a href="updateProfileAdmin.php">Update Profile</a></li>
                <li><a href="updateInfo.php">Update Users Profile</a></li>
                 -->

                <li><a onclick="redirectPage()" class="btn btn-default">Add Department</a></li>
                <li><a onclick="redirectPage('department')" class="btn btn-default">Show Departments</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Add Room</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Add Room Type</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Add Employee</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Confirm Appointment</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Delete Employee</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Show Appointments</a></li>

                <li><a onclick="redirectPage('')" class="btn btn-default">Show Operation Schedules</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Show Patient Application</a></li>
                <li><a onclick="redirectPage('admittedPatient')" class="btn btn-default">Show Admitted Patients</a></li>
                <li><a onclick="redirectPage('room')" class="btn btn-default">Show Rooms</a></li>
                <li><a onclick="redirectPage('patient')" class="btn btn-default">Show Patients</a></li>
                <li><a onclick="redirectPage('employees')" class="btn btn-default">Show Employees</a></li>
                <li><a onclick="redirectPage('profile')" class="btn btn-default">Update Profile</a></li>
                <li><a onclick="redirectPage()" class="btn btn-default">Update Users Profile</a></li>

            </ul>
        </div>

        <div id="right-side">
            <div id="content">
                <div class="row">
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="footer">

    </div>
</div>

<style>
    wrapper{
        padding-bottom: 100px;
    }

    wrapper, header, main{
        width: 100%;
    }

    left-side{
        width: 22%;
        float: left;
        min-height: 600px;
        padding-top: 15px;
    }

    right-side{
        width: 78%;
        float: left;
        min-height: 700px;
        border-radius: 10px;
    }

    right-side content{
        background-color: #FEFEFE;
        padding: 0px 15px;
        min-height: 700px;
        border-radius: 10px;
    }

</style>