<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update User</title>
	<script type="text/javascript" src="script/updateprofile.js"></script>
	<link rel="stylesheet" type="text/css" href="doctorinfo.css">
	
	
</head>
<body>
    <div>
        <table  border="5">
            <th colspan="6"><h1>DOCTOR INFO</h1></th>
            <tr>
                <td><h3>Doctor ID</h3></td>
                <td><h3>NAME</h3></td>
                <td><h3>DEPARTMENT</h3></td>
                <td><h3>EMAIL</h3></td>
                <td><h3>CONTACT</h3></td>

            </tr>

            <?php
            require_once "db.php";
            $con=getConnection();

            $query="select * from employee e inner join department d on e.dep_id=d.dept_id where user_type='Doctor'" ;
            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result)){

                echo"<tr>";
                echo"<td>".$row['emp_id']."</td>";
                echo"<td>".$row['first_name']. " " .$row['last_name']."</td>";
                echo"<td>".$row['dept_name']."</td>";
                echo"<td>".$row['email']."</td>";
                echo"<td>".$row['contact_no']."</td>";
                echo"</tr>";

            }

            ?>

        </table>
        <a href="patienthome.php">Home</a>
    </div>

</body>





	