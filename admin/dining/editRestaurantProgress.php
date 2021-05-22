<?php
  
  include('../dbconnection.php');
  include('../adminsession.php');

  if(!session_id())
  {
    session_start();
  }

  //RETRIEVE INFO FROM POST
  $restaurant_id = $_POST['restaurantId'];
  $restaurant_name = $_POST['restaurantName'];
  $restaurant_address = $_POST['restaurantAddr'];
  $restaurant_phone = $_POST['restaurantPhone'];
  $restaurant_status = $_POST['restaurantStatus'];


  // //SQL UPDATE PROGRAM
  $sql = "UPDATE tb_restaurant SET restaurant_id='$restaurant_id' , restaurant_name='$restaurant_name', restaurant_address='$restaurant_address', restaurant_phone='$restaurant_phone', restaurant_status='$restaurant_status' WHERE restaurant_id='$restaurant_id'";

  // //EXECUTE SQL
  mysqli_query($con,$sql);

  // //CLOSE CONNECTION
  mysqli_close($con);

  header('Location:restaurant.php');

?>