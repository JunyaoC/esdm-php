<?php 

include('cbssession.php');

if(!session_id()){
  session_start();
}

include ('dbconnect.php');
//Check ID in URL

if(isset($_GET['category_id'])){
    $category_id=$_GET['category_id'];
}

//SQL DELETE OPERATION

$sql = "DELETE FROM tb_category WHERE category_id='$category_id'";

$result = mysqli_query($con,$sql);

mysqli_close($con);

header('Location:manage-category.php');


?>