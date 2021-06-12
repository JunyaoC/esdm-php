<?php
  include('../dbconnection.php');
  include('../adminsession.php');
$com_id = $_GET['id'];
mysqli_query($con,"UPDATE tb_hos_complaint SET complaint_status = 'Rejected' WHERE complaint_id='$com_id'")or die(mysqli_error());
header('location:../hostel/complaint.php');
?>