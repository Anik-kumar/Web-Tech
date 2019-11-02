<?php
	
	if(isset($_GET['error'])){
		echo $_GET['error'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="script/login.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="login">
		<h1>Login Here</h1>
	<form method="post" action=" php/logCheck.php">		
			<table>
				<tr>
					<td>USER ID:</td>
					<td><input type="text" name="uid" id="id">
					<span id="uid"></span>
					</td>
				</tr>
				<tr>
					<td>PASSWORD:</td>
					<td><input type="password" name="password" id="pass">
					<span id="repass"></span>
					</td>
				</tr>
				<tr>
					
					<td colspan="2"><input type="checkbox" name="remember" value="remember" id="remem">Remember Me</td>
					
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Login" onclick="return validate()"></td>
				</tr>
			</table>
	
	</form>
	</div>
</body>
</html>