<?php
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
	header("Content-Type: application/json; charset=utf-8");

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);
	$today = date('Y-m-d H:i:s');

	if($postjson['action'] == 'create_wishlist') {

		$insert = mysqli_query($conn, "INSERT INTO tb_wishlist SET u_id = '$postjson[u_id]', r_id = '$postjson[r_id]' ");

		if($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;
	}

	if($postjson['action'] == 'count_wishlist') {

		$fetch = mysqli_query($conn, "SELECT COUNT(*) FROM tb_wishlist");
		$count = mysqli_fetch_array($fetch)[0];

		if($count) {
			$result = json_encode(array('success'=>true, 'msg'=>'success', 'resource_length'=>$count));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}


	if($postjson['action'] == 'read_wishlist') {

		$fetch = mysqli_query($conn, "SELECT * FROM tb_wishlist");

		$read_data = array();

		while($read = mysqli_fetch_array($fetch, MYSQLI_ASSOC)) {
			$data = array(
				'r_id' => $read['r_id'],
				'u_id' => $read['u_id'],
				'w_id' => $read['w_id']

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


	if($postjson['action'] == 'delete_wishlist') {

		$delete = mysqli_query($conn, "DELETE FROM tb_wishlist WHERE u_id = '$postjson[u_id]' AND r_id = '$postjson[r_id]' ");

		if($delete) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}

