<?php
    session_start();
    error_reporting(0);
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
    $status="";

    if($_REQUEST['flag'] == "done"){
        $status = "Prescription Is Created";
        echo "<script>alert('Prescription Is Created')</script>";
    }else if($_REQUEST['flag'] == "fail"){
        $status = "Error In SQL";
        echo "<script>alert('Error In SQL')</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Prescription</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doctor/createPrescription.css">
	<script type="text/javascript" src="../assets/js/doctor/createPrescription.js"></script>
</head>
<body>

    <div class="container" id="center">
        <div id="back">

            <form method="POST" class="form-horizontal gap" action="php/createPresCheck.php">
                <div class="form-group">
                    <h3>    Apollo Hospital Ltd</h3>
                    <p>Email: apollo@email.com</p>
                    <p>Hotline: 5421384666</p>
                </div>
                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label for="did" class="col-sm-1">ID</label>
                        <div class="col-sm-1 inputBack">
                            <input type="text" name="did" id="did" class="form-control" value="<?=$docid?>"  readonly>
                        </div>
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1">Doctor Name</label>
                        <h4><?=$name?></h4>
                        <span id="docname"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="demail" class="col-sm-1">Email</label>
                    <label class="col-sm-3"><i><?=$row2['email']?></i></label>
                    <label for="dcontact" class="col-sm-1">Contact</label>
                    <label class="col-sm-3"><i><?=$row2['contact_no']?></i></label>
                    <span id="doccontact"></span>
                </div>

                <div class="form-group">
                    <label for="date"  class="col-sm-1">Date</label>
                    <input type="date" name="date" class="col-sm-2" value="" id="date">
                    <span id="pdate"></span>
                </div> <hr>

                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label for="selPatient" class="col-sm-2">Select Patient</label>
                        <div class="col-sm-3">
                            <select name="patientid" id="selPatient" class="form-control">
                                <!--                            <option value=""></option>-->
                                <?php  if(mysqli_num_rows($result)>=1){
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?= $row['patient_id'] ?>"> <?= $row['first_name']." ".$row['last_name'] ?> </option>
                                    <?php    }
                                } ?>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label for="disease" class="col-sm-2">Diseases</label>
                        <div class="col-sm-8">
                            <input type="text" name="disease" class="form-control" value="" id="disease">
                        </div>
                        <span id="patdisease"></span>
                    </div>
                </div>

                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label for="medicine" class="col-sm-2">Recommended Medicine</label>
                        <div class="col-sm-8">
                            <input type="text" name="medicine" class="form-control" value="" id="medicine">
                        </div>
                        <span id="patmedicine"></span>
                    </div>
                </div>

                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label for="test" class="col-sm-2">Tests</label>
                        <div class="col-sm-8">
                            <input type="text" name="test" class="form-control" value="" id="test">
                        </div>
                        <span id="pattest"></span>
                    </div>
                </div>

                <div class="form-horizontal gap">
                    <div class="form-group">
                        <label for="comment" class="col-sm-2">Comment</label>
                        <div class="col-sm-8">
                            <textarea  name="comment" rows="2" class="form-control" id="comment"></textarea>
                        </div>
                        <span id="pcomment"></span>
                    </div>
                </div>

                <input type="submit" name="submit" value="CREATE" class="btn btn-success" onclick="return validate()">
                <a href="doctorHome.php" class="btn btn-danger">HOME</a>
                <span><?= $status ?></span>
            </form>
        </div>
    </div>
</body>
</html>