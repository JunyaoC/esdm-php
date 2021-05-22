<?php
	//DB parameters
	$servername = "185.185.40.33";
	$username = "root";
	$password = "root";
	$dbname = "esdm_db";

	//Create connection
	$con = mysqli_connect($servername, $username, $password , $dbname);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	

?>