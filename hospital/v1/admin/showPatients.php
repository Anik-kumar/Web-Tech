<?php 
	require_once "db.php";
	session_start();

	if($_SESSION['usertype'] == "Admin"){

		$conn = getConnection();
		$query = "SELECT * FROM patients";
		$result = mysqli_query($conn, $query);

	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showPatients.css">

</head>
<body>
<div class="container" id="center">
    <div id="back">
        <h3 class="gap">Patient List</h3>
        <table class="table table-responsive">
            <tr id="header">
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Date Of Birth</td>
                <td>Age</td>
                <td>Gender</td>
                <td>User Type</td>
                <td>Contact No</td>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td> <?php echo $row['patient_id']; ?> </td>
                    <td> <?php echo $row['first_name']; ?> </td>
                    <td> <?php echo $row['last_name']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td> <?php echo $row['date_of_birth']; ?> </td>
                    <td> <?php echo $row['age']; ?> </td>
                    <td> <?php echo $row['gender']; ?> </td>
                    <td> <?php echo $row['user_type']; ?> </td>
                    <td> <?php echo $row['contact_no']; ?> </td>
                </tr>

            <?php	} ?>
            <tr>
                <td colspan="10" align="right">
                    <a href="admin.php" class="btn btn-success">Go Home</a>
                </td>
            </tr>
        </table>
    </div>
</div>


	
</body>
</html>