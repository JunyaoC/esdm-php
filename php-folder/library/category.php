<?php
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
	header("Content-Type: application/json; charset=utf-8");

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);
	$today = date('Y-m-d H:i:s');


	if($postjson['action'] == 'read_category') {

		$fetch = mysqli_query($conn, "SELECT * FROM tb_category");

		$read_data = array();

		while($read = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {
			$data = array(
				'category_id' => $read['category_id'],
				'category_name' => $read['category_name']
			);
			array_push($read_data,$data);
		}

		if(count($read_data) > 0) {
			$result = json_encode(array('success'=>true, 'msg'=>'success', 'response'=>$read_data));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}


