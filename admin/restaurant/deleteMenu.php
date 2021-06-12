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
  	$food_id=$_GET['id'];
  }

  //SQL Delete operation
  $sql="DELETE FROM tb_food WHERE food_id ='$food_id'";

  //Execute SQL
  $result = mysqli_query($con,$sql);

  // //Close connection
   mysqli_close($con);

  // //Redirect
   header('Location:menuPage.php');
  ?>