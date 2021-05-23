<?php 

    include('../dbconnection.php');
    include('../adminsession.php');


    //retrieve info from form and session 
    $userid = $_POST['userid'];
	$atitle = $_POST['atitle'];
	$adetail = $_POST['adetail'];

    //SQL INSERT 
	$sql = "INSERT INTO tb_pro_announcement (an_title, an_detail, an_user)
			VALUES ('$atitle', '$adetail', '$userid')";

    //check SQL output
    var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: announcement.php');

?> 







