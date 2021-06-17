<?php

  include('../dbconnection.php');
  include('../adminsession.php');
    $pid = $_POST['pid'];
   // $sid = $_POST['sid'];
    $stats = $_POST['pstatus'];
   // $sidnum = (int)$sid;
    $pidnum = (int)$pid;




// if($pid){
// //do something if $_GET is set 
//       $sqlp = "UPDATE tb_payment
//             SET paymentStatus = '$stats'
//             WHERE stickerID = '$sidnum' ";
// } 
// else if(!$pid){
//       $sql = "UPDATE tb_sticker
//             SET stickerStatus = '$stats'
//             WHERE stickerID = '$sidnum' ";
// //do something if $_GET is NOT set 
// } 



  // Do something.
     $sqlp = "UPDATE tb_payment
            SET paymentStatus = '$stats'
            WHERE paymentID = '$pidnum' ";

                // var_dump($sqlp);

    




  //       $sql = "UPDATE tb_sticker
  //           SET stickerStatus = '$stats'
  //           WHERE stickerID = '$sidnum' ";
  //             mysqli_query($con,$sql);
  //               mysqli_close($con);    

  // var_dump($sql);    




 

// if (mysqli_query($con, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($con);
// }
  if (mysqli_query($con, $sqlp)) {
  // echo "New record created successfully";
    mysqli_query($con,$sqlp);
      mysqli_close($con);   

   header('Location:vehicle.php');
} else {
  mysqli_query($con,$sqlp);
      mysqli_close($con);   
  echo "Error: " . $sqlp . "<br>" . mysqli_error($con);
}