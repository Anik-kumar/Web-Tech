<?php
    require_once"db.php";
    session_start();
    if($_SESSION['usertype'] == "Admin")
    {
        $conn = getConnection();
        $query = "SELECT r. *, rt. * FROM room r LEFT JOIN room_type rt on r.type_id = rt.type_id";
        $result = mysqli_query($conn,$query);
    }

?>


<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Show Rooms</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/showRooms.css">
</head>
<body>

    <div class="container" id="center" id="top">
        <div id="back">-->
<h1 class="gap">Rooms</h1>
<table class="table table-responsive">
    <tr id="header">
        <td>Room Type</td>
        <td>Cost</td>
        <td>Location</td>
        <td>Capacity</td>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["type"]; ?></td>
            <td><?php echo $row["cost"];?></td>
            <td><?php echo $row["location"];?></td>
            <td><?php echo $row["max_capacity"];?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="4" align="right">
            <a href="admin.php" class="btn btn-danger">Home</a>
        </td>
    </tr>
</table>


       <!-- </div>
    </div>


    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>
</body>
</html>-->