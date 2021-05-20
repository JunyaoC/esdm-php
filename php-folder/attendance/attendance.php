<?php

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);


	if($postjson['action'] == 'list_section') {

        $u_id = $postjson['u_id'];

        $query = mysqli_query($conn, "SELECT tb_subject.subject_code, tb_subject.subject_name, tb_section.section_id, tb_section.section_number FROM tb_section INNER JOIN tb_lecturer ON tb_section.lecturer_id = tb_section.lecturer_id INNER JOIN tb_subject ON tb_section.subject_id  = tb_subject.subject_id WHERE tb_lecturer.u_id = '$u_id' ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'subject_code' => $read['subject_code'],
                'subject_name' => $read['subject_name'],
                'section_id' => $read['section_id'],
                'section_number' => $read['section_number']
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'sections'=>$read_data));

        echo $result;
	}

    if($postjson['action'] == 'list_class') {

        $section_id = $postjson['section_id'];

        $query = mysqli_query($conn, "SELECT tb_class.class_id, tb_class.class_time FROM tb_class INNER JOIN tb_section ON tb_class.section_id = tb_section.section_id WHERE tb_section.section_id = '$section_id' ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'class_id' => $read['class_id'],
                'class_time' => $read['class_time'],
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'classes'=>$read_data));

        echo $result;
	}



