<?php
    require_once "../db.php";
    $id = $_REQUEST['id'];
    $conn = getConnection();
    $sql = "UPDATE ot_schedules SET is_checked='checked' WHERE ot_id='".$id."'";
    if(!mysqli_query($conn, $sql)){
        echo "<script>alert('Error In SQL')</script>";
    }else{
        header('Location: otSchedule.php');
    }

 ?>