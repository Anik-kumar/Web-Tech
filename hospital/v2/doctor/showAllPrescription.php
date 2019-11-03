<?php
    session_start();
    require_once "db.php";
    if($_SESSION['usertype']=="Doctor"){
        $conn = getConnection();
        $id = $_SESSION['id'];
        $name = $_SESSION['full_name'];
        $sql = "select p.*, e.first_name as emp_fName, e.last_name as emp_lName, pa.first_name, pa.last_name from prescription p inner join employee e on p.doc_id=e.emp_id inner join patients pa on p.pat_id=pa.patient_id where doc_id=".$id;
        $result = mysqli_query($conn, $sql);
    }else{

    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Prescriptions</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/showAllPrescribe.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3>All Prescription List &nbsp; (<?=$name?>)</h3>
            <table class="table table-responsive">
                <tr id="header">
                    <td>Prescription ID</td>
                    <td>Patient ID</td>
                    <td>Patient Name</td>
                    <td>Date</td>
                    <td>Disease</td>
                    <td></td>
                </tr>
                <?php if(mysqli_num_rows($result)>=1){
                    while ($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?= $row['prescrip_id'] ?></td>
                            <td><?= $row['pat_id'] ?></td>
                            <td><?= $row['first_name']." ".$row['last_name'] ?></td>
                            <td><?= $row['prescrip_date'] ?></td>
                            <td><?= $row['disease'] ?></td>
                            <td><a href="viewPrescription.php?id=<?=$row['prescrip_id']?>" class="btn btn-default">Details</a></td>
                        </tr>
                <?php    }
                }else{ ?>
                    <tr>
                        <td><strong><i> You Didn't Prescribe Any Patient </i></strong></td>
                    </tr>
            <?php    } ?>
            </table>
            <hr>
            <a href="doctorHome.php" class="btn btn-danger">HOME</a>
        </div>
    </div>
</body>
</html>
