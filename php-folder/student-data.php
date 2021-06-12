<?php

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);

    $u_id = $postjson['u_id'];

        $query = mysqli_query($conn, "SELECT * FROM tb_student WHERE tb_student.u_id = '$u_id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'student_id' => $read['student_id'],
                'student_matric' => $read['student_matric'],
                'student_name' => $read['student_name'],
                'student_course' => $read['student_course'],
                'student_email' => $read['student_email'],
                'u_id' => $read['u_id'],
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'data'=>$read_data));

        echo $result;



