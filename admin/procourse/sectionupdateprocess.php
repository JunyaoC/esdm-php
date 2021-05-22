<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
    }

    //retrieve info from form and session 
    $secno = $_POST['secno']; 
    $secdate = $_POST['secdate']; 
    $seclocation = $_POST['seclocation']; 
    $secprocourse = $_POST['secprocourse']; 
    $secfacilitator = $_POST['secfacilitator']; 
    $secseat = $_POST['secseat']; 
    $secmaxseat = $_POST['secmaxseat']; 

    //SQL INSERT 
    $sql = "UPDATE tb_procourse_section 
            SET section_no='$secno', courseSec_date='$secdate', courseSec_loc='$seclocation', courseSec_courseID='$secprocourse', courseSec_fac='$secfacilitator', courseSec_seat='$secseat', courseSec_maxseat='$secmaxseat'
            WHERE courseSec_id = '$id'";

    //check SQL output
    //var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: sectionlist.php');

?> 


