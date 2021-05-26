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
  $food_restaurant = $_POST['foodRes'];
  $food_desc = $_POST['foodDesc'];
  $food_availability = $_POST['foodAva'];
  $food_price = $_POST['foodPrice'];
  $food_type = $_POST['foodType'];
  $pres = $_FILES['fileToUpload']['name'];
  $tname = $_FILES['fileToUpload']['tmp_name'];
  $target = "uploads/".$pres;


  if(move_uploaded_file($tname, $target)){


  $sql = "INSERT INTO tb_food(food_name, restaurant_id, food_description, food_availability, food_price, food_type, food_image) VALUES 
        ('$food_name','$food_restaurant', '$food_desc', '$food_availability', '$food_price', '$food_type', '$pres')";
  mysqli_query($con, $sql);
  mysqli_close($con);
  
  header("Location:menuPage.php");
  

  }
  else{
    echo 'Error';
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