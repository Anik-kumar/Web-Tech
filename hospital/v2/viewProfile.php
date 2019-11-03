<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();
	$row;

	if(isset($_SESSION['email'])){
		$conn = getConnection();
		$id = $_SESSION['id'];
		$userEmail = $_SESSION['email'];
		$userType = $_SESSION['user_type'];

		if($userType == 'Patient'){
			$query = "SELECT * FROM patients WHERE email='".$userEmail."'";
		}else{
			$query = "SELECT * FROM employee e INNER JOIN department d ON e.dep_id=d.dept_id WHERE email='".$userEmail."'";
		}
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
	}else{
	    header('Location: login.php');
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Profile</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin/viewProfile.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">PROFILE</h3>
            <table border="0" class="table table-condensed">
                <tr>
                    <td>ID</td>
                    <td>
                        <?php if($userType == "patient"){
                            echo $row['patient_id'];
                        }else{
                            echo $row['emp_id'];
                        } ?>

                    </td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo $row['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo $row['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <?php if($userType != "Patient"){ ?>
                    <tr>
                        <td>Department</td>
                        <td> <?php echo $row['dept_name']; ?> </td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td> <?php echo $row['salary']; ?> </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>Date Of Birth</td>
                    <td><?php echo $row['date_of_birth']; ?></td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><?php echo $row['age']; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $row['gender']; ?></td>
                </tr>
                <tr>
                    <td>User Type</td>
                    <td><?php echo $row['user_type']; ?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?php echo $row['contact_no']; ?></td>
                </tr>
            </table>


            <div>
                <a href="changePassword.php" class="btn btn-success btnLeft">Change Password</a>
                <?php if($row['user_type'] == "Patient"){ ?>
                    <a href="patient/patienthome.php" class="btn btn-primary btnLeft">Go Home</a>
                <?php	}else if($row['user_type'] == "Doctor"){ ?>
                    <a href="doctor/doctorHome.php" class="btn btn-primary btnLeft">Go Home</a>
                <?php	}else if($row['user_type'] == "Admin"){ ?>
                    <a href="admin/admin.php" class="btn btn-primary btnLeft">Go Home</a>
                <?php	}else{ echo "Can not Find The Home of User <br><br>"; } ?>
            </div>
        </div>
    </div>



    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
</body>
</html>