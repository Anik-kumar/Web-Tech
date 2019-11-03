<?php
session_start();
    require_once "db.php";
    $sql = "SELECT * FROM employee";
    $sql2 = "SELECT * FROM patients";
    $conn = getConnection();
    if($_SESSION['usertype']=="Doctor"){
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
    }
    if(isset($_REQUEST['submit'])){
        $did = $_REQUEST['empId'];
        $pid = $_REQUEST['patId'];
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        if($did == '' || $did==null || $pid == '' || $pid==null || $date == '' || $time == ''){
            echo "<script>alert('Fill Up The Form Correctly')</script>" ;
        }else{
            header("location: php/newAppoinCheck.php?did=<?=$did?>&pid=<?=$pid?>&date=<?=$date?>&time=<?=$time?>&status=done");
        }

    }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>New Appointment</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/doctor/newAppointment.css">
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/js/doctor/NewAppointment.js"></script>
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <form method="post"  action="">
                <div class="form-horizontal gap">
                    <h3> Create Appointment </h3>
                    <div class="form-group">
                        <label for="empId" class="col-lg-1">Doctor</label>
                        <div class="col-lg-3">
                            <select name="empId" id="empId" class="form-control">
                                <option value="">Doctor</option>
                                <?php if($_SESSION['usertype']=="Doctor"){
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?= $row['emp_id']?>"><?= $row['first_name']." ".$row['last_name'] ?></option>
                                    <?php   }
                                } ?>
                            </select>
                            <span id="empIdErr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="patId" class="col-lg-1">Patient</label>
                        <div class="col-lg-3">
                            <select name="patId" id="patId" class="form-control">
                                <option value="">Patient</option>
                                <?php if($_SESSION['usertype']=="Doctor"){
                                    while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                        <option value="<?= $row2['emp_id']?>"><?= $row2['first_name']." ".$row2['last_name'] ?></option>
                                    <?php   }
                                } ?>
                            </select>
                            <span id="patIdErr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-lg-1">Date</label>
                        <div class="col-lg-3 form_date">
                            <input type="date" name="date" id="date" class="form-control" value="">
                            <span id="pdate"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time" class="col-lg-1">Time</label>
                        <div class="col-lg-3">
                            <input type="time" name="time" id="time" class="form-control" value="">
                            <span id="ptime"></span>
                        </div>
                    </div>
                    <div class="form-group" align="left">
                        <input type="button" name="submit" value="ADD APPOINTMENT" class="btn btn-success" onclick="validate()">
                        <a href="doctorHome.php" class="btn btn-danger">Go Home</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>
</html>