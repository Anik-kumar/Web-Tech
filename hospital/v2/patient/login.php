<?php 
   
    if (isset($_GET['error'])){
		
      echo $_GET['error'];
	  
	}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="script/login.js"></script>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="loginbox">
	  <h1>LogIn</h1>
		<form action=" php/logCheck.php" method="post">
			
				
				<table align="center">
					<tr>
						<td>USER ID</td>
						<td><input type="text" name="userid" id="id">
							<span id="uid"></span>
						</td>
						
					</tr>
					<tr>
						<td>PASSWORD</td>
						<td><input type="password" name="password" id="pass">
							<span id="repass"></span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2"><input type="checkbox" name="remember" value="remember" onclick="return validate()">Remember Me</td>
						
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="login" onclick="return validate()"></td>
						
					</tr>
				</table>
			
		</form>
	</div>	
</body>
</html>