<?php
	require_once "db.php";
	session_start();

	if($_SESSION['usertype'] == "Admin"){

		$conn = getConnection();
		$query = "SELECT e.*, d.dept_name FROM employee e INNER JOIN department d ON e.dep_id=d.dept_id";
		$result = mysqli_query($conn, $query);

	}

 ?>


<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Employee List</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showemp.css">

</head>
<body>

    <div class="container" id="center">
        <div id="back">-->
<div id="upperDiv-showAdmin">
    <h2 class="blue-backgnd">Employee List</h2>
</div>

<div id="mainDiv-showAdmin">
    <table class="table table-responsive">
        <tr id="header">
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Email</th>
<!--            <th>Password</th>-->
            <th>Date Of Birth</th>
            <th>Age</th>
            <th>Gender</th>
            <th>User Type</th>
            <th>Contact No</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td> <?php echo $row['emp_id']; ?> </td>
                <td> <?php echo $row['first_name']; ?> </td>
                <td> <?php echo $row['last_name']; ?> </td>
                <td> <?php echo $row['dept_name']; ?> </td>
                <td> <?php echo $row['email']; ?> </td>
<!--                <td> --><?php //echo $row['pass']; ?><!-- </td>-->
                <td> <?php echo $row['date_of_birth']; ?> </td>
                <td> <?php echo $row['age']; ?> </td>
                <td> <?php echo $row['gender']; ?> </td>
                <td> <?php echo $row['user_type']; ?> </td>
                <td> <?php echo $row['contact_no']; ?> </td>
            </tr>
        <?php	} ?>
        <tr>
            <td colspan="11" align="right">
                <a href="admin.php" class="btn btn-danger">Go Home</a>
            </td>
        </tr>
    </table>
</div>



<script type="text/javascript">
    $("#deleteBtn").click(function (e) {
        if(window.confirm("Are You Sure?")){
            e.preventDefault();
            window.location.href("deleteEmpValidation.php?empId=<?= $row['emp_id']; ?>&user=emp&page=showAdmins");
        }
    });
</script>