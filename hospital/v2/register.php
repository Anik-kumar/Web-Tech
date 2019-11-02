<?php
	// print_r($_POST);

    error_reporting(E_ALL & ~E_NOTICE);

 ?>

<div id="showw"></div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="admin/resources/css/regester.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script rel="stylesheet" type="text/javascript" src="admin/vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="admin/resources/js/validation.js"></script>


</head>
<body class="regimage">
		
		<div class="container">
            <div id="back">

                <h1 class="jumbotron">REGISTRATION</h1>

                <form action="" method="POST">

                    <div class="left">
                        <div class="form-inline gap_reg">
                            <div class="form-group gap_reg">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstName1" class="form-control" placeholder="Anik">

                            </div>
                            &nbsp;&nbsp;
                            <div class="form-group gap_reg">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastName" id="lastname" class="form-control" placeholder="Sarkar">
                            </div>
                            <span id="nameErr"></span>
                        </div>


                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label for="email" class=" col-sm-3">Email</label>
                                <div class="col-sm-9 gap_reg">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="anik@gmail.com">
                                    <span id="emailErr"></span>
                                </div>
                            </div>

                        </div>

                        <div class="form-inline gap_reg">
                            <div class="form-group gap_reg">
                                <label for="password1">Password</label>
                                <input type="password" name="password1" id="password1" class="form-control">

                            </div>
                            &nbsp;&nbsp;&nbsp;
                            <div class="form-group gap_reg">
                                <label for="password2">Confirm Password</label>
                                <input type="password" name="password2" id="password2" class="form-control">
                            </div>
                            <span id="passErr"></span>
                        </div>

                        <div>
                            <div class="form-inline gap_reg">
                                <span>
                                    Gender :
                                </span>

                                <input type="radio" name="gender" value="male" id="male" class="radio form-control">
                                <label for="male" class="gap_reg">Male</label>

                                <input type="radio" name="gender" value="female" id="female" class="radio form-control">
                                <label for="female">Female</label>
                                <span id="genderErr"></span>
                            </div>

                        </div>

                        <div class="gap_reg col-sm-12 form-inline">
                            <span>Date Of Birth:</span>

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

                        <div class="gap_reg form-inline">
                            <label for=" contact">Contact </label>&nbsp; &nbsp; &nbsp; &nbsp;
                            <input type="number" name="contact" id="contact" class="form-control" placeholder="01831845609">
                            <span id="contactErr"></span>
                        </div>

                        <button type="button" name="submit" value="Submit" id="submitBtn" class="btn btn-danger">Register</button>

                        <a href="login.php" class="btn btn-primary">Sign In</a>

                    </div>
	            </form>
        
            </div>
    </div>

    <script rel="stylesheet" type="text/javascript" src="admin/vendors/js/jquery-3.3.1.min.js"></script>
    <script type="javascript" src="admin/vendors/js/bootstrap.js"></script>


    
</body>
</html>