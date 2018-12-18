<?php
     
	
	require '../db.php';
	
	if(isset($_POST['submit'])){

		$uid 		= trim($_POST['userid']);
		$Password 	= trim($_POST['password']);

		if($uid == "" || $Password == ""){
			
			header('location: ../login.php?error=null_found');

		}else{

			
		    
			$conn = getConnection();

			$sql = "select * from reg where ID='".$uid."' and Password='".$Password."'";

			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_assoc($result);

			mysqli_close($conn);

			if($uid == $row['ID'] && $Password == $row['Password']){
				if(isset($_POST['remember'])){
					setcookie('userid',$uid,time()+10,'/');
					setcookie('password',$Password,time()+10,'/');
					
					header('location: ../patienthome.php');
				}
				session_start();
				
				$_SESSION['userid'] = $row['ID'];
				$_SESSION['Password'] = $row['Password'];
				

				header('location: ../patienthome.php');

			}else{
				header('location: ../login.php?error=invalid_user');
			}
		}

	}else{
		echo "invalid request!";
	}

?>