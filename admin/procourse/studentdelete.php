<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //Check ID in URL 
    if(isset($_GET['id']))
    {
        $regid = $_GET['id'];
    }

    //SQL Delete operation
    $sql = "DELETE FROM tb_procourse_regHistory WHERE regHis_id='$regid'";
    $sqlseat="SELECT rh.*,cs.* FROM tb_procourse_regHistory rh LEFT JOIN tb_procourse_section cs ON rh.procourse_sec=cs.courseSec_id WHERE rh.regHis_id=$regid";
    $resultseat=mysqli_query($con,$sqlseat);
    $rowseat=mysqli_fetch_array($resultseat);
    $remain=$rowseat['courseSec_seat']+1;
    $sec_id=$rowseat['courseSec_id'];
    $sqls = "UPDATE tb_procourse_section SET courseSec_seat=$remain WHERE courseSec_id=$sec_id";
    $sql = "DELETE FROM tb_procourse_regHistory WHERE regHis_id='$regid'";
    // //Execute SQL
    $result = mysqli_query($con,$sql);
    $results = mysqli_query($con,$sqls);
    //Close connection
    mysqli_close($con);

    //Redirect
    header('Location: studentlist.php');


?>