<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //retrieve info from form and session 
    $pccode = $_POST['pccode']; 
    $pcname = $_POST['pcname']; 
    $pctype = $_POST['pctype']; 
    $pcobjective = $_POST['pcobjective']; 
    $pclearningoutcome = $_POST['pclearningoutcome']; 

    $pcobjective=ucfirst($pcobjective);
    $pclearningoutcome=ucfirst($pclearningoutcome);
    $pcname=strtoupper($pcname);
    $pccode=strtoupper($pccode);
    
    //SQL INSERT 
    $sql = "INSERT INTO tb_pro_course (procourse_code, procourse_name, procourse_type, procourse_objective, procourse_learningOut)
            VALUES ('$pccode','$pcname','$pctype','$pcobjective','$pclearningoutcome')";

    //check SQL output
    var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: procourse.php');

?> 


