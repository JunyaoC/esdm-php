<?php

	if(!session_id()){
		session_start();
	}

	if(isset($_SESSION['StudentId']) != session_id()){
		header("index.php");
	}


?>