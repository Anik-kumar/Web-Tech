<?php

    session_start();
    require_once "../db.php";

    if($_SESSION['usertype']=="Admin" || $_SESSION['usertype']=="Doctor"){
        $id = $_REQUEST['empId'];
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        $otType = $_REQUEST['otType'];

        if(empty($id) || empty($date) || empty($time) || empty($otType)){
            echo "<script>alert('Fill Up the Form Correctly')</script>";
        }else{
            $conn = getConnection();
            $sql = "Insert into ot_schedules values (null, '".$id."', '".$date."', '".$time."', '".$otType."', null )";
            if(!mysqli_query($conn, $sql)){
                echo "<script>alert('SQL error')</script>";
            }else{
                header("location: addOtSchedule.php");
            }
        }
    }else{
        header("location: ../login.php");
    }

?>

