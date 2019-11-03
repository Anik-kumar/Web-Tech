<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once 'db.php';
	session_start();
	$row;

	$conn = getConnection();
	if($_SESSION['usertype']=="Admin"){
		$id = $_SESSION['id'];
		$email = $_SESSION['email'];
		$query = "SELECT * FROM employee WHERE emp_id=".$id." AND email='".$email."'";
		if($result = mysqli_query($conn, $query)){
			$row = mysqli_fetch_assoc($result);
		}else{
//			echo "error " . mysqli_errno($conn) . mysqli_error($conn);
            echo "<script type='text/javascript'> alert('SQL Error')</script>";
		}
	}


	if(isset($_REQUEST['update'])){
		$upFirstName = $_REQUEST['upFirstName'];
		$upLastName = $_REQUEST['upLastName'];
		$upEmail = $_REQUEST['upEmail'];
		$upContact = $_REQUEST['upContact'];
		$upDeptId = $_REQUEST['department'];
		$upSalary = $_REQUEST['upSalary'];
		// echo $email;
        if(empty($upFirstName) || empty($upLastName) || empty($upEmail) || empty($upContact) || empty($upDeptId) || empty($upSalary) ){
            echo "<script type='text/javascript'> alert('Fill Up Form First')</script>";
        }else{
            $upQuery = "UPDATE employee SET first_name='".$upFirstName."', last_name='".$upLastName."', email='".$upEmail."', contact_no='".$upContact."', dep_id=".$upDeptId.", salary=".$upSalary." WHERE emp_id='".$id."' AND email='".$email."'";
            $query2 = "UPDATE all_users2 SET user_first_name='".$upFirstName."', user_last_name='".$upLastName."', user_email='".$upEmail."' WHERE uemp_id='".$id."'";

            if(mysqli_query($conn, $upQuery) && mysqli_query($conn, $query2)){
                echo "<script type='text/javascript'> alert('User Profile Updated')</script>";
                header("Location: updateProfileAdmin.php");
            }else{
//			echo "error ". mysqli_errno($conn) . "-*-" . mysqli_error($conn);
                echo "<script type='text/javascript'> alert('SQL Error')</script>";
                header("Location: updateProfileAdmin.php");
            }
        }
		

	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/updateProfileAdmin.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validateForms.js"></script>
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <h3>Update Admin Profile</h3>
            <form class="form-horizontal" action="" method="post">
                <div class="form-horizontal gap">
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="upFirst">First Name</label>
                        <input type="text" class="form-control" name="upFirstName" id="upFirst" value="<?= $row['first_name'] ?>">
                        <span id="firstNameErr"></span>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="upLast">Last Name</label>
                        <input type="text" class="form-control" name="upLastName" id="upLast" value="<?= $row['last_name'] ?>">
                        <span id="lastNameErr"></span>
                    </div>

                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="upEmail">Email</label>
                        <input type="text" class="form-control" name="upEmail" id="upEmail" value="<?= $row['email'] ?>">
                        <span id="emailErr"></span>
                    </div>

                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="upContact">Contact No</label>
                        <input type="text" class="form-control" name="upContact" id="upContact" value="<?= $row['contact_no'] ?>">
                        <span id="contactErr"></span>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="upSalary">Salary</label>
                        <input type="text" class="form-control" name="upSalary" id="upSalary" value="<?= $row['salary'] ?>">
                        <span id="salaryErr"></span>
                    </div>


                    <?php	$query2 = "SELECT * FROM department";
                    $result2 = getResults($query2);
                    $query3 = "SELECT * FROM department WHERE dept_id=".$row['dep_id'];
                    $result3 = getResults($query3);
                    $row3 = mysqli_fetch_assoc($result3); ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="<?= $row3['dept_id'] ?>" selected> <?= $row3['dept_name'] ?> </option>
                            <option value=""></option>
                            <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                <option value="<?= $row2['dept_id'] ?>"> <?= $row2['dept_name'] ?> </option>
                            <?php	} ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="update" value="Update">
                        <a href="admin.php" class="btn btn-danger">Go Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

	
</body>
</html>