<?php

	session_Start();
	include('db.php');
	$userid = $_SESSION['id'];
	$sql = "select * from patients where patient_id= '$userid' ";
	$conn = getConnection();
	$result = mysqli_query($conn,$sql);
?>	

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="../admin/vendors/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

    <div class="container">
        <table border="5" align="center">

            <tr align="center">
                <td colspan="2"><h3>Patient Profile</h3></td>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result)){  ?>
                <tr>
                    <td>First Name</td>
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
                    <td>Contact</td>
                    <td><?=$row['contact_no']?></td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><?=$row['age']?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?=$row['gender']?></td>
                </tr>
                <tr>
                    <td>Date Of Birth</td>
                    <td><?=$row['date_of_birth']?></td>
                </tr>
                <tr>
                    <td>User Type</td>
                    <td><?=$row['user_type']?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="patienthome.php">Home</a>
                    </td>
                </tr>
            <?php   }	?>

        </table>
    </div>

</body>
</html>