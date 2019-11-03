<?php 
	require_once "db.php";
	session_start();

	if($_SESSION['usertype'] == "Admin"){

		$conn = getConnection();
		$query = "SELECT * FROM patients";
		$result = mysqli_query($conn, $query);


		if($_REQUEST['delStatus']=="done"){
		    echo "<script>alert('Patient Profile Deleted Successfully.')</script>";
        }elseif($_REQUEST['delStatus']=="notdone"){
            echo "<script>alert('Patient Profile Delete Unsuccessful.')</script>";
        }

	}

 ?>


<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showPatients.css">

</head>
<body>
<div class="container" id="center">
    <div id="back">
        <h3 class="gap">Patient List</h3>-->

<div id="upperDiv-showAdmin">

    <h2 class="blue-backgnd">Patients </h2>

</div>

<div class="mainDiv-showAdmin">
    <table class="table table-condensed table-striped" id="showAdmins-table" style="background-color: #FEFEFE">
        <tr id="header">
            <th>Patient ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Contact No</th>
            <th>Options</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td> <?php echo $row['patient_id']; ?> </td>
                <td> <?php echo $row['first_name'] ." ". $row['last_name']; ?> </td>
                <td> <?php echo $row['email']; ?> </td>
                <td> <?php echo $row['gender']; ?> </td>
                <td> <?php echo $row['contact_no']; ?> </td>
                <td>
                    <a class="ui compact labeled icon button" href="router.php?flag=true&code=viewPatProfile&id=<?= $row['patient_id']; ?>">
                        <i class="address book outline icon"></i>View
                    </a>
                    <a class="ui compact labeled icon button" href="router.php?flag=true&code=updatePatInfo&id=<?= $row['patient_id']; ?>">
                        <i class="edit icon"></i>Update
                    </a>
                    <a class="ui compact labeled icon button" id="deleteBtn">
                        <i class="trash alternate outline icon"></i>Delete
                    </a>
                </td>
            </tr>

        <?php	} ?>
        <tr>
            <td colspan="10" align="right">
                <a href="admin.php" class="btn btn-success">Go Home</a>
            </td>
        </tr>
    </table>
</div>


<script type="text/javascript">
    $("#deleteBtn").click(function (e) {
        if(window.confirm("Are You Sure?")){
            e.preventDefault();
            window.location.href("deleteEmpValidation.php?patId=<?= $row['patient_id']; ?>&user=patient");
        }
    });
</script>