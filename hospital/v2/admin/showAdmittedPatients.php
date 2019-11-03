<?php
error_reporting(0);
	require_once 'db.php';
	session_start();
    if(isset($_SESSION['id'])){
        if($_SESSION['usertype']=="Admin" || $_SESSION['usertype']=="Doctor"){
            $query = "SELECT AP.*, P.first_name, P.last_name, P.email, P.contact_no, E.first_name as emp_fName, E.last_name as emp_lName, D.dept_name, R.location, RT.type FROM patient_admitted AP LEFT JOIN patients P ON AP.patient_id=P.patient_id INNER JOIN employee E ON AP.emp_id=E.emp_id INNER JOIN department D ON AP.dep_id=D.dept_id INNER JOIN room R ON AP.room_id=R.room_id INNER JOIN room_type RT ON R.type_id=RT.type_id";
            $result = getResults($query);
        }

        if($_REQUEST['status']=="done"){
            echo "<script type='text/javascript'> alert('Patient Released Successfully')</script>";
        }
    }else{
        header('location: ../login.php');
    }


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show Admitted Patients</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showAdmittedPat.css">
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">Admitted Patients List</h3>
            <table class="table table-responsive">
                <tr id="header">
                    <th>Registration Id</th>
                    <th>Application Id</th>
                    <th>Patient Id</th>
                    <th>Patient Name</th>
                    <th>Patient Email</th>
                    <th>Admission Date</th>
                    <th>Release Date</th>
                    <th>Doctor Name</th>
                    <th>Department</th>
                    <th>Room No</th>
                    <th>Room Type</th>
                    <th></th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td> <?= $row['reg_id'] ?> </td>
                        <td> <?= $row['application_id'] ?> </td>
                        <td> <?= $row['patient_id'] ?> </td>
                        <td> <?= $row['first_name']. " ".$row['last_name'] ?> </td>
                        <td> <?= $row['email'] ?> </td>
                        <td> <?= $row['admit_date'] ?> </td>
                        <td> <?= $row['release_date'] ?> </td>
                        <td> <?= $row['emp_fName']. " ". $row['emp_lName'] ?> </td>
                        <td> <?= $row['dept_name'] ?> </td>
                        <td> <?= $row['location'] ?> </td>
                        <td> <?= $row['type'] ?> </td>
                        <td><a class="btn btn-success" href="releasePatients.php?regid= <?= $row['reg_id'] ?>">Release Patient</a></td>
                    </tr>
                <?php	} ?>
            </table>
            <a href="admin.php" class="btn btn-danger">Home</a>
        </div>
    </div>



</body>
</html>