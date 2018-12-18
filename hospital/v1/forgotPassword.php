<?php
    require_once "db.php";

    if(isset($_REQUEST['submit'])){
        $lastName = $_REQUEST['lastName'];
        $email = $_REQUEST['email'];
        $year = $_REQUEST['dobYear'];
        $age = date('Y') - $year;

        $query = "SELECT * FROM patients WHERE last_name='".$lastName."' AND email='".$email."' AND age='".$age."'";
        $query2 = "SELECT * FROM employee WHERE last_name='".$lastName."' AND email='".$email."' AND age='".$age."'";
        $result1 = getResults($query);
        $result2 = getResults($query2);

        if(mysqli_num_rows($result1)>=1){
            header("location: changePassword2.php?email=$email&user=patient");
        }else if(mysqli_num_rows($result2)>=1){
            header("location: changePassword2.php?email=$email&user=emp");
        }else{
            echo "<script>alert('Wrong Information')</script>";
            header("location: forgotPassword.php");
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin/resources/css/forgotPassword.css">
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <h2>Forgot Password</h2>
            <form action="">
                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label class="col-sm-4" for="lastName">Enter Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="lastName" id="lastName" class="form-control">
                            <span id="lastErr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="email">Enter Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" id="email" class="form-control">
                            <span id="emailErr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dobYear" class="col-sm-4">Enter Birth Year</label>
                        <div class="col-sm-8">
                            <select name="dobYear" id="dobYear" class="form-control">
                                <option value=""></option>
                            <?php
                            for($i=date("Y")-1; $i>=1990; $i=$i-1){ ?>
                                <option value="<?= $i ?>"> <?= $i ?> </option>
                            <?php	} ?>
                            </select>
                            <span id="yearErr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                        <a href="login.php" class="btn btn-danger">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
	
</body>
</html>