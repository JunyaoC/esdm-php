<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);
	// $uid = $postjson['u_id'];
	if($postjson['action'] == 'view_complaint_history') {

		$query1 = mysqli_query($conn, "SELECT * FROM tb_student WHERE u_id = '$postjson[student_id]'");
		$run_q = mysqli_fetch_array($query1);
		$matric = $run_q['student_matric'];

		$query = mysqli_query($conn, "SELECT * FROM tb_hos_complaint LEFT JOIN tb_hos_technician ON tb_hos_complaint.tech_id = tb_hos_technician.tech_id WHERE student_id = '$matric'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'complaint_date'=> $read['complaint_date'],
				 'complaint_reason'=> $read['complaint_reason'],
				 'permission'=> $read['permission'],
				 'complaint_status'=> $read['complaint_status'],
				 'tech_name' => $read['tech_name'],

			);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}

?>