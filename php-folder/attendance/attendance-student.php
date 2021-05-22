<?php
	
	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'sign_attendance') {
		$u_id = $postjson['u_id'];
		$class_id = $postjson['class_id'];

		$query = mysqli_query($conn, "SELECT tb_class.class_attendance_open FROM tb_registration
				INNER JOIN tb_section ON tb_section.section_id =tb_registration.section_id
				INNER JOIN tb_class ON tb_class.section_id = tb_section.section_id
				WHERE tb_registration.student_id = '$u_id' AND tb_class.class_id = '$class_id'");

	        $read_data = array();

	        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	            $data = $read['class_attendance_open'];
	            array_push($read_data,$data);
	        };


	    if(array_values($read_data)[0] > 0){
	    	
	    	if ($result=mysqli_query($conn, "SELECT * FROM tb_attendance WHERE tb_attendance.student_id = '$u_id' AND tb_attendance.class_id = '$class_id';"))
			  {
			  // Return the number of rows in result set
			  $rowcount=mysqli_num_rows($result);
			  printf("Result set has %d rows.\n",$rowcount);
			  // Free result set
			  mysqli_free_result($result);
			  }

	        if($rowcount > 0){
	        	
	        	$result = json_encode(array('success'=>false, 'msg'=>'user_signed_attendance'));
        		echo $result;

	        }else{

	        	mysqli_query($conn, "INSERT INTO esdm_db.tb_attendance (class_id,student_id,attendance_timestamp) VALUES ($class_id,$u_id,now());");

	        	$result = json_encode(array('success'=>true, 'msg'=>'sign_attendance_success'));

        		echo $result;


	        }

	    }else{
	    	$result = json_encode(array('success'=>false, 'msg'=>'attendance_closed'));
    		echo $result;
	    }


	}

	if($postjson['action'] == 'list_attendance') {

		$u_id = $postjson['u_id'];

		$query = mysqli_query($conn, "SELECT tb_subject.subject_name,tb_subject.subject_code,tb_attendance.attendance_timestamp,tb_class.class_time, tb_section.section_number FROM tb_attendance
				INNER JOIN tb_class ON tb_attendance.class_id = tb_class.class_id
				INNER JOIN tb_section ON tb_section.section_id = tb_class.section_id
				INNER JOIN tb_subject ON tb_subject.subject_id = tb_section.subject_id 
				WHERE tb_attendance.student_id = '$u_id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'subject_name' => $read['subject_name'],
                'subject_code' => $read['subject_code'],
                'attendance_timestamp' => $read['attendance_timestamp'],
                'class_time' => $read['class_time'],
                'section_number' => $read['section_number'],

                
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'attendance'=>$read_data));

        echo $result;

	}