<?php
session_start();
    require_once "db.php";
    $result;
error_reporting(E_ERROR);

    if(isset($_SESSION['id'])){
        $query = "SELECT a.*, p.first_name, p.last_name, p.email, e.first_name as emp_fName, e.last_name as emp_lName, e.email as emp_email FROM appointment a INNER JOIN patients p ON a.patient_id=p.patient_id INNER JOIN employee e ON a.emp_id=e.emp_id";
        $result = getResults($query);
    }


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show Appointments</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showAppointment.css">
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">Appointments</h3>
            <table class="table table-responsive table-bordered">
                <tr id="header">
                    <td>Appointment Id</td>
                    <td>Doctor</td>
                    <td>Patient</td>
                    <td>Date</td>
                    <td>Time</td>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['appoint_id']; ?></td>
                        <td><?php echo $row['emp_fName']." ".$row['emp_fName']; ?></td>
                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                        <td><?php echo $row['appoint_date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <a href="admin.php" class="btn btn-primary">Home</a>
        </div>
    </div>

</body>
</html>