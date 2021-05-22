<?php

  include('../dbconnection.php');
  include('../adminsession.php');
    $sid = $_POST['sid'];
    $stats = $_POST['status'];
    $sidnum = (int)$sid;
   
     //UPDATE STATUS
    $sql = "UPDATE tb_sticker
            SET stickerStatus = '$stats'
            WHERE stickerID = '$sidnum' ";

  //var_dump($sql);     



    mysqli_query($con,$sql);
    mysqli_close($con);     

   header('Location:vehicle.php');
