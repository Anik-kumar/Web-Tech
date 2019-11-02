<?php
    session_start();
    require_once "db.php";
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $docid = $_SESSION['id'];
    $name = $firstName." ".$lastName;
    $sql = "select * from patients";
    $sql2 = "select * from employee where emp_id='".$docid."'";
    $conn = getConnection();
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html>
<head>

	<title>Create Prescription</title>
	<script type="text/javascript" src="script/createPrescription.js"></script>
	<link rel="stylesheet" type="text/css" href="css/createPrescription.css">
</head>
<body>
	<form method="POST" action="php/createPresCheck.php">
	<fieldset>
		<legend></legend>

	<table border="0" cellpadding="2">
		<tr>
			<td>Hospital Name:</td>
			<td>
				<input type="text" name="hname" id="hname" value="Apollo Hospital Ltd" readonly>
				<span id="hospital"></span>
			</td>
		</tr>
		<tr>
			<td>Doctors Name:</td>
			<td>
				<input type="text" name="dname"  value="<?=$name?>" id="dname">
				<span id="docname"></span>
			</td>
		</tr>
		<tr>
			<td>Doctors ID:</td>
			<td>
				<input type="text" name="did"  value="<?=$docid?>" id="did">
				<span id="docid"></span>
			</td>
		</tr>
		<tr>
			<td>Doctors Contact:</td>
			<td>
				<input type="text" name="dcontact" value="<?=$row2['contact_no']?>" id="dcontact">
				<span id="doccontact"></span>
			</td>
		</tr>
		<tr>
			<td>Date:</td>
			<td><input type="date" name="date" value="" id="date"> <span id="pdate"></span></td>

		</tr>
		<tr>
			<td colspan="2"><hr></td>
		</tr>


                <select name="patientid" id="">
                    <option value=""></option>
            <?php  if(mysqli_num_rows($result)>=1){
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?= $row['patient_id'] ?>"> <?= $row['first_name']." ".$row['last_name'] ?> </option>
        <?php    }
            } ?>
                </select>

		<tr>
			<td>Diseases:</td>
			<td>
				<input type="text" name="disease" value="" id="disease">
				<span id="patdisease"></span>
			</td>
		</tr>
		<tr>
			<td>Recommended Medicine:</td>
			<td>
				<input type="text" name="medicine" value="" id="medicine">
				<span id="patmedicine"></span>
			</td>
		</tr>
		<tr>
			<td>Tests:</td>
			<td >
				<input type="text" name="test" value="" id="test">
				<span id="pattest"></span>
			</td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td >
				<textarea  name="comment" cols="23" rows="3" value="" id="comment"></textarea>
				<span id="pcomment"></span>
			</td>
		</tr>
		<tr>
			<td align="left">
				<input type="submit" name="submit" value="create" onclick="return validate()">
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