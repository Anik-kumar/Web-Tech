<?php require_once 'db.php';
//error_reporting(E_ALL & ~E_NOTICE);

	$conn = getConnection();

	if(isset($_POST['login'])){

		$email = mysqli_real_escape_string($conn, trim($_POST['userEmail']));
		$pass = md5(trim($_POST['password']));
        // $usertype = $_POST['usertype'];
		$rememberMe = $_POST['rememberMe'];
		echo $usertype;
		$query;

		if (empty($email)==true || empty($pass)==true) {
            echo "<script type='text/javascript'> alert('Fill up User Id and Password')</script>";
		}else{
			$query = "SELECT * FROM all_users2 WHERE user_email='". $email."' and user_pass='". $pass."'";
			
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			print_r($row);

			if($row['user_email']==$email && $row['user_pass']==$pass){

                session_start();
                $_SESSION['first_name'] = $row['user_first_name'];
                $_SESSION['last_name'] = $row['user_last_name'];
                $_SESSION['full_name'] = $row['user_first_name'] . " " . $row['user_last_name'];
                if($row['user_type']=="Patient"){
                    $_SESSION['id'] = $row['upatient_id'];
//                    echo "////////////////////******************///////////////////";
                }else{
                    $_SESSION['id'] = $row['uemp_id'];
                }
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['usertype'] = $row['user_type'];

                if(!empty($rememberMe)){
                    setcookie("email", $email, time()+(60*60*24));
                    setcookie("password", $pass, time()+(60*60*24));
                    setcookie("usertype", $row['user_type'], time()+(60*60*24));
                }else{
                    if(isset($_COOKIE['email'])){
                        setcookie("email", "");
                    }
                    if(isset($_COOKIE['password'])){
                        setcookie("password", "");
                    }
                    if(isset($_COOKIE['usertype'])){
                        setcookie("usertype", "");
                    }
                    
                }

				if($row['user_type']=='Admin'){
//				    echo $_SESSION['id'];
					header('Location: admin/admin.php');
				}else if($row['user_type']=='Doctor'){
					header('Location: doctor/doctorHome.php');
				}else if($row['user_type']=='Patient'){
					header('Location: patient/patienthome.php');
//                    $_SESSION['id2'] = $row['upatient_id'];
//                    echo "<br> ".$row['upatient_id']." <br>";
//                    echo "<br> ".$_SESSION['id2']." <br>";
//                    print_r($row);
				}
				
			}else{
                echo "<script type='text/javascript'> alert('Invalid ID or Password')</script>";
			}	
		}
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin/resources/css/login.css" >

	
</head>
<body class="bgimage">
    <div class="container" id="center">
        <div id="back">
            <h1 class="jumbotron">LOGIN</h1>
            <form action="" method="POST" >

                <div class="form-horizontal gap" id="horizontal">   
                    <div class="form-group">

                        <label for="useremail" class="col-sm-4" >User Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="useremail" name="userEmail" placeholder="anik@gmail.com" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>" >
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-sm-4">Password</label>
                        <div class="col-sm-8">
                            <input type="password" id="password" name="password" class="form-control" placeholder="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
                        </div>

                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-success" >&nbsp; Login &nbsp;</button>
                <a href="register.php" class=" btn btn-info">Register</a>
                <div class="form-inline gap">
                    <div class="cheackbox form-group">
                        <input type="checkbox" id="remember" name="rememberMe" class="form-control" <?php if(isset($_COOKIE['email'])){ ?> checked <?php } ?> >
                        <label for="remember">Remember Me</label>
                    </div>
                    <a href="forgotPassword.php" class="gap">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
<script src="admin/vendors/js/jquery-3.3.1.js"></script>
<script src="admin/vendors/js/bootstrap.js"></script>
</body>
</html>

<?php
//    print_r($_COOKIE);
    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
        $email2 = $_COOKIE['email'];
        $pass2 = $_COOKIE['password'];
//        echo $email2." ".$pass2 ." ---------------------";
        $query2 = "SELECT * FROM all_users2 WHERE user_email='".$email2."' AND user_pass='".$pass2."'";
        $result2 = getResults($query2);
//        echo $query2." ---------------------";

        if($result2){
            $row2 = mysqli_fetch_assoc($result2);
            $userType = $row2['user_type'];
            session_start();
            $_SESSION['name'] = $row2['user_first_name'] . " " . $row2['user_last_name'];
            if($row2['usertype']=="Patient"){
                $_SESSION['id'] = $row2['upatient_id'];
            }else{
                $_SESSION['id'] = $row2['uemp_id'];
            }
            $_SESSION['email'] = $row2['user_email'];
            $_SESSION['usertype'] = $row2['user_type'];

//            print_r($row2);
            if($row2['user_type']=='Admin'){
                header('Location: admin.php');
            }else if($row2['user_type']=='Doctor'){
                header('Location: doctor/doctorHome.php');
            }else if($row2['user_type']=='Patient'){
                header('Location: patient/patienthome.php');
            }
        }
    }

 ?>