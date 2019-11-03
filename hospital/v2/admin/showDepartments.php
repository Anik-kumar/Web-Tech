<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once "db.php";

    if($_SESSION['usertype'] == "Admin" || $_SESSION['usertype']=="Doctor")
    {
        $conn = getConnection();
        $query = "SELECT * FROM department";
        $result = mysqli_query($conn, $query);
    }else{
        header('location: ../login.php');
    }

?>



<div id="upperDiv_dept">

    <div class="float-left">
        <h2 class="blue-backgnd">Departments </h2>

    </div>
    <div class="float-right">
        <a class="ui compact labeled icon button" href="router.php?flag=true&code=addDept">
            <i class="plus icon"></i> Add Department
        </a>

        <?php if ($_SESSION['usertype']=="Admin"){ ?>
            <a href="admin.php" class="compact ui button">Home</a>
        <?php }else{ ?>
            <a href="../doctor/doctorHome.php" class="ui button">Home</a>
        <?php } ?>

    </div>
</div>

<div id="mainDiv_dept">

    <table class="table" style="background-color: #FEFEFE">
        <tr id="header">
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Department Description</th>
            <th>Options</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['dept_id']; ?></td>
                <td><?php echo $row['dept_name']; ?></td>
                <td class="dept-desc"><?php echo $row['dept_description']; ?></td>
                <td class="dept-opt">
                    <a class="ui compact labeled icon button" href="router.php?flag=true&code=editDept&id=<?= $row['dept_id']; ?>">
                        <i class="edit icon"></i>Edit
                    </a>
                    <button class="ui compact labeled icon button">
                        <i class="trash alternate outline icon"></i>Delete
                    </button>
                </td>
            </tr>
        <?php }?>
    </table>

</div>