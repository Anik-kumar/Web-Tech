<!DOCTYPE html>
<html lang="en">
<head>
	<title>change password</title>
	<script type="text/javascript" src="script/changepass.js"></script>
	<link rel="stylesheet" type="text/css" href="changepass.css">
</head>
<body>
	  
		<form action="php/changepasscheck.php"  method="post">
			
			<table border="0" align="center">
			 <th colspan="2">CHANGE PASSWORD</th>
			 
				<tr>
					<td>Current Password</td>
					<td>
					<input type="password" name="password" id="crpass">
					<span id="curpass"></span>
					</td>
				</tr>
				<tr>
					<td>New Password</td>
					<td>
					<input type="password" name="npassword" id="npass">
					<span id="newpass"></span>
					</td>
				</tr>
				<tr>
					<td> Confirm Password</td>
					<td>
					<input type="password" name="cpassword" id="cnpass">
					<span id="conpass"></span>
					</td>
				</tr>
				<tr>
					
					<td align="left">
					<input type="submit" name="submit" value="change" onclick="return validate()">
					</td>
					<td align="right">
					<a href="patienthome.php"> Home</a>
					</td>
				</tr>
			</table>
		 	
	
		</form>
	 
</body>
</html>