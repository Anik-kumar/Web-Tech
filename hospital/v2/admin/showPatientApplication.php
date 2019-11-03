<?php 
	require_once 'db.php';
	session_start();
    if($_SESSION['usertype']=="Admin" || $_SESSION['usertype']=="Doctor"){
        $conn = getConnection();
        $query = "SELECT ap.*, p.first_name, p.last_name, p.email, p.user_type, p.patient_id FROM patient_application ap INNER JOIN patients p ON ap.patient_id=p.patient_id";
        $result = getResults($query);
    }else{
        header('location: ../login.php');
    }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>List Of Patient Application</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showPatientApplication.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">Application List</h3>
            <table class="table table-responsive">
                <tr id="header">
                    <td>Patient Application Id</td>
                    <td>Patient Id</td>
                    <td>Patient Name</td>
                    <td>Patient Email</td>
                    <td>Department</td>
                    <td>Problem</td>
                    <td></td>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td> <?=$row['patient_app_id']?> </td>
                        <td> <?=$row['patient_id']?> </td>
                        <td> <?=$row['first_name']." ".$row['last_name']?> </td>
                        <td> <?=$row['email']?> </td>
                        <td> <?=$row['department']?> </td>
                        <td> <?=$row['problem']?> </td>
                        <td>
                            <a href="addPatient.php?patientAppId=<?=$row['patient_app_id']?>&patientId=<?=$row['patient_id']?>&dept=<?=$row['department']?>" class="btn btn-danger">ADD</a>
                        </td>
                    </tr>
                <?php	} ?>

            </table>
            <?php if ($_SESSION['usertype']=="Admin"){ ?>
                <a href="admin.php" class="btn btn-default">Home</a>
            <?php }else{ ?>
                <a href="../doctor/doctorHome.php" class="btn btn-default">Home</a>
            <?php } ?>
        </div>
    </div>

	
</body>
</html>