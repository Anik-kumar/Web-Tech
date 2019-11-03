<?php
	session_start();
	error_reporting(0);
	include('db.php');
	$conn = getConnection();
    $presId = $_REQUEST['id'];
    $query = "SELECT * FROM prescription WHERE prescrip_id=".$presId ;
    $result= mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if(isset($_REQUEST['submit'])){
        $date = $_REQUEST['date'];
        $disease = $_REQUEST['disease'];
        $test = $_REQUEST['test'];
        $medicine = $_REQUEST['medicine'];
        $comment = $_REQUEST['comment'];

        if(empty($date) || empty($disease) || empty($test) || empty($medicine) || empty($comment)){
            echo "<script>alert('Fill Up The Form Correctly')</script>";
        }else{
            header("Location: php/updatePresCheck.php?id=$presId&date=$date&dis=$disease&test=$test&med=$medicine&com=$comment");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Update Prescription</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/updatePrescription.css">

</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <form method="post" class="form-horizontal gap" action="">
                <h3>Update Prescription</h3>
                <div class="form-group">
                    <label for="date" class="col-md-1">Date (mm-dd-yyyy)</label>
                    <div class="col-lg-6">
                        <input type="date" id="date" name="date" class="form-control" value="<?= $row['prescrip_date']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="disease" class="col-lg-1">Disease</label>
                    <div class="col-lg-6">
                        <input type="text" name="disease" id="disease" class="form-control" value="<?= $row['disease']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="medicine" class="col-lg-1">Medicine</label>
                    <div class="col-lg-6">
                        <input type="text" name="medicine" id="medicine" class="form-control" value="<?= $row['medicine']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="test" class="col-lg-1">Tests</label>
                    <div class="col-lg-6">
                        <input type="text" id="test" name="test" class="form-control" value="<?= $row['tests']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="col-lg-1">Comment</label>
                    <div class="col-lg-6">
                        <textarea  name="comment" id="comment" class="form-control" rows="2"><?= $row['comment']; ?></textarea>
                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" class="btn btn-success" value="UPDATE">
                    <a href="viewPrescription.php?id=<?=$presId?>" class="btn btn-primary">BACK</a>
                    <a href="doctorHome.php" class="btn btn-danger">HOME</a>
                </div>
            </form>
        </div>
    </div>


	
</body>
</html>