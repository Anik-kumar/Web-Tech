<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();
    if(isset($_SESSION['id'])){
        if(isset($_REQUEST['submit'])){
            $conn = getConnection();
            $id="";
            $depName = mysqli_real_escape_string($conn, $_REQUEST['depName']);
            $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
            // echo $depName . $description;

            $query = "INSERT INTO department VALUES ('".$id."', '".$depName."', '".$description."')";
            if(mysqli_query($conn, $query)){
                echo "<script type='text/javascript'> alert('Department Added Successfully')</script>";
            }else{
                echo "<script type='text/javascript'> alert('Department Already Exists')</script>";
            }

        }
    }else{
        header('location: ../login.php');
    }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Department</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/adddept.css">
    <script type="text/javascript" src="resources/js/validateForms.js"></script>
</head>
<body>

	<div class="container" id="center">
        <div id="back">
            <form action="" method="post">
                <div>
                    <h3 class="gap"><strong>Add New Department</strong></h3>
                    <hr class="gap">
                    <div class="form-horizontal" id="horizontal">
                        <div class="form-group">
                            <label for="deptname" class="col-xs-3 gap">Department Name</label>
                            <div class="col-xs-9">
                                <input type="text" name="depName" id="deptname" class="form-control" onblur="addDeptValid()">
                            </div>
                        </div>
                    </div>

                    <div  class="form-horizontal" id="horizontal">
                        <div class="form-group">
                            <label for="description" class="col-xs-3 gap">Description</label>
                            <div class="col-xs-9">
                                <textarea name="description" id="description" class="form-control" rows="3" onblur="addDeptValid()"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" id="" value="Add" class="btn btn-success">
                    <a href="admin.php" class="btn btn-danger">Home</a>
                </div>
           </form>
        </div>
    </div>

<script src="vendors/js/jquery-3.3.1.js"></script>
<script src="vendors/js/bootstrap.js"></script>
</body>
</html>