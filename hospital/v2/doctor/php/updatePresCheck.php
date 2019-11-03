<?php
    session_start();
	require_once "../db.php";

    $presId = $_REQUEST['id'];
    $date = $_REQUEST['date'];
    $disease = $_REQUEST['dis'];
    $medicine = $_REQUEST['med'];
    $test = $_REQUEST['test'];
    $comment = $_REQUEST['com'];

    $conn = getConnection();
    $sql = "UPDATE prescription set prescrip_date='".$date."', disease='".$disease."', medicine='".$medicine."', tests='".$test."', comment='".$comment."' where prescrip_id='".$presId."'";

    if(mysqli_query($conn, $sql)){
        mysqli_close($conn);
        header("location: ../viewPrescription.php?id=".$presId);
    }else{
        echo $sql;
        echo " ==>>failed ".mysqli_error($conn);
    }
?>