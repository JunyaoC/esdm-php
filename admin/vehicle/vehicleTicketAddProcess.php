<?php

  	include('../dbconnection.php');
  	include('../adminsession.php');

	$id = $_POST['id'];

	$plate = $_POST['plate'];
	$ticket = $_POST['ticket'];
	$tticket = (float)$ticket;

	$comment_text = $_POST['comment_text'];
	$status = $_POST['status'];

	$sql = "INSERT INTO  tb_ticket(ticket_uID, vehiclePlateNo, ticketAmount, ticketDesc, ticketStatus) 
		VALUES ( '$id' , '$plate', $tticket , '$comment_text', '$status')"; 

	mysqli_query($con,$sql);

	mysqli_close($con);

	header('Location: vehicleTicket.php');

?>