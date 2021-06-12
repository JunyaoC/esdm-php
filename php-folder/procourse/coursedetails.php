<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $today = date('Y-m-d');
    
    if($postjson['action'] == 'list_procourse') {
        $id=$postjson['id'];

        $query = mysqli_query($conn, "SELECT * FROM tb_pro_course WHERE procourse_code='$id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'procourse_code' => $read['procourse_code'],
                'procourse_name' => $read['procourse_name'],
                'procourse_type' => $read['procourse_type'],
                'procourse_objective' => $read['procourse_objective'],
                'procourse_learningOut' => $read['procourse_learningOut'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'procourse'=>$read_data));

        echo $result;

    }

    if($postjson['action'] == 'list_section') {
        $id=$postjson['id'];

        $today=date('Y-m-d');
        $sqlt = "SELECT * FROM tb_procourse_section WHERE courseSec_date<'$today'";
        $resultt=mysqli_query($conn,$sqlt);
        while($rowt=mysqli_fetch_array($resultt))
        {
                $sec_status=0;
                $ssqlupdate="UPDATE tb_procourse_section SET section_status=$sec_status WHERE courseSec_date<'$today'";
                mysqli_query($conn,$ssqlupdate);
    
        }

        $query = mysqli_query($conn, "SELECT c.*,sc.*,f.* FROM tb_pro_course c 
        LEFT JOIN tb_procourse_section sc  ON sc.courseSec_courseID=c.procourse_code
        LEFT JOIN tb_procourse_fac f ON sc.courseSec_fac=f.fac_id
        WHERE sc.courseSec_courseID='$id' AND sc.section_status=1 ORDER BY sc.section_no");

        $read_data = array();
       
            while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'courseSec_id' => $read['courseSec_id'],
                'courseSec_seat' => $read['courseSec_seat'],
                'courseSec_maxseat' => $read['courseSec_maxseat'],
                'courseSec_date' => $read['courseSec_date'],
                'courseSec_loc' => $read['courseSec_loc'],
                'fac_name' => $read['fac_name'],
                'courseSec_courseID' => $read['courseSec_courseID'],
                'section_no' => $read['section_no'],
            );
            array_push($read_data,$data);
             }
             $result = json_encode(array('success'=>true, 'msg'=>'success', 'section'=>$read_data));

            echo $result;
        
        

        

    }

    if($postjson['action'] == 'register') {
        $seat=$postjson['seat'];
        $sec_id=$postjson['course_section'];
        $procourse_code=$postjson['procourse_code'];
        $sql="SELECT rh.*,cs.* FROM tb_procourse_regHistory rh 
        LEFT JOIN tb_procourse_section cs ON rh.procourse_sec=cs.courseSec_id 
        WHERE cs.courseSec_courseID='$procourse_code' AND rh.stu_id='$postjson[student]'";
        $result=mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)==0) {
            $sqlcode="SELECT cs.*,c.* FROM tb_procourse_section cs
            LEFT JOIN tb_pro_course c ON cs.courseSec_courseID=c.procourse_code
            WHERE cs.courseSec_id='$sec_id'";
            $resultcode=mysqli_query($conn,$sqlcode);
            $rowcode=mysqli_fetch_array($resultcode);
            $pro_code=$rowcode['procourse_code'];
            $pro_name=$rowcode['procourse_name'];
            $course_date=$rowcode['courseSec_date'];

			$insert = mysqli_query($conn, "INSERT INTO tb_procourse_regHistory SET stu_id = '$postjson[student]',
            procourse_sec = '$postjson[course_section]', reg_date = '$today', pro_code='$pro_code', pro_name='$pro_name', course_date='$course_date'");
            $update = mysqli_query($conn, "UPDATE tb_procourse_section SET courseSec_seat = $seat WHERE courseSec_id =$sec_id");

            $result = json_encode(array('success'=>true, 'msg'=>'success'));
		} 
        else {
            $result = json_encode(array('success'=>false, 'msg'=>'fail'));
        }
		echo $result;

	}



?>