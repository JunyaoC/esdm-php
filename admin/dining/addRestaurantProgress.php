<?php
  
  include('../dbconnection.php');
  include('../adminsession.php');

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
  $restaurant_username = $_POST['restaurantUsername'];
  $restaurant_password = $_POST['restaurantPassword'];

  $hash_password = md5($restaurant_password);

  //SQL insert (create)
  $sqlUser = "INSERT INTO tb_user(u_username, u_password, u_role, u_name)
              VALUES ('$restaurant_username','$hash_password','restaurant','$restaurant_name')";
  mysqli_query($con,$sqlUser);

  $sqlSelectUser = "SELECT * FROM tb_user WHERE u_id=(SELECT max(u_id) FROM tb_user)";
  $result = mysqli_query($con, $sqlSelectUser);
  $row = mysqli_fetch_array($result); 
  $generated_uid = $row['u_id'];

  $sql = "INSERT INTO tb_restaurant(restaurant_name, restaurant_phone, restaurant_address, restaurant_review, restaurant_status,u_id)
      VALUES ('$restaurant_name','$restaurant_phone','$restaurant_address','$restaurant_review','$restaurant_status','$generated_uid')";
  
  //EXECUTE SQL
  mysqli_query($con,$sql);

  // //CLOSE CONNECTION
  mysqli_close($con);
  // var_dump($sql);
  header('Location:restaurant.php');

?>