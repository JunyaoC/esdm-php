<?php

  include('../dbconnection.php');
  include('../adminsession.php');
    $sid = $_POST['fbid'];
    $stats = $_POST['status'];
    $sidnum = (int)$sid;
   
     //UPDATE STATUS
    $sql = "UPDATE tb_sticker
            SET stickerStatus = '$stats'
            WHERE stickerID = '$sidnum' ";

    $sqlp = "UPDATE tb_payment
            SET paymentStatus = '$stats'
            WHERE stickerID = '$sidnum' ";
//   var_dump($sql);     


// if (mysqli_query($con, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
    mysqli_query($con,$sql);
    mysqli_query($con,$sqlp);
    mysqli_close($con);     

   header('Location:vehicle.php');
