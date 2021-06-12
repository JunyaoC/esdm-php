<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);
	// $uid = $postjson['u_id'];
	if($postjson['action'] == 'phase_period') {
		$today = date('Y-m-d');

		$query = mysqli_query($conn, "SELECT * FROM tb_hos_phase");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'phase_id'=> $read['phase_id'],
				 'start_date'=> $read['start_date'],
				 'end_date'=> $read['end_date'],
				 'phase_name'=> $read['phase_name'],
				 'today'=> $today,
				 

			);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}

?>