<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //retrieve info from form and session 
    $userid = $_POST['userid']; 
    $aid = $_POST['aid']; 
    $atitle = $_POST['atitle']; 
    $adetail = $_POST['adetail']; 

    //SQL INSERT 
    $sql = "UPDATE `tb_pro_announcement` SET `an_title` = '$atitle', `an_detail` = '$adetail'  WHERE `tb_pro_announcement`.`an_id` = '$aid'";

    //check SQL output
    //var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: announcement.php');

?> 


