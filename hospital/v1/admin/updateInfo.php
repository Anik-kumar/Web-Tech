<?php 
    require_once"db.php";
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    $result;

    if($_SESSION['usertype']=="Admin")
    {
        if(isset($_POST['searchBtn']))
        {
            $conn = getConnection();
            $searchText= mysqli_real_escape_string($conn, trim($_POST['searchText']));
            $query = "SELECT * FROM all_users2 WHERE user_id LIKE '%".$searchText."%' OR uemp_id LIKE '%".$searchText."%' OR upatient_id LIKE '%".$searchText."%' OR user_first_name LIKE '%".$searchText."%' OR user_last_name LIKE '%".$searchText."%' OR user_email LIKE '%".$searchText."%' OR user_type LIKE '%".$searchText."%'";
            
            if(!($result = mysqli_query($conn, $query))){
                echo "<script type='text/javascript'> alert('Result Not Found')</script>";
            }
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User Info</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/updateUserInfo.css">
    <script rel="stylesheet" type="text/javascript" src="vendors/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="resources/js/validateForms.js"></script>
</head>
<body>
    <div class="container"  id="top">
        <div id="back">
            <form action="" method="post" class="form-inline form-group">
                <input type="text" name="searchText" placeholder="Search Name,ID Or Email" id="searchText" class="form-control">
                <input type="submit" name="searchBtn" value="Search" class="btn btn-warning">
                <span id="searchErr"></span>
            </form>

            <div class="container-fluid" id="center">
                <h2 class="gap">Update User Profile</h2>
                <table class="table table-condensed">
                    <tr id="header">
                        <td>User ID</td>
                        <td>Employee ID</td>
                        <td>Patient ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>User Type</td>

                    </tr>
                    <?php
            if(isset($_REQUEST['searchBtn'])){
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td> <?= $row['user_id'] ?> </td>
                        <td> <?= $row['uemp_id'] ?> </td>
                        <td> <?= $row['upatient_id'] ?> </td>
                        <td> <?= $row['user_first_name'] ?> </td>
                        <td> <?= $row['user_last_name'] ?> </td>
                        <td> <?= $row['user_email'] ?> </td>
                        <td> <?= $row['user_type'] ?> </td>
                        <td> <a href="updateInfo2.php?userid=<?= $row['user_id'];?>&patid=<?= $row['upatient_id'];?>&empid=<?= $row['uemp_id'];?>&email=<?= $row['user_email']?>"  class="btn btn-primary">Update</a> </td>
                    </tr>

            <?php } } ?>
                    <tr>
                        <td colspan="8" align="right">
                            <a href="admin.php" class="btn btn-danger">Home</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>
</html>