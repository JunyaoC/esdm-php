<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    $stu_matric=$postjson['student'];
    if($postjson['action'] == 'list_history') {


        $query = mysqli_query($conn, "SELECT rh.*,sc.*,s.* FROM tb_procourse_regHistory rh
        LEFT JOIN tb_procourse_section sc ON sc.courseSec_id=rh.procourse_sec
        INNER JOIN tb_student s on rh.stu_id=s.student_matric
        WHERE s.student_matric='$stu_matric' ORDER BY rh.course_date
        ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'pro_name' => $read['pro_name'],
                'pro_code' => $read['pro_code'],
                'course_date' => $read['course_date'],
                'procourse_sec' => $read['procourse_sec'],
                'regHis_id' => $read['regHis_id'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'history'=>$read_data));

        echo $result;

    }



?>