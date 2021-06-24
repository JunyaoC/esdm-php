<?php
  
  include('../dbconnection.php');
  include('../restaurantSession.php');

  if(!session_id())
  {
    session_start();
  }

  // $sql2 ="SELECT * FROM tb_restaurant";
  // $result=mysqli_query($con,$sql2);
  // $row=mysqli_fetch_array($result);

  // if ($_POST['foodRes'] == )



  //RETRIEVE INFO FROM POST
  $food_name = $_POST['foodName'];
  $food_restaurant = $_POST['foodResId'];
  $food_desc = $_POST['foodDesc'];
  $food_availability = $_POST['foodAva'];
  $food_price = $_POST['foodPrice'];
  $food_type = $_POST['foodType'];


  $sql = "INSERT INTO tb_food(food_name, restaurant_id, food_description, food_availability, food_price, food_type) VALUES 
        ('$food_name','$food_restaurant', '$food_desc', '$food_availability', '$food_price', '$food_type')";
  mysqli_query($con, $sql);

  $findsql = "SELECT food_id FROM tb_food WHERE food_id =(SELECT max(food_id) FROM tb_food)";

  $result=mysqli_query($con,$findsql);
  $row=mysqli_fetch_array($result);

  echo $row['food_id'];

  $pres = $_FILES['fileToUpload']['name'];
  $tname = $_FILES['fileToUpload']['tmp_name'];
  $target = "../../../esdm-student-mobile/esdm-student-mobile/src/assets/food-image/".$row['food_id'].".png";

  $fid = $row['food_id'];


  if(move_uploaded_file($tname, $target)){

   $sql2 = "UPDATE tb_food SET food_image = '$pres'  WHERE food_id = '$fid'"; 


  mysqli_query($con, $sql2);

  mysqli_close($con);

    header("Location:menuPage.php");
  }



  //SQL insert (create)
  // $sql = "INSERT INTO tb_food(restaurant_name, restaurant_address, restaurant_phone, restaurant_review, restaurant_status)
  //     VALUES ('$restaurant_name','$restaurant_address','$restaurant_phone','$restaurant_review','$restaurant_status')";



  // //EXECUTE SQL
  // mysqli_query($con,$sql);

  // // //CLOSE CONNECTION
  // mysqli_close($con);
  // // var_dump($sql);
  // header('Location:restaurant.php');

?>