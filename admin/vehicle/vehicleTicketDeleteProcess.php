<?php

  	include('../dbconnection.php');
  	include('../adminsession.php');

	$id = $_GET['id'];



	$sql = "DELETE FROM tb_ticket WHERE ticketID = $id"; 

// 	if (mysqli_query($con, $sql)) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . mysqli_error($con);
//}
	mysqli_query($con,$sql);

	mysqli_close($con);

	header('Location: vehicleTicket.php');


?>