<?php

  include('../dbconnection.php');
  include('../adminsession.php');
    $cid = $_POST['cid'];
    $attend = $_POST['attend'];

     //UPDATE STATUS
    $sql = "UPDATE tb_class
            SET class_attendance_open = '$attend'
            WHERE class_id = '$cid' ";

  //var_dump($sql);



    mysqli_query($con,$sql)  or  die('Error:'.mysqli_error($con));
    mysqli_close($con);

   header('Location:attendance.php');
?>