<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //retrieve info from form and session 
    $secno = $_POST['secno']; 
    $secdate = $_POST['secdate']; 
    $seclocation = $_POST['seclocation']; 
    $secprocourse = $_POST['secprocourse']; 
    $secfacilitator = $_POST['secfacilitator']; 
    $secseat = $_POST['secseat']; 
    $secmaxseat = $_POST['secmaxseat']; 

    //SQL INSERT 
    $sql = "INSERT INTO tb_procourse_section (section_no, courseSec_date, courseSec_loc, courseSec_courseID, courseSec_fac, courseSec_seat, courseSec_maxseat)
            VALUES ('$secno','$secdate','$seclocation','$secprocourse','$secfacilitator','$secseat','$secmaxseat')";

    //check SQL output
    var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: sectionlist.php');

?> 


