<?php
error_reporting(E_ALL & ~E_NOTICE);
    require_once "db.php";
	session_start();
    if(isset($_SESSION['id'])){
        $conn = getConnection();
        $query = "SELECT * FROM department";
        $result = mysqli_query($conn, $query);

        if(isset($_REQUEST['submit'])){
            $id = "";
            $dept_id = $_REQUEST['department'];
            $firstName = mysqli_real_escape_string($conn, trim($_REQUEST['firstName']));
            $lastName = mysqli_real_escape_string($conn, trim($_REQUEST['lastName']));
            $email = mysqli_real_escape_string($conn, trim($_REQUEST['email']));
            $pass1 = $_REQUEST['password1'];
            $pass2 = $_REQUEST['password2'];
            $gender = $_REQUEST['gender'];
            $dobYear = $_REQUEST['year'];
            $dobMonth = $_REQUEST['month'];
            $dobDay = $_REQUEST['day'];
            $dob = $dobYear. "-".$dobMonth. "-".$dobDay;
            $age = date('Y') - $dobYear;
            $salary = mysqli_real_escape_string($conn, trim($_REQUEST['salary']));
            $contact = $_REQUEST['contact'];
            $userType = $_REQUEST['userType'];

            if(empty($firstName)==true ||empty($lastName)==true ||empty($email)==true ||empty($pass1)==true ||empty($pass2)==true ||empty($gender)==true ||empty($dobYear)==true ||empty($dobMonth)==true ||empty($dobDay)==true ||empty($salary)==true ||empty($contact)==true || $salary < 1 || $contact < 1){
                echo "Invalid Form Input <br><br>";
            }else{
                if($pass1 == $pass2){
                    if(!strpos($email, "@")==false && !strpos($email, ".com")==false){
                        $query2 = "INSERT INTO employee VALUES(NULL,'".$dept_id."','".$firstName."','".$lastName."','".$email."','".md5($pass1)."','".$age."','".$dob."','".$gender."','".$userType."','".$contact."','".$salary."')";
                        $query3 = "SELECT emp_id FROM employee WHERE email='".$email."'";
                        // echo $query2;

                        if(mysqli_query($conn, $query2)){

                            $result2 = mysqli_query($conn, $query2);
                            $row = mysqli_fetch_assoc($result2);
                            $lastId = $row['patient_id'];
                            // echo $lastId;
                            // print_r($lastId . "------");
                            $query4 = "INSERT INTO `all_users` VALUES (0, '".$lastId."', NULL, '".$firstName."', '".$lastName."', '".$email."', '".md5($pass1)."', '".$userType."')";

                            if(!mysqli_query($conn, $query4)){
                                echo "Error ". mysqli_errno($conn);
                            }else{
                                echo "New Employee Added Successfully <br><br><br>";
                            }
                        }else{
                            echo "=Sql Error ".mysqli_error($conn)." <br><br>";
                        }
                    }else{
                        echo "Invalid Email. Ex: abc@de.com <br><br>";

                    }
                }else{
                    echo "Both Password does not Match <br> <br>";
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
	<title>Add Employee</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/addemploye.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validation.js"></script>
</head>

<body>
    <div class="container" id="center">
        <div id="back">
            <form action="" method="POST">
                <div>
                    <h2 class="gap">Create New Employee</h2>
                    <hr class="gap">
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="usertype" class="col-sm-3"> User Type</label>
                            <div class="col-sm-9">
                                <select name="userType" id="usertype" class="form-control">
                                    <option value=""></option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                <span id="userErr"></span>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="department" class="col-sm-3">Depatment</label>
                            <div class="col-sm-9">
                                <select name="department" id="department" class="form-control">
                                    <option value=""></option>
                                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?= $row['dept_id'] ?>"> <?= $row['dept_name'] ?> </option>
                                <?php	} ?>
                                </select>
                                <span id="deptErr"></span>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="firstname" class="col-sm-3">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="firstName" id="firstname" placeholder="Enter First Name" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="lastname" class="col-sm-3">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="lastName" id="lastname" placeholder="Enter Last Name" class="form-control">
                                <span id="nameErr"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="email" class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" id="email" placeholder="Ex: abcdef@example.com" class="form-control">
                                <span id="emailErr"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="password" class="col-sm-3">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password1" id="password1" placeholder="Enter Password" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="confirmpassword" class="col-sm-3">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password2" id="password2" placeholder="Enter Password Again" class="form-control">
                                <span id="passErr"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-3">Gender</label>
                            <div class="col-sm-9">
                                <div class="form-group form-inline col-sm-6">
                                    <input type="radio" name="gender" value="male" id="male" class="form-control radio"> <label for="male">Male</label>
                                </div>
                                
                                <div class="form-group form-inline col-sm-6">
                                    <input type="radio" name="gender" value="female" id="female" class="form-control radio"> 
                                    <label for="female">Female</label>
                                    <span id="genderErr"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-3">Date Of Birth</label>
                            <div class="col-sm-9">
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select Year</option>
                                    <option value=""></option>
                                    <?php 
                                        for($i=date("Y")-1; $i>=1990; $i=$i-1){ ?>
                                            <option value="<?= $i ?>"> <?= $i ?> </option>
                                    <?php	} ?>
                                </select>
                                <select name="month" id="month" class="form-control">
                                    <option value="">Select Month</option>
                                    <option value=""></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <select name="day" id="day" class="form-control">
                                    <option value="">Select Day</option>
                                    <option value=""></option>
                                    <?php 
                                        for($i=1; $i<=31; $i=$i+1){ ?>
                                            <option value="<?= $i ?>"> <?= $i ?> </option>
                                    <?php	} ?>
                                </select>
                                <span id="dobErr"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="contact" class="col-sm-3">Contact No</label>
                            <div class="col-sm-9">
                                <input type="number" name="contact" id="contact" class="form-control">
                                <span id="contactErr"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-horizontal gap" id="horizontal">
                        <div class="form-group">
                            <label for="salary" class="col-sm-3">Salary (Monthly)</label>
                            <div class="col-sm-9">
                                <input type="number" name="salary" id="salary" class="form-control">
                                <span id="salaryErr"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" name="submit" id="empSubmitBtn" class="btn btn-success">Create User</button>
                        <a href="admin.php" class="btn btn-danger">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

	
<script src="vendors/js/jquery-3.3.1.js"></script>
<script src="vendors/js/bootstrap.js"></script>
</body>
</html>