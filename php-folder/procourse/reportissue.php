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

		$insert = mysqli_query($conn, "INSERT INTO tb_procourse_issue SET stu_matric = '$postjson[matric]', issue_title = '$postjson[title]', issue_details = '$postjson[content]', issue_date = '$today', issue_status = '0'");

		if($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

	}elseif($postjson['action'] == 'list_issue') {


        $query = mysqli_query($conn, "SELECT * FROM tb_procourse_issue ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'issue_id' => $read['issue_id'],
                'issue_details' => $read['issue_details'],
                'issue_title' => $read['issue_title'],
                'issue_status' => $read['issue_status'],
                'issue_answer' => $read['issue_answer'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'issue'=>$read_data));

        echo $result;

    }elseif($postjson['action'] == 'issue_detail') {
    	$id=$postjson['id'];

        $query = mysqli_query($conn, "SELECT * FROM tb_procourse_issue WHERE issue_id='$id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'issue_id' => $read['issue_id'],
                'issue_details' => $read['issue_details'],
                'issue_title' => $read['issue_title'],
                'issue_status' => $read['issue_status'],
                'issue_answer' => $read['issue_answer'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'issue_detail'=>$read_data));

        echo $result;

    }elseif($postjson['action'] == 'issue_delete') {
    	$id=$postjson['id'];

        $delete = mysqli_query($conn, "DELETE FROM `tb_procourse_issue` WHERE `tb_procourse_issue`.`issue_id` = '$id'");

        if($delete) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

    }elseif($postjson['action'] == 'edit_issue') {
    	$sid=$postjson['sid'];

        $update = mysqli_query($conn, "UPDATE tb_procourse_issue SET stu_matric = '$postjson[matric]', issue_title = '$postjson[title]', issue_details = '$postjson[content]', issue_date = '$today', issue_status = '0' WHERE `tb_procourse_issue`.`issue_id` = '$sid'");

        if($update) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

    }

?>

