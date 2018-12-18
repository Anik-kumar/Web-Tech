<?php

    session_start();
    require_once "db.php";
    $query = "select * from department";
    $conn = getConnection();
    $result = mysqli_query($conn, $query);
    $id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>REQUEST FOR ADMIT</title>
	<script type="text/javascript" src="script/admit.js"></script>
	<link rel="stylesheet" type="text/css" href="admit.css">
</head>
<body>
	<form method="POST" action="php/admitcheck.php">
		<table border="5" align="center">
			
			<th colspan="2">ADMIT</th>
		
			<tr>
				<td>Patient ID</td>
				<td><input type="text" name="patientid" id="pid" value="<?= $id ?>">
					<span id="patientid"></span>
				</td>
			</tr>
			<tr>
				<td>Patient Name</td>
				<td><input type="text" name="patientname" id="pname">
					<span id="patientname"></span>
				</td>
			</tr>
			<tr>
				<td>Department</td>
				<td>
                    <select name="department" id="dep">
                        <option value=""></option>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <option value="<?= $row['dept_name'] ?>"> <?= $row['dept_name'] ?> </option>
                        <?php	} ?>
                    </select>
					<span id="dept"></span>
				</td>
			</tr>
			<tr>
				<td>Disease</td>
				<td><input type="text" name="disease" id="dis">
					<span id="disease"></span>
				</td>
			</tr>
			
			<tr>
				<td align="left">
				<input type="submit" name="submit" value="Submit" onclick="return validate()">
				</td>
				 <td align="right">
				<a href="patienthome.php">Home</a>
			    </td>
			</tr>
		</table>
	</form>
</body>
</html>