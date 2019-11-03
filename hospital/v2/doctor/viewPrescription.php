<?php
	error_reporting(0);
	session_start();
	include('db.php');

	$prescri_id = $_REQUEST['id'];
    $sql = "select pr.*, p.first_name, p.last_name, p.age, p.email, p.gender, p.contact_no, e.email as emp_email, e.first_name as emp_fName,e.last_name as emp_lName, e.contact_no as emp_contact from prescription pr inner join patients p on pr.pat_id=p.patient_id inner join employee e on pr.doc_id=e.emp_id WHERE prescrip_id='".$prescri_id."'";
    $conn = getConnection();
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $age = $row['age'];
    $disease = $row['disease'];
    $medicine = $row['medicine'];
    $test = $row['tests'];
    $comment = $row['comment'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>View Prescription</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/viewPrescription.css">
</head>
<body>

    <div class="container" id="center">
        <div id="back">
            <div class="col-md-11">
                <h4>Apollo Hospital Ltd</h4>
                <p>Email: apollo@email.com</p>
                <p>Contact: 014653212546</p>
                <hr>
            </div>
            <div class="alignLeft col-md-11">
                <p>Doctor ID: <?= $row['doc_id']; ?></p>
            </div>
            <div class="alignLeft col-lg-12">
                <label>Name: <?= $row['emp_fName']." ".$row['emp_fName']; ?> </label>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Email: <?= $row['emp_email'] ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Date: <?= $row['prescrip_date']; ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Contact: <?= $row['emp_contact']; ?> </p>
                <hr>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Patient ID: <?= $row['pat_id']; ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <label>Patient Name: <?= $row['first_name']." ".$row['last_name']; ?> </label>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Patient Email: <?= $row['email']; ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Patient Age: <?= $row['age']; ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Patient Gender: <?= $row['gender']; ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <p>Patient Contact: <?= $row['contact_no']; ?> </p>
            </div>
            <div class="alignLeft col-lg-12">
                <label>Disease:</label> <?= $row['disease']; ?>
            </div>
            <div class="alignLeft col-lg-12">
                <label>Tests:</label> <?= $row['tests']; ?>
            </div>
            <div class="alignLeft col-lg-12">
                <label>Medicine:</label> <?= $row['medicine']; ?>
            </div>
            <div class="alignLeft col-lg-12">
                <label>Comment:</label> <?= $row['comment']; ?>
            </div>
            <div>
                <a href="createPrescription.php" class="btn btn-success">Create Prescription</a>
                <a href="updatePrescription.php?id=<?=$row['prescrip_id']?>" class="btn btn-primary">Update Prescription</a>
                <a href="showAllPrescription.php" class="btn btn-warning">BACK</a>
                <a href="doctorHome.php" class="btn btn-danger">HOME</a>
            </div>
        </div>
    </div>

	
</body>
</html>