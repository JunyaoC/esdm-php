<?php 

include('../dbconnection.php');
include('../adminsession.php');

    //Check ID in URL 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }

    //SQL Delete operation
    $sql = "DELETE FROM tb_pro_announcement WHERE an_id='$id'";

    //Execute SQL
    $result = mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect
    header('Location: announcement.php');


?>
