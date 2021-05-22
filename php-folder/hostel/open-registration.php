<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'list_college') {

		$query = mysqli_query($conn, "SELECT * FROM tb_hos_college");
		$read_college = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'kolej_id'=> $read['kolej_id'],
				'kolej_name' => $read['kolej_name'],

			);
	            array_push($read_college,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','colleges'=>$read_college));
	    echo $result;
	}

	    if($postjson['action'] == 'select_college'){
			
	    	$insert = mysqli_query($conn,"INSERT INTO tb_hostel_reg SET reg_phase=2, reg_status=0, hostel_id = '$postjson[kolej_id]'");
	    	
	    	if($insert){
	    		$result = json_encode(array('success'=>true,'msg'=>'success'));
	    	}else{
				$result = json_encode(array('success'=>false,'msg'=>'fail'));
	    	}
	    	
			echo $result;

	    }
?>