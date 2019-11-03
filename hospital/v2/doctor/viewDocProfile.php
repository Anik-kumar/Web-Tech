<?php 
	session_start();
	include ('db.php');
	$userid = $_SESSION['id'];
	$sql = "select * from employee e inner join department d on e.dep_id=d.dept_id where emp_id= '".$userid."' ";
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/profile.css">

</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <div>
                <h3>Profile</h3>
                <table class="table table-responsive">
                    <?php
                    while($row = mysqli_fetch_assoc($result)){  ?>
                        <tr>
                            <td>Employee ID</td>
                            <td><?=$row['emp_id']?></td>
                        </tr>
                        <tr>
                            <td>Department ID</td>
                            <td><?=$row['emp_id']?></td>
                        </tr>
                        <tr>
                            <td>Department Name</td>
                            <td><?=$row['dept_name']?></td>
                        </tr>
                        <tr>
                            <td> First Name</td>
                            <td><?=$row['first_name']?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?=$row['last_name']?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><?=$row['email']?></td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td><?=$row['contact_no']?></td>
                        </tr>

                        <tr>
                            <td>Gender</td>
                            <td><?=$row['gender']?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?=$row['date_of_birth']?></td>
                        </tr>

                        <tr>
                            <td>User Type</td>
                            <td><?=$row['user_type']?></td>
                        </tr>
                        <tr>
                            <td>Salary</td>
                            <td><?=$row['salary']?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <a href="updateDocProfile.php" class="btn btn-warning">Update</a>
                                <a href="doctorHome.php" class="btn btn-danger">Go Home</a>
                            </td>
                        </tr>
                    <?php	}	?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>