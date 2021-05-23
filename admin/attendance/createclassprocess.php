<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //retrieve info from form and session 
    $ctime = $_POST['ctime']; 
    $sid = $_POST['sid']; 
 
    //SQL INSERT 
    $sql = "INSERT tb_class 
            VALUES class_time='$ctime', section_id='$sid'";

    //check SQL output
    //var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: attendance.php');

?> 


