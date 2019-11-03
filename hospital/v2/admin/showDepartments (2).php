<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once "db.php";

    if($_SESSION['usertype'] == "Admin" || $_SESSION['usertype']=="Doctor")
    {
        $conn = getConnection();
        $query = "SELECT * FROM department";
        $result = mysqli_query($conn, $query);
    }else{
        header('location: ../login.php');
    }

?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Show Departments</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showDept.css">
</head>
<body>
    <div class="container" id="center"> -->
<div id="upperDiv_dept">
                <!-- <h1>Admin Home Page</h1> -->
    
    <div class="float-left">
        <h2>Departments </h2>
    </div>
    <div class="float-right">
        <button>Add Department</button>
    </div>
    
    
</div>
<div id="mainDiv_dept"> 
    <br><br><br>
    <table class="table table-responsive table-bordered">
        <tr id="header">
            <td>Department ID</td>
            <td>Department Name</td>
            <td>Department Description</td>
            <td>Options</td>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['dept_id']; ?></td>
                <td><?php echo $row['dept_name']; ?></td>
                <td><?php echo $row['dept_description']; ?></td>
                <td>
                    <button class="ui compact labeled icon button"><i class="terminal icon"></i>Edit</button>
                    <button class="ui compact labeled icon button"><i class="trash alternate icon"></i>Delete</button>
                </td>
            </tr>
        <?php }?>
    </table>
    <?php if ($_SESSION['usertype']=="Admin"){ ?>
        <a href="admin.php" class="btn btn-default">Home</a>
    <?php }else{ ?>
        <a href="../doctor/doctorHome.php" class="btn btn-default">Home</a>
    <?php } ?>
</div>
    <!-- </div>


</body>
</html> -->