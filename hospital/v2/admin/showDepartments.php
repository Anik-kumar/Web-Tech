<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once "db.php";

if($_SESSION['usertype'] == "Admin")
{
    $conn = getConnection();
    $query = "SELECT * FROM department";
    $result = mysqli_query($conn, $query);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show Departments</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showDept.css">
</head>
<body>
    <div class="container" id="center">
        <div id="back">
            <h3 class="gap">Departments</h3>
            <table class="table table-responsive table-bordered">
                <tr id="header">
                    <td>Department ID</td>
                    <td>Department Name</td>
                    <td>Department Description</td>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['dept_id']; ?></td>
                        <td><?php echo $row['dept_name']; ?></td>
                        <td><?php echo $row['dept_description']; ?></td>
                    </tr>
                <?php }?>
            </table>
            <a href="admin.php" class="btn btn-primary">Home</a>
        </div>
    </div>

	<a href="admin.php">Home</a>

</body>
</html>