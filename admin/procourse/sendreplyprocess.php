<?php 
  include('../dbconnection.php');
  include('../adminsession.php');

    //retrieve info from form and session 
    $fissueanswer = $_SESSION['issueanswer'];
 

    //SQL INSERT new booking 
    $sql = "UPDATE tb_procourse_issue
            SET issue_answer='$fissueanswer', issue_status = '1'
            WHERE issue_id = '$fissueid'";
            
    //check SQL output
    //var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    header('Location: issue.php');

?>