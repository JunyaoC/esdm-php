<?php
  
  include('../dbconnection.php');
  include('../adminsession.php');

  if(!session_id())
  {
    session_start();
  }

  //RETRIEVE INFO FROM POST
  $order_id = $_POST['orderId'];
  $order_status = $_POST['orderStatus'];



  // //SQL UPDATE PROGRAM
  $sql = "UPDATE tb_order SET order_status='$order_status' WHERE order_id='$order_id'";

  // //EXECUTE SQL
  mysqli_query($con,$sql);

  // //CLOSE CONNECTION
  mysqli_close($con);

  header('Location:orderPage.php');

?>