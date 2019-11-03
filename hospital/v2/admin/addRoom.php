<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();
    if(isset($_SESSION['id'])){
        $conn = getConnection();
        $query = "SELECT * FROM room_type";
        $result = mysqli_query($conn, $query);

        if(isset($_REQUEST['submit'])){
            $id="";
            $roomType = $_REQUEST['roomType'];
            $location = $_REQUEST['location'];
            if(empty($roomType) || empty($location)){
                echo "<script type='text/javascript'> alert('Enter a New Room Number')</script>";
            }else{
                $query2 = "INSERT INTO room VALUES ('".$id."', '".$roomType."', ".$location.")";
                if(mysqli_query($conn, $query2)){
                    echo "<script type='text/javascript'> alert('Room Added Successfully')</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Try Again. Room already exits')</script>";
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
	<title>Add Room</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/addroom.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validateForms.js"></script>
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <form action="" method="post">
            <div>
                <h3 class="gap">Add New Room</h3>
                <hr class="gap">
                <div class="form-horizontal gap" id="horizontal">
                    <div class="form-group">
                        <label for="roomtype" class="col-sm-4">Room Type</label>
                        <div class="col-sm-8">
                            
                             <select name="roomType" id="roomtype" class="form-control">
                                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?= $row['type_id'] ?>"> <?= $row['type'] ?> </option>
                                <?php	} ?>
                            </select>
                            <span id="rmtypeErr"></span>
                        </div>

                    </div>
                   
                </div>
                
                <div class="form-horizontal" id="horizontal">
                    <div class="form-group">
                        <label for="location" class="col-sm-4">Location</label>
                        <div class="col-sm-8">
                            <input type="text" name="location" id="location" class="form-control">
                            <span id="locErr"></span>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" id="roomSubmitBtn" class="btn btn-success">
                <a href="admin.php" class="btn btn-info">Home</a>
            </div>

            </form>
        </div>
        
    </div>

<script src="vendors/js/jquery-3.3.1.js"></script>
<script src="vendors/js/bootstrap.js"></script>
	
</body>
</html>