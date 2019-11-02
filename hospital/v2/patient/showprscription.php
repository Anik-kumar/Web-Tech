<?php
    
	session_Start();
	include('db.php');
	$userid = $_SESSION['userid'];
	$sql = "select * from showPrescription where PatientID = '$userid' ";
	$conn = getConnection();
	$result = mysqli_query($conn,$sql);
?>	

<!DOCTYPE html>
<html>
<head>
	<title>show Prescription</title>
</head>
<body>

	<form action="" method="POST">
		<table border="1" align="center">
		   
			<tr align="center">
				<td colspan="2">prescription</td>
			</tr>
    <?php
        while($row = mysqli_fetch_assoc($result)){  ?>	
			
			<tr>
				<td>Date</td>
				<td><?=$row['Date']?></td>
			</tr>			
			<tr>
				<td>Hospital name</td>
				<td><?=$row['HospitalNmae']?></td>
			</tr>
			<tr>
				<td>Doctor Name</td>
				<td><?=$row['DoctorName']?></td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
						
			<tr>
				<td>Patient ID</td>
				<td><?=$row['PatientID']?></td>
			</tr>
			<tr>
				<td>Patient Name</td>
				<td><?=$row['PatientName']?></td>
			</tr>
						
		    <tr>
				<td>Age</td>
				<td><?=$row['Age']?></td>
			</tr>
			<tr>
				<td>Disease</td>
				<td><?=$row['Disease']?></td>
			</tr>
			
			<tr>
				<td>Test</td>
			<td><?=$row['Test']?></td>
			</tr>
			<tr>
				<td>Medicine</td>
				<td><?=$row['Medicine']?></td>
			</tr>
			
			<tr>
			    <td>
				<a href="patienthome.php">Home</a>
			    </td>
			</tr>
	<?php   }	?>			
		
        </table>
    </form>		
</body>
</html>