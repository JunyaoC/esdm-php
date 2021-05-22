<?php

	$servername = "185.185.40.33";
	$username = "root";
	$password = "root";
	$dbname = "esdm_db";

	//create connection
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if ($con->connect_error) 
	{
	    die("Connection failed: " . $con->connect_error);
	}
?>