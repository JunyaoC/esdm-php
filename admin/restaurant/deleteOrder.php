<?php
  
  include('../dbconnection.php');
  include('../restaurantSession.php');

  if(!session_id())
  {
    session_start();
  }

  //Check ID in URL
  if(isset($_GET['id']))
  {
  	$id=$_GET['id'];
  }

  //SQL Delete operation
  $sql="DELETE FROM tb_order WHERE order_id ='$id'";

  //Execute SQL
  $result = mysqli_query($con,$sql);

  // //Close connection
   mysqli_close($con);

  // //Redirect
   header('Location:orderPage.php');
  ?>