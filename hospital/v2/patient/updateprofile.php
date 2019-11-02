<?php
	session_Start();
	include('db.php');
	$userid = $_SESSION['id'];
	$sql = "select * from patients where patient_id='".$userid."'";
	$conn = getConnection();
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
	<script type="text/javascript" src="script/updateprofile.js"></script>
    <link rel="stylesheet" type="text/css" href="../admin/vendors/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="updateprofile.css">
	
</head>
<body>

	<div class="container">
        <form method="post" action="php/updateprofilecheck.php" >
            <table border="5" align="center">

                <th colspan="2">Update Profile</th>

                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="firstname"  id="fname" value="<?=$data['first_name']?>">
                        <span id="first"></span>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input type="text" name="lastname" id="lname" value="<?=$data['last_name']?>">
                        <span id="last"></span>
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" id="email" value="<?=$data['email']?>">
                        <span id="mail"></span>
                    </td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td>
                        <input type="text" name="contact" id="contact" value="<?=$data['contact_no']?>">
                        <span id="cont"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update" onclick="return validate()">
                    </td>

                    <td>
                        <a href="patienthome.php">Home</a>
                    </td>
                </tr>

            </table>
        </form>
    </div>




</body>
</html>