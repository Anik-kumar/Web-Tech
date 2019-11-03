
<?php
error_reporting(E_ALL & ~E_NOTICE);
    require_once "db.php";
	session_start();
    if(isset($_SESSION['id'])){
        $email = $_SESSION['email'];
        $userType = $_SESSION['usertype'];
//    echo $userType;
        if(isset($_REQUEST['changePass'])){
            $currPass = $_REQUEST['currPass'];
            $newPass = $_REQUEST['newPass'];
            $newPass2 = $_REQUEST['newPass2'];
            $conn = getConnection();
            if(empty($currPass)==true || empty($newPass)==true || empty($newPass2)==true){
                echo "<script type='text/javascript'> alert('Fill Up Passwords')</script>";
            }else if($newPass!=$newPass2){
                echo "<script type='text/javascript'> alert('Password did not matched')</script>";
            }else{
                // $conn = getConnection();
                if($userType == "Patient"){
                    $query = "SELECT * FROM patients WHERE email='".$email."' and pass='".$currPass."'";
                }else{
                    $query = "SELECT * FROM employee WHERE email='".$email."' and pass='".$currPass."'";
                }

                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                if($result){
                    if($userType == "Patient"){
                        $query2 = "UPDATE patients SET pass='".$newPass."' WHERE email='".$email."'";
                    }else{
                        $query2 = "UPDATE employee SET pass='".$newPass."' WHERE email='".$email."'";
                    }
                    $query3 = "UPDATE all_users2 SET user_pass='".$newPass."' WHERE user_email='".$email."'";

                    if(mysqli_query($conn, $query2) && mysqli_query($conn, $query3)){
                        echo "<script type='text/javascript'> alert('Password Updated Successfully')</script>";
                    }else{
                        echo "<script type='text/javascript'> alert('Database Connection Error')</script>";
                    }
                }else{
                    echo "<script type='text/javascript'> alert('Current Password is Wrong')</script>";
                }
            }
        }
    }else{
        header('location: ../login.php');
    }

 ?>



<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/changepassword.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validateForms.js"></script>

</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <form action="" method="post" >
                <div>
                    <h3 class="gap">CHANGE PASSWORD</h3>
                    <hr class="gap">-->
<div class="row">
    <div class="col-xs-5 col-sm-3 col-md-2 col-lg-offset-1">
        <h2 class="blue-backgnd">Change Password</h2>
    </div>
</div> <br>

<div class="row">
    <div class="col-xs-12 col-sm-8 col-lg-offset-1 col-xl-offset-1">
        <div class="form-horizontal" id="horizontal">
            <div class="form-group">
                <label for="currpass" class="col-sm-3">Current Password</label>
                <div class="col-sm-9">
                    <input type="password" name="currPass" class="form-control" id="currpass">
                    <span id="cpassErr"></span>
                </div>
            </div>
        </div>

        <div class="form-horizontal" id="horizontal">
            <div class="form-group">
                <label for="newpass" class="col-sm-3">New Password</label >
                <div class="col-sm-9">
                    <input type="password" name="newPass" id="newpass" class="form-control">
                    <span id="npassErr"></span>
                </div>
            </div>
        </div>

        <div class="form-horizontal" id="horizontal">
            <div class="form-group">
                <label for="newPass2" class="col-sm-3">Retype New Password</label>
                <div class="col-sm-9">
                    <input type="password" name="newPass2" id="newPass2" class="form-control">
                    <span id="n2passErr"></span>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" name="changePass" id="chPassBtn" class="btn btn-success"> <b>Change Password</b></button>

            <?php if($userType == "Patient"){ ?>
                <a href="router.php?" type="button" name="" id="" class="btn btn-warning">Back</a>
                <a href="patient.php" class="btn btn-primary" align="right">Home</a>
            <?php	}else if($userType == "Doctor"){ ?>
                <a href="router.php?" type="button" name="" id="" class="btn btn-warning">Back</a>
                <a href="doctor.php" class="btn btn-primary" align="right">Home</a>
            <?php	}else if($userType == "Admin"){ ?>
                <a href="router.php?f1=admin&f2=show" class="btn btn-warning">Back</a>
                <a href="admin.php" class="btn btn-primary" align="right">Home</a>
            <?php	}else{ echo "Can not Find The Home of User <br><br>"; } ?>
        </div>
    </div>
</div>



                <!--</div>
            </form>
        </div>
    </div>

    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
</body>
</html>-->