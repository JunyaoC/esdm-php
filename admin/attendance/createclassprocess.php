<?php 

    include('../dbconnection.php');
    include('../adminsession.php');


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       
      }
    //retrieve info from form and session 
    $ctime = $_POST['ctime']; 
    $sid = $_POST['sid']; 
    

    $ctime=date('Y-m-d h:i:s');
    
 
    //SQL INSERT 
    $sql = "INSERT INTO tb_class(section_id,class_time) VALUES ('$sid','$ctime')
             ";

    //check SQL output
    //var_dump($sql);

    //Execute SQL
    
    mysqli_query($con, $sql) or  die('Error:'.mysqli_error($con));

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: attendance.php');

?> 


