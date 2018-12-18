
<?php 
	//include ('header.php');
	session_start();
	include ('db.php');
	$userid = $_SESSION['id'];
	if(isset($_POST['submit'])){
		$date = $_POST['date'] ;
		$sql = "select * from ot_schedules o inner join employee e on o.emp_id=e.emp_id where date LIKE '%".$date."%' and o.emp_id= '".$userid."'";
	}	
	else{
		$sql = "select * from ot_schedules o inner join employee e on o.emp_id=e.emp_id where o.emp_id= '".$userid."' ";
	}
	
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Operation Schedule</title>
	<link rel="stylesheet" type="text/css" href="css/OTSchedule.css">
</head>
<body>
	<form method="post" action="">
	<div align="center" class="ot">
	<input type="date" name="date" placeholder="Date To Search">
	<input type="submit" name="submit" value="Search">
	</div>
	</br>
	<table border="1" align="center">
		<tr id="tr">
			<td colspan="6" align="center" id="op">Operation Schedule</td>
			
		</tr>
		<tr>
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
				<td><?=$row['OTtype']?></td>
			</tr>
	<?php	}	?>		
		
		<tr>
			<td colspan="6" align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
		</tr>
	</table>
	</form>
	
</body>
</html>