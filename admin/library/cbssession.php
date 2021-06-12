<?php

	if(!session_id()){
		session_start();
	}

	if(isset($_SESSION['r_id']) != session_id()){
		header("Location:../admin/dashboard.php");
	}


?>