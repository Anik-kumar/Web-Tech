<?php
error_reporting(E_ALL & ~E_NOTICE);
    require_once 'db.php';
    require_once 'getFiles.php';

	session_start();
	$name;
    $flag = false;
    $code = "home";
	if(isset($_SESSION['full_name']) && !empty(trim($_SESSION['full_name']))){
		$name = $_SESSION['first_name'];
		// echo "SESSION name ".$_SESSION['name'];
	}else{
		header("Location: ../login.php");
	}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap3.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/semantic.min.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Montserrat|PT+Sans+Narrow|Quicksand|Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|PT+Sans&display=swap" rel="stylesheet">


<!--    font-family: 'PT Sans', sans-serif;-->
<!--    font-family: 'Noto Sans', sans-serif;-->
<!--    font-family: 'Inconsolata', monospace;-->
<!--    font-family: 'PT Sans Narrow', sans-serif;-->
<!--    font-family: 'Quicksand', sans-serif;-->
<!--    font-family: 'Montserrat', sans-serif;-->
<!--    font-family: 'Roboto Mono', monospace;-->


    <link rel="stylesheet" type="text/css" href="resources/css/admin.css">

    <script src="vendors/js/jquery-3.3.1.js"></script>
    <script src="vendors/js/bootstrap.js"></script>

    <script type="text/javascript" src="resources/js/validateForms.js"></script>  <!-- addDepartment.php -->

    <style type="text/css">

    </style>

</head>
<body>
    <div id="header">
        <?php include "header.php" ?>
    </div>
    <div id="wrapper">
        <!-- <div id="main"> -->
            <!-- sidebar -->
            <div id="left-column">
                <?php include "left-column.php" ?>
            </div>

            <!-- main content -->
            <div id="right-column">
                <div id="content" class="container-fluid">
                <a href="#" class="btn btn-primary" id="toggle-menu">Toggle</a>
                    <div class="row">
                        <div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3" style="border: 1px solid red">
                          Dive fsadjlsdjflaksjdflkjasfalskdfj
                        </div>
                        <div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3" style="border: 1px solid blue"> Dive 1 </div>
                        <div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3" style="border: 1px solid aqua"> Dive 2 </div>
                        <div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3" style="border: 1px solid green"> Dive 3 </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->


    </div>

    <div id="footer">
        <?php require_once "../footer.php"; ?>
    </div>

<!--*******************************************************************************************************************-->

    <!-- menu toggle script -->
    <script type="text/javascript">

        $("#toggle-menu").click( function(e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");

        });

        /*var page = 'home.php';
        var onceFlag = false;

        function redirectPage($text){
            // alert("ssss"+$text);
            switch ($text) {
                case 'department':
                    page = "showDepartments.php";
                    onceFlag = true;
                    $('.innerDiv').load(page);
                    break;
                case 'addDept':
                    $('.innerDiv').load("addDepartment.php");
                    break;
                case 'doctor':
                    applyPage($flag, $code);
                    break;
                case 'patient':
                    $('.innerDiv').load("showPatients.php");
                    break;
                case 'nurse':
                    applyPage($flag, $code);
                    break;
                case 'room':
                    $('.innerDiv').load("showRooms.php");
                    break;
                case 'admittedPatient':
                    $('.innerDiv').load("showAdmittedPatients.php");
                    break;
                case 'employees':
                    $('.innerDiv').load("showEmp.php");
                    break;
                case 'appointment':
                    $('.innerDiv').load("showAppointment.php");
                    break;
                case 'searchAll':
                    $('.innerDiv').load("searchAll.php");
                    break;

                case 'profile':

                    $('.innerDiv').load("viewProfile.php");
                    break;

                default:

                    $('.innerDiv').load("home.php");
                    break;
            }

        }*/

    </script>



</body>
</html>