<?php
	session_start();
 	include('dbconnection.php');

	if(isset($_SESSION['user_session']) != session_id())
	{
		header('Location:index.php');
	}

	if($_SESSION['u_role'] !='restaurant')
	{
		header('Location:logout.php');
	}
?>