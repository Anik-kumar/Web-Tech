<?php
/**
 * Created by PhpStorm.
 * User: Anik
 * Date: 02-Jan-19
 * Time: 2:56 PM
 */
    session_start();
    require_once "db.php";

    if($_SESSION['usertype']=="Admin" || $_SESSION['usertype']=="Doctor"){
        $conn = getConnection();
        $sqlEmp = "select * from employee";
        $empResult = mysqli_query($conn, $sqlEmp);
    }else{
        header("location: ../login.php");
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Operation Theater Schedule</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/otSchedule.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3>Add Operation Theater Schedule</h3>
            <form action="php/addOtCheck.php" method="post" class="form-horizontal gap">
                <div class="form-group">
                    <label for="empId" class="col-lg-2">Employee</label>
                    <div class="col-lg-5">
                        <select name="empId" id="empId" class="form-control">
                            <option value=""></option>
                            <?php if(mysqli_num_rows($empResult)>=1){
                                while($row = mysqli_fetch_assoc($empResult)){ ?>
                                    <option value="<?= $row['emp_id'] ?>"><?= $row['first_name']." ".$row['last_name'] ?></option>
                                <?php    }
                            } ?>
                        </select>
                        <span id="empIdErr"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-lg-2">Date</label>
                    <div class="col-lg-5">
                        <input type="date" name="date" id="date" class="form-control">
                        <span id="dateErr"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="time" class="col-lg-2">Time</label>
                    <div class="col-lg-5">
                        <input type="time" name="time" id="time" class="form-control">
                        <span id="timeErr"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="otType" class="col-lg-2">Operation Type</label>
                    <div class="col-lg-5">
                        <input type="text" name="otType" id="otType" class="form-control">
                        <span id="otTypeErr"></span>
                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" value="ADD" class="btn btn-success">
                    <?php if ($_SESSION['usertype']=="Admin"){ ?>
                        <a href="admin.php" class="btn btn-danger">Home</a>
                    <?php }else{ ?>
                        <a href="../doctor/doctorHome.php" class="btn btn-danger">Home</a>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
