<?php
    
	session_Start();
	include('db.php');
	$userid = $_SESSION['id'];
	$sql = "select pr.*, p.*, e.first_name as emp_fName, e.last_name as emp_lName from prescription pr inner join patients p on pr.pat_id=p.patient_id inner join employee e on pr.doc_id=e.emp_id where pat_id='". $userid ."'";
	$conn = getConnection();
	$result = mysqli_query($conn,$sql);
?>	

<!DOCTYPE html>
<html>
<head>
	<title>show Prescription</title>
	<link rel="stylesheet" type="text/css" href="showprescription.css">
</head>
<body>

	<form action="" method="POST">
		<table border="3" align="center">
		   
			<tr align="center">
				<td colspan="2"><b>PRESCRIPTION</b></td>
			</tr>
    <?php
    if(mysqli_num_rows($result)>=1){
        while($row = mysqli_fetch_assoc($result)){  ?>
			
			<tr>
				<td>Date</td>
                <td> <?= $row['prescrip_date'] ?></td>
			</tr>			
			<tr>
				<td>Hospital Name</td>
				<td>Squre Hospital</td>
			</tr>
			<tr>
				<td>Doctor Name</td>
				<td><?= $row['emp_fName'] ." ". $row['emp_lName'] ?></td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
						
			<tr>
				<td>Patient ID</td>
				<td><?=$row['pat_id']?></td>
			</tr>
			<tr>
				<td>Patient Name</td>
				<td><?= $row['first_name'] ." ". $row['last_name'] ?></td>
			</tr>
						
		    <tr>
				<td>Age</td>
				<td><?= $row['age'] ?></td>
			</tr>
			<tr>
				<td>Disease</td>
				<td><?= $row['disease'] ?></td>
			</tr>
			
			<tr>
				<td>Test</td>
			<td><?= $row['tests'] ?></td>
			</tr>
			<tr>
				<td>Medicine</td>
				<td><?= $row['medicine'] ?></td>
			</tr>
            <tr>
                <td>Comment</td>
                <td> <i><?= $row['comment'] ?></i></td>
            </tr>
			
			<tr>
			    <td colspan="2">
				<a href="patienthome.php">Home</a>
			    </td>
			</tr>
	<?php   } }else{ ?>
            <tr>
                <td>You Don't Have Any Prescription</td>
            </tr>
    <?php    }	?>
		
        </table>
    </form>		
</body>
</html>