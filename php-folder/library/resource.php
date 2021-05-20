<?php
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
	header("Content-Type: application/json; charset=utf-8");

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);
	$today = date('Y-m-d H:i:s');

	if($postjson['action'] == 'create_resource') {

		$insert = mysqli_query($conn, "INSERT INTO tb_resource SET r_id = '$postjson[r_id]', r_title = '$postjson[r_title]', r_category = '$postjson[r_category]', r_file = '$postjson[r_file]', r_author = '$postjson[r_author]', r_date = '$postjson[r_date]', r_status=1 ");

		if($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;
	}

	if($postjson['action'] == 'count_resource') {

		$fetch = mysqli_query($conn, "SELECT COUNT(*) FROM tb_resource");
		$count = mysqli_fetch_array($fetch)[0];

		if($count) {
			$result = json_encode(array('success'=>true, 'msg'=>'success', 'resource_length'=>$count));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}


	if($postjson['action'] == 'read_resource') {

		$fetch = mysqli_query($conn, "SELECT * FROM tb_resource WHERE r_status = 1 ");

		$read_data = array();

		while($read = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {
			$data = array(
				'r_id' => $read['r_id'],
				'r_title' => $read['r_title'],
				'r_category' => $read['r_category'],
				'r_file' => $read['r_file'],
				'r_author' => $read['r_author'],
				'r_date' => $read['r_date']
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


	if($postjson['action'] == 'edit_resource') {

		$update = mysqli_query($conn, "UPDATE tb_resource SET r_title = '$postjson[r_title]', r_category = '$postjson[r_category]', r_author = '$postjson[r_author]', r_date = '$postjson[r_date]' WHERE r_id = '$postjson[r_id]' ");

		if($update) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}



	if($postjson['action'] == 'delete_resource') {

		$delete = mysqli_query($conn, "UPDATE tb_resource SET r_status = 0 WHERE r_id = '$postjson[r_id]' ");

		if($delete) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}

