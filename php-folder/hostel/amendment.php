<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);


	    if($postjson['action'] == 'add_amend'){
	    	$today = date('Y-m-d');
			$query = mysqli_query($conn, "SELECT * FROM tb_student WHERE u_id = '$postjson[student_id]'");
			$read = mysqli_fetch_array($query);	
			$matric = $read['student_matric'];
	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg SET hostel_id = '$postjson[kolej_id]',student_id = '$matric',reason = '$postjson[reason]',reg_date = '$today',reg_status ='Pending',reg_phase= 3");

	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
	    
?>