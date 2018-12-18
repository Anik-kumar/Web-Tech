<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script type="text/javascript" src="script/registration.js"></script>
	<link rel="stylesheet" type="text/css" href="reg.css">

</head>
<body>
	<form method="POST" action="php/regCheck.php">
		<fieldset>
			<legend><b>REGISTRATION FORM</b></legend>
			<table cellpadding="11">
					<tr>
						<td><b>User Id</b></td>
						<td><input type="text" name="userid" id="id"  placeholder="enter your first name">
							<span id="userid"></span> 
						</td>
					</tr>
					<tr>
						<td><b>First Name</b></td>
						<td><input type="text" name="firstname" id="fname"  placeholder="enter your first name">
							<span id="first"></span> 
						</td>
					</tr>
					<tr>
						<td><b>Last Name</b></td>
						<td><input type="text" name="lastname" id="lname"  placeholder="enter your last name">
							<span id="last"></span> 
						</td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td><input type="text" name="email" id="email"  placeholder="enter your email id">
							<span id="mail"></span>
						</td>
					</tr>
					<tr>
						<td><b>Contact No</b></td>
						<td><input type="text" name="contact" id="contact" placeholder="enter your contact no">
							<span id="cont"></span>
						</td>
					</tr>
					<tr>
						<td><b>Password</b></td>
						<td><input type="password" name="password" id="password"  placeholder="enter your password">
							<span id="pass"></span>
						</td>
					</tr>
					<tr>
						<td> <b>Confirm Password</b></td>
						<td><input type="password" name="repassword" id="repass"  placeholder="enter your  confirm password">
							<span id="conpass"></span>
						</td>
					</tr>
					<tr>
						<td><b>Gender:</b></td>
						<td>
							<input type="radio" name="gender" value="M" id="Mgender" />Male 
							<input type="radio" name="gender" value="F" id="Fgender"/>Female 
							<input type="radio" name="gender" value="O" id="Ogender"/>Other 
								<span id="gender"></span> 
						</td>
					</tr>
					<tr>
						<td><b>Blood Group:</b></td>
						<td>
							<select name="bg" id="group">
								<option value=" ">select</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<span id="blood"></span> 
							</select>
						</td>
					</tr>
					<tr>
						<td><b>DOB:</b></td>
						<td><input type="date" name="dob" id="dob">
							<span id="birth"></span> 
						</td>
					</tr>
					<tr>
						<td><b>User Type:</b></td>
						<td>
							<select name="type" id="type">
								
								<option value="admin">Admin</option>
								<option value="doctor">Doctor</option>
								<option value="patient">Patient</option>
									<span id="user"></span> 
							</select>
						</td>
					</tr>
					<tr>
						<td align="left">
							<input type="submit" name="submit" value="Register" onclick="return validate()">
						</td>
						<td align="right">
							<a href="login.php">Sign In</a>
						</td>
					</tr>
			</table>
			
		</fieldset>
	</form>
</body>
</html>