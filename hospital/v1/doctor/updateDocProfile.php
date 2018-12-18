<?php
	session_start();
	include('db.php');
	$userid = $_SESSION['id'];
	$sql = "select * from employee where emp_id= '".$userid."' ";
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Update Profile</title>
	<script type="text/javascript" src="script/updateProfile.js"></script>
	<link rel="stylesheet" type="text/css" href="css/updateProfile.css">
</head>
<body>
	<form method="post" action="php/updateProfileCheck.php" >
	
	<table  align="center">
	
		<th colspan="2">Update Profile Here</th><br><br>
		<tr>
			<td>First Name</td>
			<td>
				<input type="text" name="firstname" id="fname" value="<?=$data['first_name']?>">
				<span  id="first"></span>
			</td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td>
				<input type="text" name="lastname"  id="lname" value="<?=$data['last_name']?>">
				<span  id="last"></span>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="text" name="email"  id="email" value="<?=$data['email']?>">
				<span  id="mail"></span>
			</td>
		</tr>
		<tr>
			<td>Contact No</td>
			<td>
				<input type="text" name="contact"  id="contact" value="<?=$data['contact_no']?>">
				<span  id="mail"></span>
			</td>
		</tr>

		<tr>
			<td align="left">
				<input type="submit" name="submit" value="update" onclick="return validate()">
			</td>
		
			<td align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
		</tr>
	</table>
	</form>


</body>
</html>