<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
    }

    //retrieve info from form and session 
    $ctime = $_POST['ctime']; 
    $sid = $_POST['sid']; 
 


    //SQL INSERT 
    $sql = "UPDATE tb_class 
            SET class_time='$ctime', section_id='$sid'
            WHERE class_id = '$id'";

    //check SQL output
    //var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: attendance.php');

?> 


