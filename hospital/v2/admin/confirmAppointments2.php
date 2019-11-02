<?php
    require_once "db.php";
    $id = $_REQUEST['appid'];

    $query = "UPDATE appointment SET is_checked='checked' WHERE appoint_id='".$id."'";
    $conn= getConnection();
    if(mysqli_query($conn, $query)){
        header("location: confirmAppointments.php?status=done");
    }else{
        header("location: confirmAppointments.php?status=fail");
    }


?>