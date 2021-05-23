<?php 

include('cbssession.php');

if(!session_id()){
  session_start();
}

include ('dbconnect.php');
//Check ID in URL

if(isset($_GET['r_id'])){
    $rid=$_GET['r_id'];
}

//SQL DELETE OPERATION

$sql = "DELETE FROM tb_resource WHERE r_id='$rid'";

$result = mysqli_query($con,$sql);

mysqli_close($con);

header('Location:manage-resource.php');


?>