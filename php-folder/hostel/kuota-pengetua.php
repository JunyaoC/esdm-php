<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	
	    	$today = date('Y-m-d');
/*	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg (hostel_id = '$postjson[kolej_id]',student_id = '$matric',reg_date = '$today',reg_status ='Pending',reg_phase= 1, activity_list='$postjson[activity]', reason='$postjson[reason]'");*/
	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg (hostel_id,student_id,reg_date,reg_status,reg_phase,activity_list, reason)SELECT '$postjson[kolej_id]',tb_student.student_matric,'$today','Pending',2,'$postjson[activity]','$postjson[reason]' FROM tb_student WHERE u_id = '$postjson[student_id]'");

	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
			echo $result;

	    }
	
?>