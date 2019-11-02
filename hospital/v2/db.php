<?php 


	function getConnection(){

		$conn = mysqli_connect('localhost', 'root', '', 'hospital_project');

		return $conn;
	}

    function getResults($query){
        $conn = getConnection();
        $result = mysqli_query($conn, $query);
        // $row = mysqli_fetch_assoc($result);
        return $result;
    }

    function insertData($query){
        $conn = getConnection();
        $result = mysqli_query($conn, $query);

    }


 ?>