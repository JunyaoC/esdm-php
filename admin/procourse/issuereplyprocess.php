<?php 
  include('../dbconnection.php');
  include('../adminsession.php');

  if(isset($_GET['id']))
  {
      $id = $_GET['id'];
  }

  //retrieve info from form and session 
  $issuereply = $_POST['issuereply'];
  $replydate = date("Y-m-d");
 
  //SQL INSERT new booking 
  $sql = "UPDATE tb_procourse_issue
          SET issue_answer='$issuereply', issue_status = '1', issue_answer_date=NOW()
          WHERE issue_id = '$id'";
            
  //check SQL output
  //var_dump($sql);

  //Execute SQL
  mysqli_query($con,$sql);

  //Close connection
  mysqli_close($con);

  header('Location: issue.php');

?>