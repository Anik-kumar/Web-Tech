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

		$id2 = $_REQUEST['id'];
		$patId = $_REQUEST['patId'];

		if($patId != null){
			$query = "SELECT * FROM patients WHERE patient_id='".$patId."'";
		}else{
			$query = "SELECT * FROM employee e INNER JOIN department d ON e.dep_id=d.dept_id WHERE emp_id='".$id2."'";
		}
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
	}else{
	    header('Location: ../login.php');
    }

 ?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Profile</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/viewProfile.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">-->

<div class="row">
    <div class="col-xs-5 col-sm-3 col-md-2 col-lg-2">
        <h2 class="blue-backgnd">PROFILE</h2>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-md-3">
        <div class="thumbnails">
            <img src="resources/images/admin4.png" alt="admin profile picture" width="120px">
            <br>
            <div>
                <h5>&nbsp;</h5>
                <h2><?php echo $row['first_name']; ?> <br> <?php echo $row['last_name']; ?> </h2>
                <p><?php echo $row['email']; ?> <br> <?php echo $row['dept_name']; ?> </p>
                <br>
            </div>

        </div>
    </div>
    <div class="col-xs-12 col-md-8">
        <table border="0" class="table table-condensed">
            <tr>
                <td>ID</td>
                <td>
                    <?php if($row['user_type'] == "Patient"){
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
            <?php if($row['user_type'] != "Patient"){ ?>
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
    </div>
</div>


<div>
    <a href="router.php?flag=true&code=changePass" class="btn btn-primary btnLeft">Change Password</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <?php if($row['user_type'] == "Patient"){ ?>
        <a href="admin.php?f1=patient&f2=show" class="ui  button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>

    <?php	}else if($row['user_type'] == "Doctor"){ ?>
        <a href="admin.php?f1=doctor&f2=show" class="ui button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>

    <?php	}else if($row['user_type'] == "Nurse"){ ?>
        <a href="admin.php?f1=nurse&f2=show" class="ui button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>

    <?php	}else if($row['user_type'] == "Accountant"){ ?>
        <a href="admin.php?f1=account&f2=show" class="ui button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>

    <?php	}else if($row['user_type'] == "Pathologist"){ ?>
        <a href="admin.php?f1=patho&f2=show" class="ui button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>

    <?php	}else if($row['user_type'] == "Pharmacist"){ ?>
        <a href="admin.php?f1=pharma&f2=show" class="ui button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>

    <?php	}else if($row['user_type'] == "Admin"){ ?>
        <a href="admin.php?f1=admin&f2=show" class="ui button btnLeft">Back</a>
        <a href="admin.php" class="ui button btnLeft">Home</a>


    <?php	}else{ echo "Can not Find The Home of User <br><br>"; } ?>
</div>
        <!--</div>
    </div>



    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
</body>
</html>-->