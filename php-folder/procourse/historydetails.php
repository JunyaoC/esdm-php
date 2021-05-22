<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    $id=$postjson['id'];
    if($postjson['action'] == 'list_section') {


        $query = mysqli_query($conn, "SELECT rh.*,cs.*,c.*,f.* FROM tb_procourse_regHistory rh
        LEFT JOIN tb_procourse_section cs ON rh.procourse_sec=cs.courseSec_id
        LEFT JOIN tb_pro_course c ON cs.courseSec_courseID=c.procourse_code
        LEFT JOIN tb_procourse_fac f ON cs.courseSec_fac=f.fac_id
        WHERE rh.procourse_sec='$id'
        ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'procourse_name' => $read['procourse_name'],
                'procourse_code' => $read['procourse_code'],
                'procourse_type' => $read['procourse_type'],
                'courseSec_date' => $read['courseSec_date'],
                'courseSec_loc' => $read['courseSec_loc'],
                'fac_name' => $read['fac_name'],
                'section_no' => $read['section_no'],       
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'section'=>$read_data));

        echo $result;

    }


    if($postjson['action'] == 'cancel') {
        $seat=$postjson['seat'];
        $sec_id=$postjson['course_section'];

		$insert = mysqli_query($conn, "INSERT INTO tb_procourse_regHistory SET stu_id = '$postjson[student]', procourse_sec = '$postjson[course_section]'");
        $update = mysqli_query($conn, "UPDATE tb_procourse_section SET courseSec_seat = $seat WHERE courseSec_id =$sec_id");

		if($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'Success to register'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'Fail to register'));
		}

        if($update) {
			$result1 = json_encode(array('success'=>true, 'msg'=>'Success to key in'));
		} else {
			$result1 = json_encode(array('success'=>false, 'msg'=>'Fail to key in'));
		}

		echo $result;
        echo $result1;
	}



?>