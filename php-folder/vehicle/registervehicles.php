<?php 
    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
	$vehicleID = $postjson['vehicleID'];
	$vehicleModel = $postjson['vehicleModel'];
	$vehicleColor = $postjson['vehicleColor'];
	$vehicleType = $postjson['vehicleType'];
	$stuACID = $postjson['stuACID'];

    if($postjson['action'] == 'addvehicle'){

		//Run checking if the car plate exist

		$exist_check = mysqli_query($conn, "SELECT * FROM tb_vehicle WHERE vehicleID = '$vehicleID'");

		$row_cnt = mysqli_num_rows($exist_check);

		if($row_cnt > 0){
			$result = json_encode(array('success'=>false, 'msg'=>'Car plate exist'));
			echo $result;
		}else{
			$insert = mysqli_query($conn, "INSERT INTO tb_vehicle SET vehicleID = '$vehicleID', vehicleModel = '$vehicleModel', vehicleColor = '$vehicleColor', vehicleType = '$vehicleType', stuACID = '$stuACID'");
	
			if($insert) {
				$result = json_encode(array('success'=>true, 'msg'=>'success'));
			} else {
				$result = json_encode(array('success'=>false, 'msg'=>'fail'));
			}
	
			echo $result;
		}


    }

?>