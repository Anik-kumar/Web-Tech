<?php

	function getConnection(){
		$conn = mysqli_connect("localhost" , "root", "", "hospital_project");
		return $conn;
	}
?>