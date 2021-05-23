<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);
	// $uid = $postjson['u_id'];
	if($postjson['action'] == 'check_status') {

		$query = mysqli_query($conn, "SELECT tb_user.u_id,tb_student.*,tb_hostel_reg.*,tb_hos_college.* FROM tb_user INNER JOIN tb_student ON tb_user.u_id = tb_student.u_id INNER JOIN tb_hostel_reg ON tb_student.student_matric = tb_hostel_reg.student_id INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id WHERE tb_student.u_id = '2'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'reg_phase'=> $read['reg_phase'],
				 'reg_status'=> $read['reg_status'],
				 'reg_date'=> $read['reg_date'],
				 'reg_phase'=> $read['reg_phase'],
				 'kolej_name'=> $read['kolej_name'],

			);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}

?>