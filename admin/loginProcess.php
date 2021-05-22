<?php

	session_start();	

	$errorpass = "Wrong password! Please login again." ;
	$errorname = "Wrong username! Please login again." ;
	$identityNo = "";
	$password = "";
	

	//Get DB Info
	include('dbconnection.php');

	if(isset($_POST['signin']))
	{
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		
		//Retrieve login from DB

			$sql = "SELECT * FROM tb_user WHERE u_username = ?";
			$query = $con->prepare($sql);
			$query->bind_param("s",$userName);
			$query->execute();
			$results=$query->get_result();
			$row = $results->fetch_assoc();
			if($results->num_rows > 0)
			{
				$password_hash = md5($password);
				$user_id= $row['u_id'];
			
				if($password_hash==$row['u_password'])
				{
					$_SESSION['user_session'] = session_id();
					$_SESSION['user_id'] = $user_id;  
					$_SESSION['u_role'] = $row['u_role'];
					header('Location: admin/dashboard.php');
	
					
				}
				else
				{
					$_SESSION['error'] = $errorpass;
					header('Location: index.php');
				}

			}
			else
			{
				$_SESSION['error'] = $errorname;
				header('Location: index.php');
			}

		

	}
	
?>
