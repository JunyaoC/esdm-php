<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'kuota-pengetua'){
	    	$today = date('Y-m-d');

	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg SET hostel_id = '$postjson[kolej_id]',student_id = '$postjson[matric]',reg_date = '$today',reg_status ='Pending',reg_phase= 1, activity_list='$postjson[activity]', reason='$postjson[reason]'");

	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
?>