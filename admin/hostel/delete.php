<?php
  include('../dbconnection.php');
  include('../adminsession.php');
$reg_id = $_GET['id'];
mysqli_query($con,"UPDATE tb_hostel_reg SET reg_status = 'Rejected' WHERE reg_id='$reg_id'")or die(mysqli_error());
header('location:../hostel/register.php');
?>