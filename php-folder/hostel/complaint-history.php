<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);
	// $uid = $postjson['u_id'];
	if($postjson['action'] == 'view_complaint_history') {

		$query = mysqli_query($conn, "SELECT tb_user.u_id,tb_student.*,tb_hos_complaint.* FROM tb_user INNER JOIN tb_student ON tb_user.u_id = tb_student.u_id INNER JOIN tb_hos_complaint ON tb_student.student_matric = tb_hos_complaint.student_id WHERE tb_student.u_id = '2'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'complaint_date'=> $read['complaint_date'],
				 'complaint_reason'=> $read['complaint_reason'],
				 'permission'=> $read['permission'],
				 'complaint_status'=> $read['complaint_status'],

			);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}

?>