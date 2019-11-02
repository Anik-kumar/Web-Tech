<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();

    if(isset($_SESSION['id'])){

        if(isset($_REQUEST['status'])){
            echo "<script type='text/javascript'> alert('User Deleted Successfully')</script>";
        }

        $row; $flag1=true; $flag2=true;
        $result1 = ''; $result2= '';

        if(isset($_REQUEST['searchBtn'])){
            $searchStr = $_REQUEST['searchText'];

            if(empty($searchStr)==false){
                $query1 = "SELECT * FROM employee WHERE emp_id LIKE '%".$searchStr."%' OR first_name LIKE '%".$searchStr."%' OR last_name LIKE '%".$searchStr."%' OR email LIKE '%".$searchStr."%'" ;
                $query2 = "SELECT * FROM patients WHERE patient_id LIKE '%".$searchStr."%' OR first_name LIKE '%".$searchStr."%' OR last_name LIKE '%".$searchStr."%' OR email LIKE '%".$searchStr."%'" ;
                $conn = getConnection();
                $result1 = getResults($query1);
                $result2 = getResults($query2);

                if(!$result1){
                    $flag1 = false;
                }else if(!$result2){
                    $flag2 = false;
                }
            }else{
                echo "<script type='text/javascript'> alert('Invalid Search')</script>";
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Delete User</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/deleteEmp.css">
</head>
<body>

    <div class="container"  id="top">
        <div id="back">
            <form action="deleteEmp.php" method="post" class="form-inline form-group">
                <input type="text" name="searchText" class="form-control" id="searchTest">
                <button type="submit" name="searchBtn" class="btn btn-warning">Search ID</button>
            </form>

            <div class="container-fluid" id="center">

                <h3 class="gap">View Profile</h3>
                <table cellspacing="10px" class="table table-responsive">
                    <tr id="header">
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Contact No</td>
                        <td>Gender</td>
                        <td>User Type</td>
                        <td>Salary</td>
                    </tr>
                    <?php
                    if($flag1==true && isset($_REQUEST['searchBtn'])){ ?>

                        <?php while($row = mysqli_fetch_assoc($result1)){ ?>
                            <tr>
                                <td> Employee ID - <?= $row['emp_id'] ?> </td>
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['last_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['contact_no'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['user_type'] ?></td>
                                <td><?= $row['salary'] ?></td>

                                <td colspan="12" align="right"><a href="deleteEmpValidation.php?id=<?= $row['emp_id'] ?>&user=<?= $row['user_type'] ?>" class="btn btn-danger btn-sm">Delete User</a></td>
                            </tr>

                            <tr>  </tr>
                        <?php	} ?>

                    <?php	}
                    if($flag2==true && isset($_REQUEST['searchBtn'])){ ?>

                        <?php while($row = mysqli_fetch_assoc($result2)){ ?>
                            <tr>
                                <td>Patient ID - <?= $row['patient_id'] ?> </td>
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['last_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['contact_no'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['user_type'] ?></td>
                                <td></td>
                                <td  colspan="12" align="right"><a href="deleteEmpValidation.php?id=<?= $row['patient_id'] ?>&user=<?= $row['user_type'] ?>" class="btn btn-danger">Delete User</a></td>
                            </tr>

                            <tr>  </tr>
                        <?php	} ?>

                    <?php }else if(isset($_REQUEST['searchBtn'])){
                        echo "<script type='text/javascript'> alert('Result Not Found')</script>";
                    } ?>

                </table>
            </div>
            <!-- <input type="submit" name="update" value="Delete"> -->
            <a href="admin.php" class="btn btn-primary">Home</a>
        </div>
    </div>



    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>

</body>
</html>