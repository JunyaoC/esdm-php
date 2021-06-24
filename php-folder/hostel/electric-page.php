<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);


	// Payment page: show the selected item and its quantity
	if($postjson['action'] == 'list_electric'){
		$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'item_name'=> $read['item_name'],
					'item_price'=> $read['item_price'],

			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}


	//Insert payment method
	if($postjson['action']== 'paymentMethod'){
		$today = date('Y-m-d');
		$iron = $postjson['iron'];
		$dryer = $postjson['dryer'];
		$heater = $postjson['heater'];
		$charger = $postjson['charger'];
		$radio = $postjson['radio'];
		$toaster = $postjson['toaster'];
		$amt = $iron + $heater + $charger + $toaster + $dryer + $radio;

		// Get student matric
		$query1 = mysqli_query($conn, "SELECT * FROM tb_student WHERE u_id = '$postjson[student_id]'");
		$run_q = mysqli_fetch_array($query1);
		$matric = $run_q['student_matric'];

		if($postjson['method'] != ""){
			$query = mysqli_query($conn, "INSERT INTO tb_hos_electric_payment (student_id,payment_total,payment_method,payment_date,item_amt,iron,dryer,charger,toaster,heater,radio)VALUES ('$matric','$postjson[total]','$postjson[method]','$today',$amt,$iron,$dryer,$charger,$toaster,$heater,$radio)");
				
				
				if($query){
					$result = json_encode(array('success'=>true,'msg'=>'success'));
				}else{
					$result = json_encode(array('success'=>false,'msg'=>'fail'));
				}
				echo $result;
			}
	}

	//Show the status (Payment history)
	if($postjson['action'] == 'check_status'){
		$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment 
		INNER JOIN tb_student ON tb_hos_electric_payment.student_id = tb_student.student_matric 
		WHERE tb_student.u_id = '$postjson[student_id]'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'paydate'=> $read['payment_date'],
				 'paytotal'=> $read['payment_total'],
				 'payMethod' => $read['payment_method'],
				 'amt' => $read['item_amt'],
				 'iron' => $read['iron'],
				 'heater' => $read['heater'],	
				 'charger' => $read['charger'],					 
				 'dryer' => $read['dryer'],	
				 'toaster' => $read['toaster'],	
				 'radio' => $read['radio'],	
				);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}



?>