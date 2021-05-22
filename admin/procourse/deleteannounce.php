<?php 

include('../dbconnection.php');
include('../adminsession.php');

    //Check ID in URL 
    if(isset($_GET['an_id']))
    {
        $anid = $_GET['an_id'];
    }

    //SQL Delete operation
    $sql = "DELETE FROM tb_pro_announcement WHERE an_id='$anid'";

    //Execute SQL
    $result = mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect
    header('Location: announcement.php');


?>
