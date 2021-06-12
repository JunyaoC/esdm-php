<?php
	
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
        $stu_matric=$postjson['student'];

        $query = mysqli_query($conn, "SELECT * FROM tb_procourse_issue WHERE stu_matric='$stu_matric'");

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
        // $stu_matric=$postjson['student'];
        $query = mysqli_query($conn, "SELECT i.*,s.* FROM tb_procourse_issue i 
        LEFT JOIN tb_student s ON s.student_matric=i.stu_matric WHERE issue_id='$id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'issue_id' => $read['issue_id'],
                'issue_details' => $read['issue_details'],
                'stu_matric' => $read['stu_matric'],
                'student_name' => $read['student_name'],
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
        $stu_matric=$postjson['matric'];
        $update = mysqli_query($conn, "UPDATE tb_procourse_issue SET stu_matric = '$stu_matric', issue_title = '$postjson[title]', issue_details = '$postjson[content]', issue_date = '$today', issue_status = '0' WHERE `tb_procourse_issue`.`issue_id` = '$sid'");

        if($update) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}

		echo $result;

    }

?>

