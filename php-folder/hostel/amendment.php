<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);


	    if($postjson['action'] == 'add_amend'){
	    	$today = date('Y-m-d');

	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg SET hostel_id = '$postjson[kolej_id]',student_id = '$postjson[matricNo]',reason = '$postjson[reason]',reg_date = '$today',reg_status ='Pending',reg_phase= 3");

	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
	    
?>