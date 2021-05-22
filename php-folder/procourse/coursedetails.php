<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    $id=$postjson['id'];
    if($postjson['action'] == 'list_procourse') {


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


        $query = mysqli_query($conn, "SELECT c.*,sc.*,f.* FROM tb_pro_course c 
        LEFT JOIN tb_procourse_section sc  ON sc.courseSec_courseID=c.procourse_code
        LEFT JOIN tb_procourse_fac f ON sc.courseSec_fac=f.fac_id
        WHERE sc.courseSec_courseID='$id'");

        $read_data = array();
       
            while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'courseSec_id' => $read['courseSec_id'],
                'courseSec_seat' => $read['courseSec_seat'],
                'courseSec_maxseat' => $read['courseSec_maxseat'],
                'courseSec_date' => $read['courseSec_date'],
                'courseSec_loc' => $read['courseSec_loc'],
                'fac_name' => $read['fac_name'],
            );
            array_push($read_data,$data);
             }
             $result = json_encode(array('success'=>true, 'msg'=>'success', 'section'=>$read_data));

            echo $result;
        
        

        

    }

    if($postjson['action'] == 'register') {
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