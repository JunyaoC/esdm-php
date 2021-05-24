<?php
  include('../dbconnection.php');
  include('../adminsession.php');
$reg_id = $_GET['id'];
mysqli_query($con,"delete from tb_hostel_reg where reg_id='$reg_id'")or die(mysqli_error());
header('location:../hostel/register.php');
?>