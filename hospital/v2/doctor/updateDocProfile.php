<?php
	session_start();
	include('db.php');
	$userid = $_SESSION['id'];
	$sql = "select * from employee where emp_id= '".$userid."' ";
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/doctor/updateProfile.css">
    <script type="text/javascript" src="../assets/js/doctor/updateProfile.js"></script>
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <div>
                <form method="post" action="php/updateProfileCheck.php" >
                    <h3>Update Profile Here</h3>
                    <div class="form-horizontal gap">
                        <div class="form-group">
                            <label for="fname" class="col-lg-2">First Name</label>
                            <div class="col-lg-3">
                                <input type="text" name="firstname" id="fname" class="form-control" value="<?=$data['first_name']?>">
                                <span  id="firstErr"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="col-lg-2">Last Name</label>
                            <div class="col-lg-3">
                                <input type="text" name="lastname"  id="lname" class="form-control" value="<?=$data['last_name']?>">
                                <span  id="lastErr"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2">Email</label>
                            <div class="col-lg-3">
                                <input type="text" name="email"  id="email" class="form-control" value="<?=$data['email']?>">
                                <span id="emailErr"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dob" class="col-lg-2">Date Of Birth</label>
                            <div class="col-lg-3">
                                <input type="date" name="dob"  id="dob" class="form-control" >
                                <span id="dobErr"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="col-lg-2">Contact No</label>
                            <div class="col-lg-3">
                                <input type="text" name="contact" id="contact" class="form-control" value="<?=$data['contact_no']?>">
                                <span id="contactErr"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="button" name="submit" value="U P D A T E" class="btn btn-success" onclick="return validate()">
                            <a href="doctorHome.php" class="btn btn-danger">HOME</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>