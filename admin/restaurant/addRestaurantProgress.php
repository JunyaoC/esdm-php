<?php
  
  include('../dbconnection.php');
  include('../restaurantSession.php');

  if(!session_id())
  {
    session_start();
  }


  //RETRIEVE INFO FROM POST
  $restaurant_name = $_POST['restaurantName'];
  $restaurant_address = $_POST['restaurantAddr'];
  $restaurant_phone = $_POST['restaurantPhone'];
  $restaurant_status = $_POST['restaurantStatus'];
  $restaurant_review = $_POST['restaurantReview'];

  //SQL insert (create)
  $sql = "INSERT INTO tb_restaurant(restaurant_name, restaurant_address, restaurant_phone, restaurant_review, restaurant_status)
      VALUES ('$restaurant_name','$restaurant_address','$restaurant_phone','$restaurant_review','$restaurant_status')";



  //EXECUTE SQL
  mysqli_query($con,$sql);

  // //CLOSE CONNECTION
  mysqli_close($con);
  // var_dump($sql);
  header('Location:restaurant.php');

?>