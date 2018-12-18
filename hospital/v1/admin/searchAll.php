<?php require_once 'db.php';
	session_start();

    if(isset($_REQUEST['searchBtn'])){
        $conn = getConnection();
        $searchStr = mysqli_real_escape_string($conn, trim($_REQUEST['searchText']));

        if(empty($searchStr)==false){
            $query1 = "SELECT * FROM employee e INNER JOIN department d ON e.dep_id=d.dept_id WHERE emp_id LIKE '%".$searchStr."%' OR first_name LIKE '%".$searchStr."%' OR last_name LIKE '%".$searchStr."%' OR email LIKE '%".$searchStr."%'" ;
            $query2 = "SELECT * FROM patients WHERE patient_id LIKE '%".$searchStr."%' OR first_name LIKE '%".$searchStr."%' OR last_name LIKE '%".$searchStr."%' OR email LIKE '%".$searchStr."%'" ;
            $query3 = "SELECT * FROM department WHERE dept_id LIKE '%".$searchStr."%' OR dept_name LIKE '%".$searchStr."%' OR dept_description LIKE '".$searchStr."'" ;
            $query4 = "SELECT * FROM appointment WHERE appoint_id LIKE '%".$searchStr."%' OR is_checked LIKE '%".$searchStr."%'" ;
            $query5 = "SELECT * FROM prescription WHERE prescrip_id LIKE '%".$searchStr."%' OR prescrip_date LIKE '%".$searchStr."%' OR disease LIKE '%".$searchStr."%' OR tests LIKE '%".$searchStr."%' OR medicine LIKE '%".$searchStr."%' OR comment LIKE '%".$searchStr."%'" ;

            $result1 = getResults($query1); //emp
            $result2 = getResults($query2); //patient
            $result3 = getResults($query3); //department
            $result4 = getResults($query4); //appointment
            $result5 = getResults($query5); //prescription

        }else{
            echo "<script type='text/javascript'> alert('Invalid Search')</script>";
            header("location: admin.php");
        }
    }
	
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="resources/css/searchAll.css">
</head>
<body>
    <div class="container" id="center">
        <form action="" method="post" id="searchForm" class="form-inline">
            <input type="text" name="searchText" class="form-control" id="searchTest">
            <button type="submit" name="searchBtn" class="btn btn-warning">Search</button>
        </form>
        <div id="back">
                <?php if(mysqli_num_rows($result2)>=1){ ?>
            <h4 class="gap">Patient List</h4>
            <table class="table table-responsive table-condensed">
                <tr id="header">
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Date Of Birth</td>
                    <td>Age</td>
                    <td>Gender</td>
                    <td>User Type</td>
                    <td>Contact No</td>
                </tr>
                    <?php    while ($row = mysqli_fetch_assoc($result2)){ ?>
                <tr>
                    <td> <?php echo $row['patient_id']; ?> </td>
                    <td> <?php echo $row['first_name']; ?> </td>
                    <td> <?php echo $row['last_name']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td> <?php echo $row['date_of_birth']; ?> </td>
                    <td> <?php echo $row['age']; ?> </td>
                    <td> <?php echo $row['gender']; ?> </td>
                    <td> <?php echo $row['user_type']; ?> </td>
                    <td> <?php echo $row['contact_no']; ?> </td>
                </tr>
                    <?php   } } ?>
            </table>
            <br>

                <?php if(mysqli_num_rows($result1)>=1){ ?>
            <h4 class="gap">Employee List</h4>
            <table class="table table-responsive table-condensed">
                <tr id="header">
                    <td>Employee ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Department</td>
                    <td>Email</td>
                    <td>Date Of Birth</td>
                    <td>Age</td>
                    <td>Gender</td>
                    <td>User Type</td>
                    <td>Contact No</td>
                </tr>
                    <?php      while ($row2 = mysqli_fetch_assoc($result1)){ ?>
                <tr>
                  <td> <?php echo $row2['emp_id']; ?> </td>
                  <td> <?php echo $row2['first_name']; ?> </td>
                  <td> <?php echo $row2['last_name']; ?> </td>
                  <td> <?php echo $row2['dept_name']; ?> </td>
                  <td> <?php echo $row2['email']; ?> </td>
                  <td> <?php echo $row2['date_of_birth']; ?> </td>
                  <td> <?php echo $row2['age']; ?> </td>
                  <td> <?php echo $row2['gender']; ?> </td>
                  <td> <?php echo $row2['user_type']; ?> </td>
                  <td> <?php echo $row2['contact_no']; ?> </td>
                </tr>
                    <?php     }  } ?>
            </table>
            <br>
                <?php if(mysqli_num_rows($result3)>=1){ ?>
            <h4 class="gap">Departments</h4>
            <table class="table table-responsive table-condensed">
                <tr id="header">
                    <td>Department ID</td>
                    <td>Department Name</td>
                    <td>Department Description</td>
                </tr>
                    <?php    while ($row3 = mysqli_fetch_assoc($result3)){ ?>
                <tr>
                    <td><?= $row3['dept_id']; ?></td>
                    <td><?php echo $row3['dept_name']; ?></td>
                    <td><?php echo $row3['dept_description']; ?></td>
                </tr>
            <?php    }  } ?>
            </table>
            <br>

            <?php if(mysqli_num_rows($result4)>=1){ ?>
            <h4 class="gap">Appointments</h4>
            <table class="table table-responsive table-condensed">
                <tr id="header">
                    <td>Appointment ID</td>
                    <td>Employee ID</td>
                    <td>Patient ID</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Checked</td>
                </tr>
                <?php    while ($row4 = mysqli_fetch_assoc($result4)){ ?>
                    <tr>
                        <td><?= $row4['appoint_id']; ?></td>
                        <td><?= $row4['emp_id']; ?></td>
                        <td><?= $row4['patient_id']; ?></td>
                        <td><?= $row4['appoint_date']; ?></td>
                        <td><?php echo $row4['time']; ?></td>
                        <td><?php echo $row4['is_checked']; ?></td>
                    </tr>
                <?php    }  } ?>
            </table>
            <br>

            <?php if(mysqli_num_rows($result5)>=1){ ?>
            <h4 class="gap">Prescriptions</h4>
            <table class="table table-responsive table-condensed">
                <tr id="header">
                    <td>Prescription ID</td>
                    <td>Employee ID</td>
                    <td>Patient ID</td>
                    <td>Date</td>
                    <td>Disease</td>
                    <td>Tests</td>
                    <td>Medicine</td>
                    <td>Comment</td>
                </tr>
                <?php    while ($row5 = mysqli_fetch_assoc($result5)){ ?>
                    <tr>
                        <td><?= $row5['prescrip_id']; ?></td>
                        <td><?= $row5['doc_id']; ?></td>
                        <td><?= $row5['pat_id']; ?></td>
                        <td><?= $row5['prescrip_date']; ?></td>
                        <td><?php echo $row5['disease']; ?></td>
                        <td><?php echo $row5['tests']; ?></td>
                        <td><?php echo $row5['medicine']; ?></td>
                        <td><?php echo $row5['comment']; ?></td>
                    </tr>
                <?php    }  } ?>
            </table>
        </div>
        <a href="admin.php" class="btn btn-danger">Home</a>
    </div>


</body>
</html>
