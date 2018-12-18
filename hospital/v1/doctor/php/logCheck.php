<?php
	require '../db.php';

	if(isset($_POST['submit'])){

		$uid		= trim($_POST['uid']);
		$Password 	= md5(trim($_POST['password']));

		if($uid== "" || $Password == ""){
			
			header('location: ../login.php?error=null_found');

		}else{

			
			$conn = getConnection();

			$sql = "select * from registration where UserID='".$uid."' and Password='".$Password."'";

			$result = mysqli_query($conn, $sql);

			$data = mysqli_fetch_assoc($result);
			

			mysqli_close($conn);

			if($uid == $data['UserID'] && $Password == $data['Password']){
				if(isset($_POST['remember'])){
					setcookie('uid', $uid, time()+3600, '/');
					setcookie('password', $Password, time()+3600, '/');
					
					header('location: ../doctorHome.php');

				}
				session_start();
				$_SESSION['uid'] = $data['UserID'];
				$_SESSION['Password'] = $data['Password'];
				
				header('location: ../doctorHome.php');

			}else{
				header('location: ../login.php?error=invalid_user');
			}
		}

	}else{
		echo "invalid request!";
	}

?>