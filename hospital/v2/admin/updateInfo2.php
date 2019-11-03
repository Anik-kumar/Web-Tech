<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();
	// error_reporting(E_ALL & ~E_NOTICE);
	$userId; $patId; $empId; $email; $result;
	$conn = getConnection();
	$userId = $_REQUEST['userid'];
	$patId = $_REQUEST['patId'];
//	$empId = $_REQUEST['empid'];
	$email = $_REQUEST['email'];
	// echo $patId . " " . $empId;
    $empId = $_REQUEST['id'];


	if($_SESSION['usertype'] == "Admin"){
			if($patId!=""){
				$query = "SELECT * FROM patients WHERE patient_id='".$patId."'";

			}else{
				$query = "SELECT * FROM employee E INNER JOIN department D ON E.dep_id=D.dept_id WHERE emp_id='".$empId."'";
			}
//            $query = "SELECT * FROM employee E INNER JOIN department D ON E.dep_id=D.dept_id WHERE emp_id='".$id."'";
//            echo $query;
			$result = getResults($query);
			$row = mysqli_fetch_assoc($result);
//			print_r($row);
	}

	if(isset($_REQUEST['update'])){
		$upFirstName = $_REQUEST['upFirstName'];
		$upLastName = $_REQUEST['upLastName'];
		$upEmail = $_REQUEST['upEmail'];
		$upContact = $_REQUEST['upContact'];
		$upDeptId = $_REQUEST['department'];
		$upSalary = $_REQUEST['upSalary'];
		// echo $email;
        if($patId==null){
            if(empty($upFirstName) || empty($upLastName) || empty($upEmail) || empty($upContact) || empty($upDeptId) || empty($upSalary) ){
                echo "<script type='text/javascript'> alert('Fill Up Form First')</script>";
            }else{
                $upQuery = "UPDATE employee SET first_name='".$upFirstName."', last_name='".$upLastName."', email='".$upEmail."', contact_no='".$upContact."', dep_id=".$upDeptId.", salary=".$upSalary." WHERE emp_id='".$empId."'";
                $query2 = "UPDATE all_users2 SET user_first_name='".$upFirstName."', user_last_name='".$upLastName."', user_email='".$upEmail."' WHERE uemp_id='".$empId."'";
            }
        }

        if($patId!=null){
            if(empty($upFirstName) || empty($upLastName) || empty($upEmail) || empty($upContact) ){
                echo "<script type='text/javascript'> alert('Fill Up Form First')</script>";

            }else{
                $upQuery = "UPDATE patients SET first_name='".$upFirstName."', last_name='".$upLastName."', email='".$upEmail."', contact_no='".$upContact."' WHERE patient_id='".$patId."'";
                $query2 = "UPDATE all_users2 SET user_first_name='".$upFirstName."', user_last_name='".$upLastName."', user_email='".$upEmail."' WHERE upatient_id='".$patId."'";
            }
        }

//            echo $query2;
//            echo $upQuery;
        if(mysqli_query($conn, $upQuery) && mysqli_query($conn, $query2)){
            echo "<script type='text/javascript'> alert('User Profile Updated')</script>";
        }else{
            echo "<script type='text/javascript'> alert('error \". mysqli_errno($conn) . \"-*-\" . mysqli_error($conn)')</script>";
        }

	}


 ?>


<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Update Info </title>
        <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="resources/css/updateUserInfo.css">
        <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="resources/js/validateForms.js"></script>
    </head>
    
<body>
    <div class="container" id="center">
        <div id="back">-->
<div class="row">
    <div  class="col-xs-6 col-sm-4 col-md-4">
        <h2 class="blue-backgnd">Update Profile </h2>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-offset-1">
        <form action="" method="post">
            <table class="table table-responsive half">
                <tr class="form-group">
                    <td>First Name</td>
                    <td>
                        <input class="form-control" type="text" name="upFirstName" id="upFirstName" value="<?= $row['first_name'] ?>">
                        <span id="firstNameErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input class="form-control" type="text" name="upLastName" id="upLastName" value="<?= $row['last_name'] ?>">
                        <span id="lastNameErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input class="form-control" type="text" name="upEmail" id="upEmail" value="<?= $row['email'] ?>">
                        <span id="emailErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td>
                        <input class="form-control" type="text" name="upContact" id="upContact" value="<?= $row['contact_no'] ?>">
                        <span id="contactErr"></span>
                    </td>
                </tr>
                <?php if($patId==null || empty($patId)==true){
                    echo $patId;
                    $query2 = "SELECT * FROM department";
                    $result2 = getResults($query2); ?>
                    <tr>
                        <td>Department</td>
                        <td>
                            <select name="department" id="department" class="form-control">
                                <option value="<?= $row['dept_id'] ?>" selected> <?= $row['dept_name'] ?> </option>
                                <option value=""></option>
                                <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                    <option value="<?= $row2['dept_id'] ?>"> <?= $row2['dept_name'] ?> </option>
                                <?php	} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td>
                            <input class="form-control" type="text" name="upSalary" id="upSalary" value="<?= $row['salary'] ?>">
                            <span id="salaryErr"></span>
                        </td>
                    </tr>

                <?php } ?>

                <tr>
                    <td>
                        <input type="submit" name="update" value="Update" class="btn btn-success">
                    </td>
                    <td>
                        <?php if($row['user_type'] == "Patient"){ ?>
                            <a href="admin.php?f1=patient&f2=show" class="ui  button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>

                        <?php	}else if($row['user_type'] == "Doctor"){ ?>
                            <a href="admin.php?f1=doctor&f2=show" class="ui button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>

                        <?php	}else if($row['user_type'] == "Nurse"){ ?>
                            <a href="admin.php?f1=nurse&f2=show" class="ui button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>

                        <?php	}else if($row['user_type'] == "Accountant"){ ?>
                            <a href="admin.php?f1=account&f2=show" class="ui button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>

                        <?php	}else if($row['user_type'] == "Pathologist"){ ?>
                            <a href="admin.php?f1=patho&f2=show" class="ui button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>

                        <?php	}else if($row['user_type'] == "Pharmacist"){ ?>
                            <a href="admin.php?f1=pharma&f2=show" class="ui button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>

                        <?php	}else if($row['user_type'] == "Admin"){ ?>
                            <a href="admin.php?f1=admin&f2=show" class="ui button btnLeft">Back</a>
                            <a href="admin.php" class="ui button btnLeft">Home</a>


                        <?php	}else{ echo "Can not Find The Home of User <br><br>"; } ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>