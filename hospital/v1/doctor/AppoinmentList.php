<?php 
	//include ('header.php');
error_reporting(0);
	session_start();
	include ('db.php');
	$userid = $_SESSION['id'];
	if(isset($_POST['submit'])){
		$date = $_POST['date'] ;
		$sql = "select *,e.first_name as emp_fName, e.last_name as emp_lName from appointment ap inner join patients p on ap.patient_id=p.patient_id inner join employee e on ap.emp_id=e.emp_id where appoint_date LIKE '%".$date."%' and ap.emp_id= '".$userid."' ";
	}else{
		$sql = "select *,e.first_name as emp_fName, e.last_name as emp_lName from appointment ap inner join patients p on ap.patient_id=p.patient_id inner join employee e on ap.emp_id=e.emp_id where ap.emp_id='".$userid."' ";
	}
	
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Appointment List</title>
	<link rel="stylesheet" type="text/css" href="css/appoinmentlist.css">
</head>
<body>
	
	<form method="post" action=" ">
	
	<div align="center" class="ot">
	<input type="date" name="date" placeholder="Date To Search">
	<input type="submit" name="submit" value="Search">
	</div>
	<br>
	
	<table border="1" align="center">
		<tr id="tr">
			<td colspan="7" align="center" id="op">Appointment List</td>
		</tr>
		<tr>
			<td>Doctor ID</td>
			<td>Doctor Name</td>
			<td>Patient ID</td>
			<td>Patient Name</td>
			<td>Date(yyyy-mm-dd)</td>
			<td>Time</td>
			<td>Checked</td>
		</tr>
	<?php
        if(mysqli_num_rows($result)>=1){
		while($row = mysqli_fetch_assoc($result)){  ?>		
			<tr>
				<td><?=$row['emp_id']?></td>
				<td><?=$row['emp_fName']." ".$row['emp_fName']?></td>
				<td><?=$row['patient_id']?></td>
				<td><?=$row['first_name']." ".$row['last_name']?></td>
				<td><?=$row['appoint_date']?></td>
				<td><?=$row['time']?></td>
                <td><?=$row['is_checked']?></td>
            </tr>
	<?php	} }else{	?>
        <tr>
            <td colspan="7"><strong><i>You Don't Have Any Appointment</i></strong></td>
        </tr>
        <?php } ?>
		<tr>
			<td colspan="7" align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
		</tr>
	</table>
	</form>
	
</body>
</html>