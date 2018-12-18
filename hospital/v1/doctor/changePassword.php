

<!DOCTYPE html>
<html>
<head>
	<title>change password</title>
	<script type="text/javascript" src="script/changePass.js"></script>
	<link rel="stylesheet" type="text/css" href="css/changePassword.css">
</head>
<body>
	<div class="change">
	<form action="php/changePassCheck.php"  method="post">
		<h3> Change Your Password</h3>
	
		<table border="0" align="center" cellpadding="5">
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
				<a href="doctorHome.php">Go Home</a>
				</td>
			</tr>
		</table>
	
	</form>
	</div>

</body>
</html>