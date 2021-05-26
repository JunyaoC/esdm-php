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
  $restaurant_username = $_POST['restaurantUsername'];
  $restaurant_password = $_POST['restaurantPassword'];
  $restaurant_userid = $_POST['restaurantId'];


  $hashed_password = md5($restaurant_password);

  // //SQL UPDATE PROGRAM
  $sql = "UPDATE tb_restaurant SET restaurant_id='$restaurant_id' , restaurant_name='$restaurant_name', restaurant_address='$restaurant_address', restaurant_phone='$restaurant_phone', restaurant_status='$restaurant_status' WHERE restaurant_id='$restaurant_id'";

  $sqlUser = "UPDATE tb_user SET u_username='$restaurant_username' , u_password='$hashed_password' WHERE u_id='$restaurant_userid'";
  mysqli_query($con,$sqlUser);
  // //EXECUTE SQL
  mysqli_query($con,$sql);

  // //CLOSE CONNECTION
  mysqli_close($con);

  header('Location:restaurant.php');

?>