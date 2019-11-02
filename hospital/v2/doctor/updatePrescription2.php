<?php
	error_reporting(0);
	session_start();
	include('db.php');
	$userid = $_SESSION['uid'];
	
	if(isset($_POST['search'])){
		$pid = $_POST['patient'] ;
		$sql = "select *, e.first_name as emp_fName,e.last_name as emp_lName, e.contact_no as emp_contact from prescription pr inner join patients p on pr.pat_id=p.patient_id inner join employee e on pr.doc_id=e.emp_id WHERE pat_id LIKE '".$pid."'";
		$conn = getConnection();
		$result = mysqli_query($conn, $sql);
		$data = mysqli_num_rows($result);
		if($data > 0){
			while ($row = mysqli_fetch_array($result))
			{
				$dname = $row['emp_fName']." ".$row['emp_fName'];
				$did = $row['doc_id'];
				$dcontact = $row['emp_contact'];
				$date = $row['prescrip_date'];
				$pname = $row['first_name']." ".$row['last_name'];
				$pid = $row['patient_id'];
				$age = $row['age'];
				$disease = $row['disease'];
				$medicine = $row['medicine'];
				$test = $row['tests'];
				$comment = $row['comment'];
			} 
		}
		else{
			echo "There was no such result" ;
		}
		
       
	}	
?>

<!DOCTYPE html>
<html>
<head>

	<title>View Prescription</title>
	<link rel="stylesheet" type="text/css" href="css/viewPrescription.css">
</head>
<body>
	<form method="post" action=" ">
	<div class="ot" align="center">
	<input type="text" name="patient" placeholder="PatientID To Search">
	<input type="submit" name="search" value="View Prescription">
	</div>
	</br>
	
	

	<table border="1" align="center" cellpadding="3">				
		<tr>
			<td>Doctors Name:</td>
			<td>
				<?php echo $dname; ?>
			</td>
		</tr>
		<tr>
			<td>Doctors ID:</td>
			<td>
				<?php echo $did; ?>
			</td>
		</tr>
		<tr>
			<td>Doctors Contact:</td>
			<td>
				<?php echo $dcontact; ?>
			</td>
		</tr>
		<tr>
			<td>Date:</td>
			<td><?php echo $date; ?>
		</tr>
		<tr>
			<td colspan="2"><hr></td>
		</tr>
		<tr>
			<td>Patient Name:</td>
			<td>
				<?php echo $pname; ?>
			</td>
		</tr>
		<tr>
			<td>Patient ID:</td>
			<td>
				<?php echo $pid; ?>
			</td>
		</tr>
	
		<tr>
			<td>Age:</td>
			<td>
				<?php echo $age; ?>
			</td>
		</tr>
		<tr>
			<td>Disease:</td>
			<td>
				<?php echo $disease; ?>
			</td>
		</tr>
		<tr>
			<td>Medicine:</td>
			<td>
				<?php echo $medicine; ?>
			</td>
		</tr>
		<tr>
			<td>Tests:</td>
			<td >
				<?php echo $test; ?>
			</td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td >
				<?php echo $comment; ?>
			</td>
		</tr>
				
		<tr>
			<td  align="left">
				<a href="createPrescription.php">Create Prescription</a>
			</td>
			
			<td  align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
		</tr>
		
	</table>
	
	</form>
	
</body>
</html>