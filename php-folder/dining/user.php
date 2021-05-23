<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    $student_id = $postjson['student_id'];


    if($postjson['action'] == 'fetch_user') {

        $query = mysqli_query($conn, "SELECT * FROM tb_user LEFT JOIN  tb_student ON tb_student.u_id = tb_user.u_id WHERE tb_user.u_id = '$student_id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'student_name' => $read['student_name'],
                'student_matric' => $read['student_matric'],
                'student_course' => $read['student_course'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'user'=>$read_data));

        echo $result;

    }

?>