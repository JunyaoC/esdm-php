<?php
  include('../dbconnection.php');
  include('../adminsession.php');

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

     //UPDATE STATUS
    $sql = "UPDATE tb_class
            SET class_attendance_open = '0'
            WHERE class_id = '$id' ";

  //var_dump($sql);
    mysqli_query($con,$sql)  or  die('Error:'.mysqli_error($con));
    mysqli_close($con);

   header('Location:attendance.php');
?>