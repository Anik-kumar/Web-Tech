<?php
	session_start();
	session_unset();
	session_destroy();
	if(isset($_POST['submit'])){
		setcookie('uid', $uid, time()-3600, '/');
		setcookie('password', $Password, time()-3600, '/');
		header("location: login.php");
	}
	header("location: login.php");
?>