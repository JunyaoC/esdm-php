<?php

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);

    if($postjson['action'] == 'list_slot') {

        $start_date = $postjson['start_date'];
        $end_date = $postjson['end_date'];

        $query = mysqli_query($conn, "SELECT * FROM tb_appointment_slot WHERE (tb_appointment_slot.slot_datetime between '$start_date' and '$end_date') AND tb_appointment_slot.slot_stu_id IS NULL;");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'slot_id' => $read['slot_id'],
                'slot_datetime' => $read['slot_datetime'],
                'slot_center_id' => $read['slot_center_id'],
                'slot_stu_id' => $read['slot_stu_id'],
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'slots'=>$read_data));

        echo $result;
	}

    if($postjson['action'] == 'book_slot') {

        $u_id = $postjson['u_id'];
        $slot_id = $postjson['slot_id'];

        $query = mysqli_query($conn, "UPDATE esdm_db.tb_appointment_slot SET slot_stu_id='$u_id'WHERE slot_id='$slot_id'");

        $result = json_encode(array('success'=>true, 'msg'=>'success'));

        echo $result;
    }

    if($postjson['action'] == 'list_student_slot') {

        $u_id = $postjson['u_id'];

        $query = mysqli_query($conn, "SELECT * FROM tb_appointment_slot WHERE tb_appointment_slot.slot_stu_id ='$u_id';");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'slot_id' => $read['slot_id'],
                'slot_datetime' => $read['slot_datetime'],
                'slot_center_id' => $read['slot_center_id'],
                'slot_stu_id' => $read['slot_stu_id'],
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'slots'=>$read_data));

        echo $result;
    }




