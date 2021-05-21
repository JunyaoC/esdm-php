<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    
    if($postjson['action'] == 'list_history') {


        $query = mysqli_query($conn, "SELECT rh.*,sc.*,c.*,s.* FROM tb_procourse_regHistory rh
        LEFT JOIN tb_procourse_section sc ON sc.courseSec_id=rh.procourse_sec
        LEFT JOIN tb_pro_course c ON sc.courseSec_courseID=c.procourse_code
        INNER JOIN tb_student s on rh.stu_id=s.student_matric
        ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'procourse_name' => $read['procourse_name'],
                'procourse_code' => $read['procourse_code'],
                'courseSec_date' => $read['courseSec_date'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'history'=>$read_data));

        echo $result;

    }



?>