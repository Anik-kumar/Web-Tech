
<?php 
	//include ('header.php');
	session_start();
	include ('db.php');
	$userid = $_SESSION['id'];
	if(isset($_POST['submit'])){
		$date = $_POST['date'] ;
		$sql = "select * from ot_schedules o inner join employee e on o.emp_id=e.emp_id where date LIKE '%".$date."%' and o.emp_id= '".$userid."'";
	}else{
		$sql = "select * from ot_schedules o inner join employee e on o.emp_id=e.emp_id where o.emp_id= '".$userid."' ";
	}
	
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Operation Schedule</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/otSchedule.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">Operation Schedule</h3>
                <table class="table table-condensed table-bordered ">
                    <tr id="header">
                        <td>Doctors ID</td>
                        <td>Doctors Name</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Operation Type</td>
                    </tr>
                    <?php

                    while($row = mysqli_fetch_assoc($result)){  ?>
                        <tr>
                            <td><?=$row['emp_id']?></td>
                            <td><?=$row['first_name']." ".$row['last_name']?></td>
                            <td><?=$row['date']?></td>
                            <td><?=$row['time']?></td>
                            <td><?=$row['ot_type']?></td>
                            <?php if($row['is_checked']=="checked"){ ?>
                                <td><a class="btn btn-success">Checked</a></td>
                        <?php    }else{ ?>
                                <td><a href="php/checkOTschedules.php?id=<?=$row['ot_id']?>" class="btn btn-primary">Check It</a></td>
                        <?php    } ?>
                        </tr>
                    <?php	}	?>
                    <tr>
                        <td colspan="6" align="right">
                            <a href="doctorHome.php" class="btn btn-danger">Go Home</a>
                        </td>
                    </tr>
                </table>
        </div>
    </div>
</body>
</html>