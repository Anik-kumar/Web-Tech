<?php
    session_start();
    require_once "db.php";
    $sql = "select * from employee e inner join department d on e.dep_id=d.dept_id where user_type='Doctor'";
    $conn = getConnection();
    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>REQUEST APPOINTMENT</title>
    <link rel="stylesheet" type="text/css" href="../admin/vendors/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="reqAppointment.css">
    <script type="text/javascript" src="script/reAppoinment.js"></script>

</head>
<body>
    <div class="container">
        <form method="POST" action="php/reqcheck.php">

            <table border="5" align="center">
                <th colspan="2">REQUEST APPOINTMENT</th>
                <tr>
                    <td>Doctor Name</td>
                    <td>
                        <select name="doctorname" id="dname">
                            <option value=""></option>
                            <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                                <option value="<?=$row['emp_id']?>"> <?=$row['first_name']." ".$row['last_name']?> </option>
                            <?php    } ?>
                        </select>
                        <span id="doctorname"></span>
                    </td>
                </tr>
                <tr>
                    <td>Patient ID</td>
                    <td><input type="text" name="patientid" id=pid>
                        <span id="patientid"></span>
                    </td>
                </tr>
                <tr>
                    <td>Patient Name</td>
                    <td><input type="text" name="patientname" id=pname>
                        <span id="patientname"></span>
                    </td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date" ></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td><input type="time" name="time"></td>
                </tr>
                <tr>
                    <td align="left">
                        <input type="submit" name="submit" value="Submit" onclick="return validate()">
                    </td>
                    <td align="right">
                        <a href="patienthome.php">Home</a>
                    </td>

                </tr>

            </table>
        </form>
    </div>

</body>
</html>