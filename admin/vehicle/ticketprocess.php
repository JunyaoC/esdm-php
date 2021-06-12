<?php

  include('../dbconnection.php');
  include('../adminsession.php');
    //$pid = $_POST['pid'];
   $sid = $_POST['sid'];
    $stats = $_POST['pstatus'];
   $sidnum = (int)$sid;




  // Do something.
     $sqlp = "UPDATE tb_ticket
            SET ticketStatus = '$stats'
            WHERE ticketID = '$sidnum' ";
             


      mysqli_query($con,$sqlp);
      mysqli_close($con);   

   header('Location:vehicleTicket.php');
