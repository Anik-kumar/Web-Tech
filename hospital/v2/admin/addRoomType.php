<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();
    if(isset($_SESSION['id'])){
        if(isset($_REQUEST['submit'])){
            $id="";
            $roomType = $_REQUEST['roomType'];
            $cost = $_REQUEST['cost'];
            $capacity = $_REQUEST['capacity'];
            // echo $depName . $description;

            if(empty($roomType) || empty($cost) || empty($capacity)){
                echo "<script type='text/javascript'> alert('Fill Up Form Please')</script>";
            }else{
                $conn = getConnection();
                $query = "INSERT INTO room_type VALUES ('".$id."', '".$roomType."', '".$cost."', '".$capacity."')";
                if(mysqli_query($conn, $query)){
                    echo "<script type='text/javascript'> alert('Room Type Added Successfully')</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Room Type Already Exists. Try Different one')</script>";
                }
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
	<title>Add Room Type</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/addroomtype.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validateForms.js"></script>
</head>
<body>
    
    <div class="container" id="center">
        <div id="back">
            <form action="" method="post">
                <div>
                    <h3 class="gap">Add Room Type</h3>
                    <hr class="gap">
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                           <label for="roomtype" class="col-sm-4">Room Type</label>
                            <div class="col-sm-8">
                                <input type="text" name="roomType" id="roomtype" class="form-control">
                                <span id="rmErr"></span>
                             </div>
                        </div>
                    </div>

                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="cost" class="col-sm-4">Cost</label>
                            <div class="col-sm-8">
                                <input type="number" name="cost" id="cost" class="form-control">
                                <span id="costErr"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="capacity" class="col-sm-4">Capacity</label>
                            <div class="col-sm-8">
                                <input type="number" name="capacity" id="capacity" class="form-control">
                                <span id="capacityErr"></span>
                            </div>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="rtSubmitBtn" class="btn btn-danger">
                    <a href="admin.php" class="btn btn-info">Home</a>
                </div>
            </form>
        </div>
    </div>


<script src="vendors/js/jquery-3.3.1.js"></script>
<script src="vendors/js/bootstrap.js"></script>	
</body>
</html>