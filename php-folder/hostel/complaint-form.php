<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	/*if($postjson['action'] == 'list_status') {

		$query = mysqli_query($conn, "SELECT * FROM tb_status");
		$read_status = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'status_id'=> $read['status_id'],
				'status_name' => $read['status_name'],

			);
	            array_push($read_status,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','stats'=>$read_status));
	    echo $result;
	}*/

	    if($postjson['action'] == 'select_status'){
	    	$today = date('Y-m-d');

	    	//$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg SET hostel_id = '$postjson[kolej_id]',student_id = '$postjson[matric]',reg_date = '$today',reg_status ='Pending',reg_phase= 2");
			//$insert = mysqli_query($conn,"INSERT INTO tb_hos_complaint SET student_id = '$postjson[matric]',complaint_reason = '$postjson[reason]',permission = '$postjson[status_id]',complaint_date = '$today',complaint_status ='Pending'");


			$insert = mysqli_query($conn,"INSERT INTO tb_hos_complaint SET student_id = '$postjson[matric]',complaint_reason = '$postjson[reason]',
			permission = '$postjson[permissions]',complaint_date = '$today',complaint_status ='Pending'");
	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
?>