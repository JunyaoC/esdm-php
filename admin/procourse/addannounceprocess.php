<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //retrieve info from form and session 
	$fctitle = $_POST['fctitle'];
	$fcdetail = $_POST['fcdetail'];

    //SQL INSERT 
	$sql = "INSERT INTO tb_pro_announcement(an_title, an_detail)
			VALUES ('$fctitle', '$fcdetail')";

    //check SQL output
    var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: announcement.php');

?> 







