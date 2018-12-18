<?php
	session_start();
	include('db.php');
	$userid = $_SESSION['id'];
	$conn = getConnection();

	if(isset($_REQUEST['submit'])){
	    $searchStr = $_REQUEST['searchtext'];
        $query = "SELECT * FROM prescription pr inner join patients p on pr.pat_id=p.patient_id inner join employee e on pr.doc_id=e.emp_id WHERE pat_id LIKE '".$searchStr."' OR first_name LIKE '".$searchStr."' OR last_name LIKE '".$searchStr."' OR email LIKE '".$searchStr."' " ;
        $result2= mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result2);
    }
?>

<!DOCTYPE html>
<html>
<head>

	<title>Update Prescription</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="searchtext">
        <input type="submit" name="submit">
    </form>

	<form method="post"  action="php/updatePresCheck.php">
	<div >
	<input type="text" name="patient" placeholder="PatientID To Search">
	<input type="submit" name="search" value="Search">
	</div>
	</br>
	<fieldset>
		<legend> Update Prescription</legend>

	<table border="0">
		<tr>
			<td>Patient ID</td>
			<td>
				<input type="text" name="pid" value="<?= $row['patient_id'] ?>">
			</td>
		</tr>
	
		
		<tr>
			<td>Doctors Contact</td>
			<td>
				<input type="" name="dcontact" value="<?php echo $row['contact_no']; ?>">
			</td>
		</tr>
		<tr>
			<td>Date</td>
			<td><input type="date" name="date" value="<?php echo $row['prescrip_date']; ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><hr></td>
		</tr>
		
		<tr>
			<td>Patient Age</td>
			<td>
				<input type="text" name="page" value="<?php echo $row['age']; ?>">
			</td>
		</tr>
		<tr>
			<td>Disease</td>
			<td>
				<input type="text" name="disease" value="<?php echo $row['disease']; ?>">
			</td>
		</tr>
		<tr>
			<td>Medicine</td>
			<td>
				<input type="text" name="medicine" value="<?php echo $row['medicine']; ?>">
			</td>
		</tr>
		<tr>
			<td>Tests</td>
			<td >
				<input type="text" name="test" value="<?php echo $row['tests']; ?>">
			</td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td >
				<textarea  name="comment" cols="23" rows="3" value="<?php echo $row['comment']; ?>"></textarea>
			</td>
		</tr>
				
		<tr>
			<td align="left">
				<input type="submit" name="submit" value="update">
			</td>
		
			<td align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
		</tr>
		
	</table>
	</fieldset>
	</form>
	
</body>
</html>