<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script type="text/javascript" src="script/registration.js"></script>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	
</head>
<body>
	<form  method="POST" action="php/regCheck.php">
		
		<fieldset>
		<table  cellpadding="5">
			<h3> REGISTRATION FORM</h3>
			<tr>
				<td>User ID:</td>
				<td><input type="text" name="uid" id="id">
				<span id="userid"></span>
				</td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="firstname" id="fname">
					<span id="first"></span> 
				</td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lastname" id="lname">
					<span id="last"></span> 
				</td>
			</tr>
			
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" id="email">
					<span id="mail"></span> 
				</td>
			</tr>
			<tr>
				<td> Contact No:</td>
				<td><input type="text" name="contact" id="contact">
					<span id="cont"></span> 
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" id="password">
					<span id="pass"></span> 
				</td>
			</tr>
			<tr>
				<td> Confirm Password:</td>
				<td><input type="password" name="repassword" id="repass">
					<span id="conpass"></span> 
				</td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
					<input type="radio" name="gender" value="M" id="mgender">Male 
					<input type="radio" name="gender" value="F" id="fgender">Female 
					<input type="radio" name="gender" value="O" id="ogender">Other 
					
					<span id="gen"></span> 
				</td>
			</tr>
			<tr>
				<td>Blood Group:</td>
				<td>
					<select name="bg" id="group">
						<option value=" ">select</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						
						<span id="blood"></span> 
						
					</select>
				</td>
			</tr>
			<tr>
				<td>DOB:</td>
				<td><input type="date" name="dob" id="dob">
					<span id="birth"></span> 
				</td>
			</tr>
			<tr>
				<td>User Type:</td>
				<td>
					<select name="type" id="type">
						<option value="0">select</option>
						<option value="admin">Admin</option>
						<option value="doctor">Doctor</option>
						<option value="patient">Patient</option>
						
						<span id="user"></span> 
					</select>
				</td>
			</tr>
			<tr>
				<td align="left">
				<input type="submit" name="submit" value="Register" onclick="return validate()" >
				</td>
				
			</tr>
		</table>
		</fieldset>
		
	</form>
</body>
</html>