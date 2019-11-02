<?php
session_start();
    require_once "db.php";
    $result;
    error_reporting(E_ERROR);
    $conn = getConnection();
    $id = $_SESSION['id'];

    if(isset($_SESSION['id'])){
        $query = "SELECT a.*, p.first_name, p.last_name, p.email, e.first_name as emp_fName, e.last_name as emp_lName, e.email as emp_email FROM appointment a INNER JOIN patients p ON a.patient_id=p.patient_id INNER JOIN employee e ON a.emp_id=e.emp_id WHERE is_checked IS NULL AND a.emp_id='".$id."'";
        $result = mysqli_query($conn, $query);
//        print_r($result);
//        echo $query;

        if(isset($_REQUEST['status'])=='done'){
            echo "Appointment Confirmed";
        }else if(isset($_REQUEST['status'])=='fail'){
            echo "Appointment Not Confirmed";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Appointments</title>
    <link rel="stylesheet" type="text/css" href="css/NewAppointment.css">
</head>
<body>

<div>
    <div>
        <h3>Appointments</h3>
        <table >
            <tr>
                <td>Appointment Id</td>
                <td>Doctor</td>
                <td>Patient</td>
                <td>Date</td>
                <td>Time</td>
            </tr>
            <?php if(mysqli_num_rows($result)>=1){
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['appoint_id']; ?></td>
                        <td><?php echo $row['emp_fName']." ".$row['emp_fName']; ?></td>
                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                        <td><?php echo $row['appoint_date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><a href="php/confirmAppointments2.php?appid=<?=$row['appoint_id']?>" class="btn btn-success">Confirm</a> </td>
                    </tr>
                <?php } }?>
        </table>
        <a href="doctorHome.php">Home</a>
    </div>
</div>

</body>
</html>
