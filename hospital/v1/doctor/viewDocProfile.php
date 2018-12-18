<?php 
	//include ('header.php');
	session_start();
	include ('db.php');
	$userid = $_SESSION['id'];
	$sql = "select * from employee e inner join department d on e.dep_id=d.dept_id where emp_id= '".$userid."' ";
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Profile</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>

	<form action="" method="">
		<table border="1" align="center" cellpadding="10">
	
			<tr align="center" id="tr">
				<td colspan="2" id="p"> PROFILE </td> 
			</tr>
	<?php

		while($row = mysqli_fetch_assoc($result)){  ?>	
			<tr>
				<td>Employee ID</td>
				<td><?=$row['emp_id']?></td>
			</tr>
            <tr>
                <td>Department</td>
                <td><?=$row['emp_id']?></td>
            </tr>
			<tr>
				<td> First Name</td>
				<td><?=$row['first_name']?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><?=$row['last_name']?></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td><?=$row['email']?></td>
			</tr>
			<tr>
				<td>Contact No</td>
				<td><?=$row['contact_no']?></td>
			</tr>
			
			<tr>
				<td>Gender</td>
				<td><?=$row['gender']?></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td><?=$row['date_of_birth']?></td>
			</tr>
			
			<tr>
				<td>User Type</td>
				<td><?=$row['user_type']?></td>
			</tr>
            <tr>
                <td>Salary</td>
                <td><?=$row['salary']?></td>
            </tr>
			<tr>
			<td colspan="2" align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
			</tr>
	<?php	}	?>		
		</table>
	</form>
	

</body>
</html>