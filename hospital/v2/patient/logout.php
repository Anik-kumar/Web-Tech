<?php
	session_start();
	session_unset();
	session_destroy();
	if(isset($_POST['submit'])){
			setcookie('userid',$uid,time()-10,'/');
			setcookie('password',$Password,time()-10,'/');
					
				header('location: login.php');
				
				}

	header("location: login.php");
?>