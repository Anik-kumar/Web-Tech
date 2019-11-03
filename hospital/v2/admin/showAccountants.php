<?php
/**
 * Created by PhpStorm.
 * User: ANiK
 * Date: 21-Aug-19
 * Time: 10:21 PM
 */

require_once "db.php";

if($_SESSION['usertype'] == "Admin") {
    $id = $_REQUEST['id'];
    $conn = getConnection();
    $query = "SELECT emp.*, dept.dept_name FROM department dept LEFT JOIN employee emp ON dept.dept_id=emp.dep_id WHERE user_type='Accountant'";
    $result = mysqli_query($conn, $query);


}else{
    header("location: ../login.php");
}


?>

<div id="upperDiv-showAdmin">

    <h2 class="blue-backgnd">Accountants</h2>

</div>

<div id="mainDiv-showAdmin">
    <table class="table table-condensed table-striped" id="showAdmins-table" style="background-color: #FEFEFE">
        <tr id="header">
            <th>Employee ID</th>
            <th>Department</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Option</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['emp_id']; ?></td>
                <td><?= $row['dept_name']; ?></td>
                <td><?= $row['first_name']." ".$row['last_name']; ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td>
                    <a class="ui compact labeled icon button" href="router.php?flag=true&code=viewEmpProfile&id=<?= $row['emp_id']; ?>">
                        <i class="edit icon"></i>View
                    </a>
                    <a class="ui compact labeled icon button" href="router.php?flag=true&code=updateEmpInfo&id=<?= $row['emp_id']; ?>">
                        <i class="edit icon"></i>Update
                    </a>
                    <a class="ui compact labeled icon button" id="deleteBtn">
                        <i class="edit icon"></i>Delete
                    </a>
                </td>

            </tr>
        <?php }?>
    </table>

</div>

<script type="text/javascript">
    $("#deleteBtn").click(function (e) {
        if(window.confirm("Are You Sure?")){
            e.preventDefault();
            window.location.href("deleteEmpValidation.php?empId=<?= $row['emp_id']; ?>&user=emp&page=showAccountants");
        }
    });
</script>
