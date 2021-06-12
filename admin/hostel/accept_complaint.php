<?php
  include('../dbconnection.php');
  include('../adminsession.php');

if(isset($_POST['save2'])) {
        $tech_id = $_POST['tech'];
        $com_id = $_POST['com_id'];
        $squery = mysqli_query($con,"UPDATE tb_hos_complaint SET complaint_status = 'Accepted', tech_id = '$tech_id' WHERE complaint_id='$com_id'")or die(mysqli_error());
header('location:../hostel/complaint.php');
}
?>


