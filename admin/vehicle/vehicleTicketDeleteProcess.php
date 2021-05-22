<?php

  	include('../dbconnection.php');
  	include('../adminsession.php');

	$id = $_GET['id'];



	$sql = "DELETE FROM tb_ticket WHERE ticketID = $id"; 

	mysqli_query($con,$sql);

	mysqli_close($con);

	header('Location: vehicleTicket.php');


?>