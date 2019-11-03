<?php
/**
 * Created by PhpStorm.
 * User: ANiK
 * Date: 04-Jul-19
 * Time: 8:52 PM
 */

session_start();
require_once "db.php";

if($_SESSION['usertype']=="Admin"){
    $id = $_REQUEST['id'];
    $query = "DELETE FROM department WHERE dept_id=".$id;
    $conn = getConnection();

    if(mysqli_query($conn, $query)){
        header("location: admin.php?ff=ff&f1=department&f2=show");
    }else{
        echo "<script>alert('Delete Failed')</script>";
        header('Location: admin.php?ff=ff&f1=department&f2=delete');
    }

}


?>