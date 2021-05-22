<?php
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
	header("Content-Type: application/json; charset=utf-8");

	include "../connect.php";

	$postjson = json_decode(file_get_contents('php://input'), true);
	$today = date('Y-m-d');

	if($postjson['action'] == 'create_issue') {

		$insert = mysqli_query($conn, "INSERT INTO tb_procourse_issue SET stu_matric = '$postjson[matric]', issue_title = '$postjson[title]', issue_details = '$postjson[content]', issue_date = '$today'");

		if($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;
	}

?>

