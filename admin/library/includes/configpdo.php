<?php
$dbuser="root";
$dbpass="root";
$host="185.185.40.33";
$dbname = "esdm_db";
$con = mysqli_connect($servername, $username, $password , $dbname);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>