<?php
  
  include('../dbconnection.php');
  include('../adminsession.php');

  if(!session_id())
  {
    session_start();
  }

  //Check ID in URL
  if(isset($_GET['id']))
  {
  	$restaurant_id=$_GET['id'];
  }

  //SQL Delete operation
  $sql="DELETE FROM tb_restaurant WHERE restaurant_id ='$restaurant_id'";

  //Execute SQL
  $result = mysqli_query($con,$sql);

  // //Close connection
   mysqli_close($con);

  // //Redirect
   header('Location:restaurant.php');
  ?>
