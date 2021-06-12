<?php

	include "connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'login_user') {

		$password = md5($postjson['u_password']);

		$login = mysqli_query($conn, "SELECT * FROM tb_user WHERE u_username = '$postjson[u_username]' AND u_password = '$password'");

		if (mysqli_num_rows($login)==0) {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		} else {

			$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE u_username='$postjson[u_username]' AND u_password = '$password' ");

			$read_data = array();

			while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$data = array(
					'u_id' => $read['u_id'],
					'u_username' => $read['u_username'],
					'u_role' => $read['u_role'],
					'u_name' => $read['u_name']
				);
				array_push($read_data,$data);
			}


			$result = json_encode(array('success'=>true, 'msg'=>'success', 'user_data'=>$read_data));
		}

		echo $result;
	}

