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
    <div id="wrapper" class="iconDisplayed">
        <!-- <div id="main"> -->
            <!-- sidebar -->
            <div id="left-column">
                <?php include "left-column.php" ?>
            </div>

            <!-- main content -->
            <div id="right-column">
                <div id="content" class="container-fluid">
                    <div class="row">

                            <?php
                            if(!empty($_REQUEST['f1']) && !empty($_REQUEST['f2'])){
                                $f1 = $_REQUEST['f1'];
                                $f2 = $_REQUEST['f2'];

                                echo $f1 ." ==> " . $f2 ." =-> ";
                                $page = getPageLink($f1,$f2);
                                echo $page;
                                if(isset($_REQUEST['patId'])){
                                    $patId = $_REQUEST['patId'];
                                    echo $patId;
                                    include $page;
                                }elseif(isset($_REQUEST['id'])){
                                    $idPass = $_REQUEST['id'];
                                    include $page;
//                                    echo $_SERVER['REQUEST_URI'];
//                                    $uri = $_SERVER['REQUEST_URI'];
//                                    $link = explode('/', $uri);
//                                    print_r($link);

                                }else{
                                    include $page;
//                                    echo "<script type='text/javascript'> alert('{')</script>";
//                                    echo $_SERVER['REQUEST_URI'];
                                }



                            }else{
                                include("home.php");
//                                echo $_SERVER['REQUEST_URI'];
//                                $uri = $_SERVER['REQUEST_URI'];
//                                $link = explode('/', $uri);
//                                print_r($link);
                            }

                            ?>


                        
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
            $("#wrapper").toggleClass("iconDisplayed");
            $("#first-nav").toggleClass("hide-nav");
            $("#second-nav").toggleClass("hide-nav");

        });

    </script>



</body>
</html>