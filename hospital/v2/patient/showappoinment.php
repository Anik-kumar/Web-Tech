<?php
    
	session_Start();
	include('db.php');
	$userid = $_SESSION['id'];
	$sql = "select *,e.first_name as emp_fName, e.last_name as emp_lName from appointment ap inner join patients p on ap.patient_id=p.patient_id inner join employee e on ap.emp_id=e.emp_id where ap.patient_id = '".$userid."'";
	$conn = getConnection();
	$result = mysqli_query($conn,$sql);

?>	

<!DOCTYPE html>
<html>
<head>
	<title>SHOW APPOINMENT</title>

	<link rel="stylesheet" type="text/css" href="showappoinment.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <table border="5" align="center">

                <tr align="center">
                    <td colspan="2"><b>SHOW APPOINMENT</b></td>
                </tr>
                <?php if(mysqli_num_rows($result)>=1){
                while($row = mysqli_fetch_assoc($result)){  ?>
                    <tr>
                        <td>Doctor ID</td>
                        <td><?=$row['emp_id']?></td>
                    </tr>
                    <tr>
                        <td>Doctor Name</td>
                        <td><?=$row['emp_fName']." ".$row['emp_fName']?></td>
                    </tr>
                    <tr>
                        <td>Patient ID</td>
                        <td><?=$row['patient_id']?></td>
                    </tr>
                    <tr>
                        <td>Patient Name</td>
                        <td><?=$row['first_name']." ".$row['last_name']?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?=$row['date']?></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td><?=$row['time']?></td>
                    </tr>
                    <tr>
                        <td>Checked</td>
                        <td><?=$row['is_checked']?></td>
                    </tr>

                <?php   } }else{ ?>
                    <tr>
                        <td><strong><i><hr>You Don't Have Any Appointment</i></strong></td>
                    </tr>
            <?php    }	?>
                <tr>
                    <td colspan="2">
                        <a href="patienthome.php">Home</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>


</body>
</html>