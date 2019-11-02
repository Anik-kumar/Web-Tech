<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>New Appointment</title>
	<script type="text/javascript" src="script/NewAppointment.js"></script>
	<link rel="stylesheet" type="text/css" href="css/NewAppointment.css">
</head>
<body>
	<form method="post" action="php/NewAppoinCheck.php">
	
		<legend></legend>
		<h3> Create Appointment Here</h3>
	
	<table align="center" cellpadding="5">
	
		<tr>
			<td>Doctors ID</td>
			<td>
				<input type="text" name="did" id="did">
				<span id="docid"></span>
			</td>
		</tr>
		<tr>
			<td>Doctors Name</td>
			<td>
				<input type="text" name="dname" id="dname">
				<span id="docname"></span>
			</td>
		</tr>
		<tr>
			<td>Patient ID</td>
			<td>
				<input type="text" name="pid" id="pid">
				<span id="patid"></span>
			</td>
		</tr>
		<tr>
			<td>Patient Name</td>
			<td>
				<input type="text" name="pname" id="pname">
				<span id="patname"></span>
			</td>
		</tr>
		<tr>
			<td>Date</td>
			<td>
				<input type="date" name="date" id="date">
				<span id="pdate"></span>
			</td>
		</tr>
		<tr>
			<td>Time</td>
			<td>
				<input type="time" name="time" id="time">
				<span id="ptime"></span>
			</td>
		</tr>
		
		<tr>
			<td align="left">
				<input type="submit" name="submit" value="Add Appointment" onclick="return validate()">
			</td>
		
			<td align="right">
				<a href="doctorHome.php">Go Home</a>
			</td>
		</tr>
	</table>
	
	</form>
	


</body>
</html>