<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	    if($postjson['action'] == 'select_status'){
	    	$today = date('Y-m-d');
	    	$query = mysqli_query($conn, "SELECT * FROM tb_student WHERE u_id = '$postjson[student_id]'");
			$read = mysqli_fetch_array($query);	
			$matric = $read['student_matric'];

			$insert = mysqli_query($conn,"INSERT INTO tb_hos_complaint SET student_id = '$matric',complaint_reason = '$postjson[reason]',
			permission = '$postjson[permissions]',complaint_date = '$today',complaint_status ='Pending'");
	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
?>