<?php
/**
 * Created by PhpStorm.
 * User: ANiK
 * Date: 04-Jul-19
 * Time: 1:19 AM
 */
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require_once "db.php";

if($_SESSION['usertype'] == "Admin"){
    $id = $_REQUEST['id'];
    $conn = getConnection();
    $query = "SELECT * FROM department WHERE dept_id=".$id;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

//    echo $row['dept_name']." => ".$row['dept_description'];
    if(isset($_REQUEST['submit'])){
        $depName = mysqli_real_escape_string($conn, $_REQUEST['depName']);
        $depDes = mysqli_real_escape_string($conn, $_REQUEST['description']);
        $query2 = "SELECT * FROM department";
        $result2 = mysqli_query($conn, $query2);
        while($row2 = mysqli_fetch_assoc($result2)){
            if($row2['dept_name'] == $depName){
                $flag = true;
            }else{
                $flag = false;
            }
        }


        $query3 = "UPDATE department SET dept_name='".$depName."', dept_description='".$depDes."' WHERE dept_id=".$id;



        if($flag){
            echo "<script>alert('Department Already Exists. Try Another Department Name')</script>";
        }elseif(mysqli_query($conn, $query3) && $flag == false){
            echo "<script>alert('D')</script>";
//          -----------------  alternative to header
            echo '<script type="text/javascript">';
            echo 'window.location.href="admin.php?f1=department&f2=show";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=admin.php?f1=department&f2=show" />';
            echo '</noscript>';
//          -----------------
        }else{
            echo "<script>alert('Department Update Failed')</script>";
//            echo $query3;
//            echo mysqli_error($conn);
        }

    }

}else{
    header('location: ../login.php');
}




?>

<div class="upperDiv_dept">
    <div class="float-left">
        <h2 class="blue-backgnd">Update Department</h2>
    </div>
    <div class="float-right">

        <?php if ($_SESSION['usertype']=="Admin"){ ?>
            <a href="admin.php" class="compact ui button">Home</a>
        <?php }else{ ?>
            <a href="../doctor/doctorHome.php" class="ui button">Home</a>
        <?php } ?>

    </div>
</div>

<form action="" method="post">
    <div id="addDept">

        <div class="form-horizontal" id="horizontal">
            <div class="form-group row">
                <label for="deptname" class="col-md-2">Department Name</label>
                <div class="col-md-8">
                    <input type="text" name="depName" id="deptname" class="form-control" value="<?= $row['dept_name']?>" onblur="addDeptValid()">
                </div>
            </div>
        </div>

        <div  class="form-horizontal" id="horizontal">
            <div class="form-group row">
                <label for="description" class="col-md-2">Description</label>
                <div class="col-md-8">
                    <textarea name="description" id="description" class="form-control" rows="4" maxlength="500" onblur="addDeptValid()"><?= $row['dept_description'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="txt-a-left padding-left-7">
            <input type="submit" name="submit" id="" value="Save" class="btn btn-success" onclick="addDeptValid()">
            <a href="admin.php" class="btn btn-danger">Home</a>
        </div>

    </div>
</form>


