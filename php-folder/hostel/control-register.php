<?php 
    include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

    // Kuota pengetua: To control the kuota pengetua
    if($postjson['action'] == 'check-register'){
        $query = mysqli_query($conn, "SELECT COUNT(*) FROM tb_hostel_reg WHERE student_id='A18CS1234' AND reg_phase = 1 ");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'registered' => $read['COUNT(*)'],
			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
		//echo $postjson[qty_dryer];
	    echo $result;
    }

	// Kuota Pengetua: To control the kuota pengetua
    if($postjson['action'] == 'check_kpstatus'){
        $query = mysqli_query($conn, "SELECT * FROM tb_hostel_reg WHERE student_id='A18CS1234' AND reg_phase = 1 ");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'status' => $read['reg_status'],
			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
		//echo $postjson[qty_dryer];
	    echo $result;
    }

	// Open Registration: First check whether the student have registered the kuota pengetua
/*	if($postjson['action'] == 'check_kp'){
        $query = mysqli_query($conn, "SELECT * FROM tb_hostel_reg WHERE student_id='A18CS1234' AND reg_phase = 1");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'status' => $read['reg_status'],
			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
		//echo $postjson[qty_dryer];
	    echo $result;
    }*/

	// Open Registration: To control the open-registration
	if($postjson['action'] == 'check_op'){
        $query = mysqli_query($conn, "SELECT COUNT(*) FROM tb_hostel_reg WHERE student_id='A18CS1234' AND reg_phase = 2 ");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'registered' => $read['COUNT(*)'],
			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
		//echo $postjson[qty_dryer];
	    echo $result;
    }

    // Open Registration: To control the open-registration
    if($postjson['action'] == 'checking'){
        $query = mysqli_query($conn, "SELECT * FROM tb_hostel_reg WHERE student_id='A18CS1234' AND reg_phase = 2");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'status' => $read['reg_status'],
			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
		//echo $postjson[qty_dryer];
	    echo $result;
    }

?>