<?php 

	include "../connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	// Check student already registered or not 
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

	// Add item to cart
    if($postjson['action'] == 'add-item'){
	  
			$qty_iron = $postjson['qty_iron'];
			$qty_dryer = $postjson['qty_dryer'];
			$qty_heater = $postjson['qty_heater'];
			$qty_charger = $postjson['qty_charger'];
			$qty_radio = $postjson['qty_radio'];
			$qty_toaster = $postjson['qty_toaster'];

			// Calculation of payment

			//Iron
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance WHERE item_name = 'Iron'");
			$row = mysqli_fetch_array($result);
			$item_id = $row['item_id'];
			$item_price = $row['item_price'];
			$iron = $item_price * $qty_iron;

			$in_iron = mysqli_query($conn, "INSERT INTO tb_hos_electric_register (student_id, item_id, item_quantity, item_price) 
			VALUES ('A18CS1234', $item_id, $qty_iron, $iron)");

			// Kettle
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance WHERE item_name = 'Water Heater/Electric Kettle'");
			$row = mysqli_fetch_array($result);
			$item_id = $row['item_id'];
			$item_price = $row['item_price'];
			$heater = $item_price * $qty_heater;

			$in_kettle = mysqli_query($conn, "INSERT INTO tb_hos_electric_register (student_id, item_id, item_quantity, item_price) 
			VALUES ('A18CS1234', $item_id, $qty_heater, $heater)");

			// Charger
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance WHERE item_name = 'Laptop/Handphone Charger'");
			$row = mysqli_fetch_array($result);
			$item_id = $row['item_id'];
			$item_price = $row['item_price'];
			$charger = $item_price * $qty_charger;

			$in_charger = mysqli_query($conn, "INSERT INTO tb_hos_electric_register (student_id, item_id, item_quantity, item_price) 
			VALUES ('A18CS1234', $item_id, $qty_charger, $charger)");

			// Toaster
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance WHERE item_name = 'Toaster'");
			$row = mysqli_fetch_array($result);
			$item_id = $row['item_id'];
			$item_price = $row['item_price'];
			$toaster = $item_price * $qty_toaster;

			$in_toaster = mysqli_query($conn, "INSERT INTO tb_hos_electric_register (student_id, item_id, item_quantity, item_price) 
			VALUES ('A18CS1234', $item_id, $qty_toaster, $toaster)");

			// Hair Dryer
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance WHERE item_name = 'Hair Dryer'");
			$row = mysqli_fetch_array($result);
			$item_id = $row['item_id'];
			$item_price = $row['item_price'];
			$dryer = $item_price * $qty_dryer;

			$in_dryer = mysqli_query($conn, "INSERT INTO tb_hos_electric_register (student_id, item_id, item_quantity, item_price) 
			VALUES ('A18CS1234', $item_id, $qty_dryer, $dryer)");

			// Radio
			$result = mysqli_query($conn, "SELECT * FROM tb_hos_electric_appliance WHERE item_name = 'Radio'");
			$row = mysqli_fetch_array($result);
			$item_id = $row['item_id'];
			$item_price = $row['item_price'];
			$radio = $item_price * $qty_radio;

			$in_dryer = mysqli_query($conn, "INSERT INTO tb_hos_electric_register (student_id, item_id, item_quantity, item_price) 
			VALUES ('A18CS1234', $item_id, $qty_radio, $radio)");


/*			while($row = $result->fetch_assoc()){
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
				}*/
			
				$total = $iron + $heater + $charger + $toaster + $dryer + $radio;
			

				$insert = mysqli_query($conn,"INSERT INTO tb_hos_electric_payment SET student_id = 'A18CS1234', payment_total='$total'");

				
				if($insert){
					$result = json_encode(array('success'=>true,'msg'=>'success'));
				}else{
					$result = json_encode(array('success'=>false,'msg'=>'fail'));
				}
				
				echo $result;


			   	

	}

	// Payment page: show the selected item and its quantity
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

	// show total price
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

	//Insert payment method
	if($postjson['action']== 'paymentMethod'){
		$today = date('Y-m-d');
		$query = mysqli_query($conn, "UPDATE tb_hos_electric_payment SET payment_method='$postjson[method]', payment_date='$today' WHERE student_id='A18CS1234'");
		
		// Update payment_id

		
		if($query){
			$result = json_encode(array('success'=>true,'msg'=>'success'));
		}else{
			$result = json_encode(array('success'=>false,'msg'=>'fail'));
		}
		
		$sql = mysqli_query($conn, "SELECT payment_id FROM tb_hos_electric_payment WHERE student_id='A18CS1234'");
		$row = mysqli_fetch_array($sql);
		$pid = $row['payment_id'];
		$sql_update = mysqli_query($conn, "UPDATE tb_hos_electric_register SET payment_id = $pid WHERE student_id='A18CS1234'");
		echo $result;
	}

	//Show the status (Payment history)
	if($postjson['action'] == 'check_status'){
		$query = mysqli_query($conn, "SELECT * FROM tb_hos_electric_payment WHERE student_id = 'A18CS1234'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'paydate'=> $read['payment_date'],
				 'paytotal'=> $read['payment_total'],
				 'payMethod' => $read['payment_method'],				 
				);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}

	//Show the status (Payment history)
	if($postjson['action'] == 'check_appliance'){
		$query = mysqli_query($conn, "SELECT register.item_quantity, electric.item_name FROM tb_hos_electric_register AS register 
		LEFT JOIN tb_hos_electric_appliance AS electric
		ON register.item_id = electric.item_id
		WHERE register.student_id = 'A18CS1234'");

		$read_data = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				'item_name' => $read['item_name'],
				'item_quantity' => $read['item_quantity'],
				 
				);
	            array_push($read_data,$data);
	        }

	    $result = json_encode(array('success'=>true,'msg'=>'success','detail'=>$read_data));
	    echo $result;
	}


?>