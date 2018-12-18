<?php
	session_start();
	$userid = $_SESSION['id'];
	require_once('../db.php');

	if(isset($_REQUEST['submit'])){
		$ppass = md5($_REQUEST['password']);
		$npassword = md5($_REQUEST['npassword']);		
		$cpass = md5($_REQUEST['cpassword']);
		
		
		if(empty($ppass) == true|| empty($npassword) == true ){
			echo "null submission";
		
		}else{
			$conn = getConnection();
			$sql = "select user_pass from all_users2 where uemp_id='".$userid."' " ;
			$result = mysqli_query($conn, $sql);
			$data = mysqli_fetch_assoc($result);
			if(($ppass == $data['user_pass']) == $npassword){
				if($npassword == $cpass){
					
					$sql = "UPDATE employee set pass= '".$npassword."' where emp_id='".$userid."' " ;
					$sql2 = "UPDATE all_users2 set user_pass= '".$npassword."' where uemp_id='".$userid."'";

					if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
//						session_destroy();
						echo "Change Successfull";
//						header('location: ../login.php');
						
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
		header('location: ../changePassword.php');
	}
?>