<?php
	session_start();
	$uid = $_SESSION['id'];
	require_once('../db.php');

	if(isset($_REQUEST['submit'])){
		$ppass = $_REQUEST['password'];
		$npassword = $_REQUEST['npassword'];		
		$cpass = $_REQUEST['cpassword'];
		
		
		if(empty($ppass) == true|| empty($npassword) == true ){
			echo "null submission";
		
		}else{
			$conn = getConnection();
			$sql = "select user_pass from all_users2 where upatient_id='$uid' " ;
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_assoc($result);
//			print_r($data);
			if((md5($ppass) == $data['user_pass'])){
				if($npassword == $cpass){
					
					$sql = "UPDATE patients set pass= '".md5($npassword)."' where patient_id='".$uid."'";
					$sql2 = "UPDATE all_users2 set user_pass= '".md5($npassword)."' where upatient_id='".$uid."'";
					echo $sql. " <<< ".$sql2;
					if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
//						session_destroy();
						echo "Change Successfull";
//						header('location: ../../login.php');
					}else{
					    echo "failed";
					}
					
					mysqli_close($conn);
					
				}else{
					echo "New Password And Confirm Password not Matched";
				}

			}else{
				echo "Old Password Not Matched";
			}

		}

	}else{
		header('location: ../changepass.php');
	}
?>