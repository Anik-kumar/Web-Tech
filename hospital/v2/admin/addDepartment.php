<?php
error_reporting(E_ALL & ~E_NOTICE);
	require_once "db.php";
	session_start();
    if(isset($_SESSION['id'])){
        if(isset($_REQUEST['submit'])){
//            echo "<script type='text/javascript'> alert('Fill up Form')</script>";
            $conn = getConnection();
            $id="";
            $depName = mysqli_real_escape_string($conn, $_REQUEST['depName']);
            $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
            // echo $depName . $description;

            if(empty($depName) || empty($description)){
                echo "<script type='text/javascript'> alert('Fill up Form')</script>";
            }else{
                $query = "INSERT INTO department VALUES ('".$id."', '".$depName."', '".$description."')";
                if(mysqli_query($conn, $query)){
                    echo "<script type='text/javascript'> alert('Department Added Successfully')</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Department Already Exists')</script>";
                }
            }


        }
    }else{
        header('location: ../login.php');
    }

?>




<div class="col-xs-12 col-sm-12 col-md-offset-1 col-lg-offset-2 col-xl-12">
    <div id="upperDiv_dept">

        <div class="float-left">
            <h2 class="blue-backgnd">Add New Department </h2>
        </div>
        <div class="float-right">

        </div>
    </div>


    <form action="" method="post">
        <div id="addDept">

            <div class="form-horizontal" id="horizontal">
                <div class="form-group row">
                    <label for="deptname" class="col-md-2">Department Name</label>
                    <div class="col-md-8">
                        <input type="text" name="depName" id="deptname" class="form-control" onblur="addDeptValid()">
                    </div>
                </div>
            </div>

            <div  class="form-horizontal" id="horizontal">
                <div class="form-group row">
                    <label for="description" class="col-md-2">Description</label>
                    <div class="col-md-8">
                        <textarea name="description" id="description" class="form-control" rows="3" onblur="addDeptValid()"></textarea>
                    </div>
                </div>
            </div>
            <div class="txt-a-left padding-left-7">
                <input type="submit" name="submit" id="" value="ADD" class="ui button" onclick="addDeptValid()">
                <a href="admin.php?f1=department&f2=show" class="ui button">BACK</a>
                <?php if ($_SESSION['usertype']=="Admin"){ ?>
                    <a href="admin.php" class="ui button">HOME</a>
                <?php }else{ ?>
                    <a href="../doctor/doctorHome.php" class="ui button">Home</a>
                <?php } ?>
            </div>

        </div>
    </form>
</div>


