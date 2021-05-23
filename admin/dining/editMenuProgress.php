<?php
  
  include('../dbconnection.php');
  include('../adminsession.php');

  if(!session_id())
  {
    session_start();
  }


  //RETRIEVE INFO FROM POST
  $food_name = $_POST['foodName'];
  $food_restaurant = $_POST['foodRes'];
  $food_desc = $_POST['foodDesc'];
  $food_availability = $_POST['foodAva'];
  $food_price = $_POST['foodPrice'];
  $food_type = $_POST['foodType'];
  $pres = $_FILES['fileToUpload']['name'];
  $tname = $_FILES['fileToUpload']['tmp_name'];
  $target = "../../../../esdm-student_mobile/esdm-student_mobile/src/".$pres;
  $fid = $_POST['id'];


  if(move_uploaded_file($tname, $target)){

  $sql = "UPDATE tb_food SET food_name = '$food_name', restaurant_id = '$food_restaurant', food_description = '$food_desc', 
          food_availability = '$food_availability', food_price = '$food_price', food_type = '$food_type', food_image = '$pres' 
          WHERE food_id = '$fid'";

  mysqli_query($con, $sql);
  mysqli_close($con);
  
  header("Location:menuPage.php");
  

  }
  else{
    echo 'Error';
  }


?>