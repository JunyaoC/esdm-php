<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'kuota-pengetua'){
			$query = mysqli_query($conn, "SELECT * FROM tb_student WHERE u_id = '$postjson[student_id]'");
			$read = mysqli_fetch_array($query);	
			$matric = $read['student_matric'];
	    	$today = date('Y-m-d');
	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg SET hostel_id = '$postjson[kolej_id]',block_id = '$postjson[block_id]',room_id = '$postjson[room_id]',student_id = '$matric',reg_date = '$today',reg_status ='Pending',reg_phase= 1, activity_list='$postjson[activity]', reason='$postjson[reason]'");

	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
	
?>