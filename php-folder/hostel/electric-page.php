<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'checkStudent'){
		$query = mysqli_query($conn, "SELECT COUNT(*) FROM tb_hos_electric_payment WHERE student_id = 'A18CS1234'");
		//$query2 = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment WHERE student_id='A18CS1234'");
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'count'=> $read['COUNT(*)'],

			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}

    if($postjson['action'] == 'add-item'){
	  
			$qty_iron = $postjson['qty_iron'];
			$qty_dryer = $postjson['qty_dryer'];
			$qty_heater = $postjson['qty_heater'];
			$qty_charger = $postjson['qty_charger'];
			$qty_radio = $postjson['qty_radio'];
			$qty_toaster = $postjson['qty_toaster'];

			// Calculation of payment
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance");
			while($row = $result->fetch_assoc()){
				$item=$row['item_name'];
				
				if($item = 'Iron'){
					$sql_run = mysqli_query($conn,"SELECT item_price FROM tb_hos_electric_appliance WHERE item_name = '$item'");
					$price = mysqli_fetch_array($sql_run);
					$iron = $price['item_price'] * $qty_iron;
				}				
				if($item = 'Water Heater/Electric Kettle'){
					$sql_run = mysqli_query($conn,"SELECT item_price FROM tb_hos_electric_appliance WHERE item_name = '$item'");
					$price = mysqli_fetch_array($sql_run);
					$heater = $price['item_price'] * $qty_heater;
				}
				if($item = 'Laptop/Handphone Charger'){
					$sql_run = mysqli_query($conn,"SELECT item_price FROM tb_hos_electric_appliance WHERE item_name = '$item'");
					$price = mysqli_fetch_array($sql_run);
					$charger = $price['item_price'] * $qty_charger;
				}
				if($item = 'Toaster'){
					$sql_run = mysqli_query($conn,"SELECT item_price FROM tb_hos_electric_appliance WHERE item_name = '$item'");
					$price = mysqli_fetch_array($sql_run);
					$toaster = $price['item_price'] * $qty_toaster;
				}
				if($item = 'Hair Dryer'){
					$sql_run = mysqli_query($conn,"SELECT item_price FROM tb_hos_electric_appliance WHERE item_name = '$item'");
					$price = mysqli_fetch_array($sql_run);
					$dryer = $price['item_price'] * $qty_dryer;
				}
				if($item = 'Radio'){
					$sql_run = mysqli_query($conn,"SELECT item_price FROM tb_hos_electric_appliance WHERE item_name = '$item'");
					$price = mysqli_fetch_array($sql_run);
					$radio = $price['item_price'] * $qty_radio;
				}
			
				$total = $iron + $heater + $charger + $toaster + $dryer + $radio;
			

				$insert = mysqli_query($conn,"INSERT INTO tb_hos_electric_payment SET iron = '$postjson[qty_iron]',
				dryer = '$postjson[qty_dryer]', kettle = '$postjson[qty_heater]',charger = '$postjson[qty_charger]',
				radio = '$postjson[qty_radio]', toaster = '$postjson[qty_toaster]',student_id = 'A18CS1234', payment_total='$total'");

				
				if($insert){
					$result = json_encode(array('success'=>true,'msg'=>'success'));
				}else{
					$result = json_encode(array('success'=>false,'msg'=>'fail'));
				}
				
				echo $result;


			}    	

	}

	if($postjson['action'] == 'list_electric'){
		$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance");
		//$query2 = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment WHERE student_id='A18CS1234'");
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

	if($postjson['action'] == 'totalprice'){
	/*	$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment 
		WHERE dryer='$postjson[qty_dryer]' AND iron='$postjson[qty_iron]'
		AND toaster='$postjson[qty_toaster]'AND kettle='$postjson[qty_heater]'AND
		charger='$postjson[charger]'AND radio='$postjson[radio]'");*/

		$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment WHERE student_id='A18CS1234'");
		
		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			
				$data = array(
					'total_price' => $read['payment_total'],
			   );
				   array_push($read_data,$data);			
	    }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
		//echo $postjson[qty_dryer];
	    echo $result;
	}

	if($postjson['action']== 'paymentMethod'){
		$today = date('Y-m-d');
		$query = mysqli_query($conn, "UPDATE tb_hos_electric_payment SET payment_method='$postjson[method]', payment_date='$today' WHERE student_id='A18CS1234'");
		
		if($query){
			$result = json_encode(array('success'=>true,'msg'=>'success'));
		}else{
			$result = json_encode(array('success'=>false,'msg'=>'fail'));
		}
		
		echo $result;
	}

	if($postjson['action'] == 'check_status'){
		$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment WHERE student_id = 'A18CS1234'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'paydate'=> $read['payment_date'],
				 'paytotal'=> $read['payment_total'],
				 'dryer' => $read['dryer'],
				 'iron' => $read['iron'],
				 'toaster' => $read['toaster'],
				 'kettle' => $read['kettle'],
				 'charger' => $read['charger'],
				 'radio' => $read['radio'],
				 'payMethod' => $read['payment_method'],
				 
				);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}
?>