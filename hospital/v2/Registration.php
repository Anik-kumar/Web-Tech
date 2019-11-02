<?php 
	require_once 'db.php';
    error_reporting(E_ALL & ~E_NOTICE);

    $conn = getConnection();
    $id = "";
    $firstName = mysqli_real_escape_string($conn, trim($_REQUEST['first']));
    $lastName = mysqli_real_escape_string($conn, trim($_REQUEST['last']));
    $contact = mysqli_real_escape_string($conn, trim($_REQUEST['contact']));
    $pass1 = $_REQUEST['pass'];
    $pass2 = $_REQUEST['pass'];
    $email = mysqli_real_escape_string($conn, trim($_REQUEST['email']));
    $userType = "Patient";
    $gender = $_REQUEST['gender'];
    $dobYear = $_REQUEST['year'];
    $dobMonth = $_REQUEST['month'];
    $dobDay = $_REQUEST['day'];
    $age = date('Y')-$dobYear;
    $dateOfBirth = $dobYear . "-" . $dobMonth . "-" . $dobDay;
    $msg="";
//    print_r($_REQUEST);
//    echo "query->". "INSERT INTO patients VALUES('".$id."', '".$firstName."', '".$lastName."', '".$email."', '".$pass1."', '".$age."', '".$dateOfBirth."', '".$gender."', '".$userType."', '".$contact."')";

    if (empty($firstName)==true || empty($pass1)==true || empty($pass2)==true || empty($lastName)==true || empty($email)==true || empty($userType)==true || empty($contact)==true || empty($gender)==true || empty($dobYear)==true || empty($dobMonth)==true || empty($dobDay)==true || $contact < 9999) {
        $msg = "Fill up Registration Form ";
    }else{

        if($pass1 == $pass2){
            $pass1 = md5($pass2);
            if(!strpos($email, '@')==false && !strpos($email, '.com')==false){

                $conn = getConnection();

                $query = "INSERT INTO patients VALUES('".$id."', '".$firstName."', '".$lastName."', '".$email."', '".$pass1."', '".$age."', '".$dateOfBirth."', '".$gender."', '".$userType."', '".$contact."')";
                $query2 = "SELECT patient_id FROM patients WHERE email='".$email."'";
                if(mysqli_query($conn, $query)){
//                    echo "query->". $query;
                    $result = mysqli_query($conn, $query2);
                    $row = mysqli_fetch_assoc($result);
                    $lastId = $row['patient_id'];
                    $query3 = "INSERT INTO `all_users2` VALUES (0, NULL, '".$lastId."', '".$firstName."', '".$lastName."', '".$email."', '".$pass1."', '".$userType."')";
                    if(!mysqli_query($conn, $query3)){
                        $msg = "Error ". mysqli_errno($conn);
                    }else{
                        $msg = "Registration Successful";
                    }
                }else{

                    $msg = "Email is Already Register\nTry Another Email ";
                }
            }else{
                $msg = "Invalid Email. Make sure Email contains '@' and '.com' ";
            }
        }else{
            $msg = "Password Didn't Match";
        }
    }

    echo $msg;
//			echo $firstName."<br> ".$lastName."<br> ".$email.'<br> '.$gender.'<br> '.$contact."<br> ".$pass1."<br> ".$pass2."<br> ".$userType."<br> ".$dobYear."<br> ".$dobMonth."<br> ".$dobDay."<br> ".$age."<br> ".date('Y')."<br> ".$dateOfBirth;


 ?>

