<?php

  //retrive info from form and session.
  include('dbconnect.php');
  $r_category=$_POST['r_category'];
  $r_title=$_POST['r_title'];
  $r_author=$_POST['r_author']; 
  $r_file=$_POST['r_file'];
  $r_date=$_POST['r_date']; 

  //SQL INSERT new booking
  $sql = "INSERT INTO  tb_resource (r_category,r_title,r_author,r_file, r_date)
          VALUES ('$r_category','$r_title','$r_author','$r_file','$r_date')";



  

  //Check SQL output
  var_dump($sql);

  //Execute SQL
  mysqli_query($con,$sql);

  
  //Close connection
  mysqli_close($con);


header('Location:manage-resource.php');


?>