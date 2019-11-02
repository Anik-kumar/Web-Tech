
<?php
error_reporting(E_ALL & ~E_NOTICE);
    require_once "db.php";
//	$id; $row;
    $email = $_REQUEST['email'];
    $userType = $_REQUEST['user'];
//    echo $userType;
	if(isset($_REQUEST['changePass'])){
		$newPass = $_REQUEST['newPass'];
		$newPass2 = $_REQUEST['newPass2'];
//		$result;
		$conn = getConnection();
		if(empty($newPass)==true || empty($newPass2)==true){
            echo "<script type='text/javascript'> alert('Fill Up Passwords')</script>";
		}else if($newPass!=$newPass2){
            echo "<script type='text/javascript'> alert('Password did not matched')</script>";
		}else{
			// $conn = getConnection();

            if($userType == "patient"){
                $query2 = "UPDATE patients SET pass='".md5($newPass)."' WHERE email='".$email."'";
            }else{
                $query2 = "UPDATE employee SET pass='".md5($newPass)."' WHERE email='".$email."'";
            }
            $query3 = "UPDATE all_users2 SET user_pass='".md5($newPass)."' WHERE user_email='".$email."'";

            if(mysqli_query($conn, $query2) && mysqli_query($conn, $query3)){
                echo "<script type='text/javascript'> alert('Password Updated Successfully')</script>";
                header("location: login.php");
            }else{
                echo "<script type='text/javascript'> alert('Database Connection Error')</script>";
            }
		}
	}

 ?>



<!DOCTYPE html>
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
                    <hr class="gap">

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
                        <button type="submit" name="changePass" id="chPassBtn" class="btn btn-success">Change Password</button>
                        <a href="login.php" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
</body>
</html>