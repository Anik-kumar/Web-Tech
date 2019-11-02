<?php
//include ('header.php');
session_start();
require_once 'db.php';
    if(isset($_SESSION['id'])){
        $sql = "select * from ot_schedules";
    }else{
        header('location: ../login.php');
    }

    $conn = getConnection();
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Operation Schedules</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showOTschedules.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">Operation Schedule</h3>
            <table class="table table-responsive table-bordered">
                <tr id="header">
                    <td>Operation ID</td>
                    <td>Doctors ID</td>
                    <td>Doctors Name</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Operation Type</td>

                </tr>
                <?php
                while($row = mysqli_fetch_assoc($result)){  ?>
                    <tr>
                        <td><?=$row['ot_id']?></td>
                        <td><?=$row['emp_id']?></td>
                        <td><?=$row['emp_name']?></td>
                        <td><?=$row['date']?></td>
                        <td><?=$row['time']?></td>
                        <td><?=$row['ot_type']?></td>
                    </tr>
                <?php	}	?>
                <tr>
                    <td colspan="6" align="right">
                        <a href="admin.php">Go Home</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</body>
</html>
