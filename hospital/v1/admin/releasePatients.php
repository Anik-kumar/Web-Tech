<?php
    require_once "db.php";
    $regId = $_REQUEST['regid'];
    $query = "DELETE FROM patient_admitted WHERE reg_id=".$regId."";
    $conn = getConnection();

    if(mysqli_query($conn, $query)){
        header("location: showAdmittedPatients.php?status=done");
    }else{
        header("location: showAdmittedPatients.php");
    }

?>