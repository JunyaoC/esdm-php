<?php 

    include('../dbconnection.php');
    include('../adminsession.php');

    //retrieve info from form and session 
    // $secno = $_POST['secno']; 
    $secdate = $_POST['secdate']; 
    $seclocation = $_POST['seclocation']; 
    $secprocourse = $_POST['secprocourse']; 
    $secfacilitator = $_POST['secfacilitator']; 
    $secseat = 0; 
    $secmaxseat = $_POST['secmaxseat']; 
    $seclocation=ucwords($seclocation);
    $sqlseat="SELECT * FROM tb_procourse_section WHERE courseSec_courseID='$secprocourse' AND section_status=1";
    $result=mysqli_query($con,$sqlseat);
    $row=mysqli_num_rows($result);
    if($row>0)
    {
        $num=1;
        while($row=mysqli_fetch_array($result))
        {
            if($num==$row['section_no'])
            {
                $num=$num+1;
            }
            else{
                break;
            }
        }
        $secno=$num;
        
    }
    else if($row==0){
        $secno=1;
    }

    // SQL INSERT 
    $sql = "INSERT INTO tb_procourse_section (section_no, courseSec_date, courseSec_loc, courseSec_courseID, courseSec_fac, courseSec_seat, courseSec_maxseat,section_status)
            VALUES ($secno,'$secdate','$seclocation','$secprocourse','$secfacilitator',$secseat,$secmaxseat,1)";

    //check SQL output
   // var_dump($sql);

    //Execute SQL
    mysqli_query($con,$sql);

    //Close connection
    mysqli_close($con);

    //Redirect page
    header('Location: sectionlist.php');

?> 


