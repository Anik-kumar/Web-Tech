<?php
	
	$host ="localhost";
	$user= "root";
	$password = "";
	$dbname = "hospital_project";

	function getConnection(){
		$conn = mysqli_connect($GLOBALS['host'] , $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['dbname']);

		return $conn;
	}
?>