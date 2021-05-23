<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
    }

    //retrieve info from form and session 
    $pccode = $_POST['pccode']; 
    $pcname = $_POST['pcname']; 
    $pctype = $_POST['pctype']; 
    $pcobjective = $_POST['pcobjective']; 
    $pclearningoutcome = $_POST['pclearningoutcome']; 
    $pcobjective=ucfirst($pcobjective);
    $pclearningoutcome=ucfirst($pclearningoutcome);
    $pcname=strtoupper($pcname);
    //SQL INSERT 
    $sql = "UPDATE tb_pro_course 
            SET procourse_code='$pccode', procourse_name='$pcname', procourse_type='$pctype', procourse_objective='$pcobjective', procourse_learningOut='$pclearningoutcome'
            WHERE procourse_code = '$id'";

    //check SQL output
    //var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: procourse.php');

?> 


