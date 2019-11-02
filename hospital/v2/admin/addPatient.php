<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once 'db.php';
	session_start();
    if(isset($_SESSION['id'])){
        $conn = getConnection();
        $patientAppId = $_REQUEST['patientAppId'];
        $patientId = $_REQUEST['patientId'];
        $deptId = $_REQUEST['dept'];
        $roomNo;

        $query = "SELECT AP.*, P.*, D.dept_id, D.dept_name, E.emp_id, E.first_name as emp_fName, E.last_name as emp_lName FROM patient_application AP LEFT JOIN patients P ON AP.patient_id=P.patient_id INNER JOIN department D ON D.dept_name=AP.department INNER JOIN employee E ON E.dep_id=D.dept_id";

        $result = getResults($query);
        $row = mysqli_fetch_assoc($result);
        $adminErr="";
        $releaseErr="";

        if(isset($_REQUEST['submit'])){
            $id = $_REQUEST['patId'];
            $appId = $_REQUEST['patAppId'];
            $deptId = $_REQUEST['deptId'];
            $empId = $_REQUEST['doctorId'];
            $roomId = $_REQUEST['roomId'];
            $admitDate = $_REQUEST['admitDate'];
            $releaseDate = $_REQUEST['releaseDate'];
            $query2 = "SELECT location FROM room WHERE room_id=".$roomId;
            $result2 = getResults($query2);
            $roomNo = mysqli_fetch_assoc($result2);

            if($admitDate!=null || $releaseDate!=null){
                $query3 = "INSERT INTO patient_admitted VALUES( 0, '".$appId."', '".$deptId."', '".$empId."', '".$id."','".$roomId."', '".$admitDate."','".$releaseDate."','".$roomNo['location']."')";

                if(mysqli_query($conn, $query3)){
//				echo "Patient is admitted. <br>";
                    header('location: showPatientApplication.php');
                }else{
                    echo " <script type='text/javascript'> alert('Patient is already admitted') </script>";
                }
            }else{
                echo " <script type='text/javascript'> alert('Select Dates') </script>";
            }
        }
    }else{
        header('location: ../login.php');
    }


 ?>
 <style>
 	#a{
 		display: inline;
 	}
 </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Room Type</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/addroomtype.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validateForms.js"></script>
</head>
<body>

<form action="" method="post">
	<div id="a">
		<div>
			<div>Patient Application Id</div>
			<div> <input type="text" name="patAppId" id="" value="<?= $row['patient_app_id'] ?>" readonly> </div>
		</div>
		<div>
			<div>Patient Id</div>
			<div> <input type="text" name="patId" id="" value="<?= $row['patient_id'] ?>" readonly> </div>
		</div>
		<div>
			<div>Patient Name</div>
			<div> 
				<input type="text" name="patName" id="" value="<?= $row['first_name'] . " " . $row['last_name'] ?>" readonly>
			 </div>
		</div>
		<div>
			<div>Patient Email</div>
			<div>  
				<input type="text" name="patEmail" id="" value="<?= $row['email'] ?>" readonly>
			</div>
		</div>
		<div>
			<div>Department Id</div>
			<div>  <input type="text" name="deptId" id="" value="<?= $row['dept_id'] ?>" readonly> </div>
		</div>
		<div>
			<div>Department Name</div>
			<div>  <input type="text" name="deptName" id="" value="<?= $row['dept_name'] ?>" readonly> </div>
		</div>
		<div>
			<div>Doctor</div>
					<select name="doctorId" id="doctorid">
						<option value="<?= $row['emp_id']?>"> <?= $row['emp_fName'].' '.$row['emp_lName']?> </option>
			<?php	while ($row = mysqli_fetch_assoc($result)) {	 ?>
						<option value="<?= $row['emp_id'] ?>"> <?= $row['emp_fName'] . ' ' .$row['emp_lName']; ?> </option>
			<?php print_r($row);	} ?>
					</select>
		</div>
		<div>
			<div>Room No</div>
			<div>
				<?php $queryRoom = "SELECT * FROM room";
					$resultRoom = getResults($queryRoom);
					 ?>
					<select name="roomId" id="roomid">
						<?php while ($row3 = mysqli_fetch_assoc($resultRoom)) { ?>
							<option value=" <?= $row3['room_id'] ?>"> <?= $row3['location'] ?> </option>
					<?php	} ?>
					</select>
			</div>
		</div>
		<div>
			<div>Admission Date</div>
			<div> <input type="Date" name="admitDate" id="admitDate"> <span id="admitErr"></span> </div>
		</div>
		<div>
			<div>Release Date</div>
			<div> <input type="Date" name="releaseDate" id="releaseDate"> <span id="releaseErr"></span> </div>
		</div>
		<div>
			<input type="submit" name="submit" id="submitBtn">
            <a href="showPatientApplication.php">Back</a>
		</div>
	</div>
</form>
</body>
</html>
 