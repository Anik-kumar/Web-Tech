<?php
	session_start();
	session_unset();
	session_destroy();

    if(isset($_COOKIE['email'])){
        setcookie("email", "");
    }
    if(isset($_COOKIE['password'])){
        setcookie("password", "");
    }
    if(isset($_COOKIE['usertype'])){
        setcookie("usertype", "");
    }

	header("location: login.php");
?>