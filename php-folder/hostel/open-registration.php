<?php 

	include "./connect.php";
	$postjson = json_decode(file_get_contents('php://input'), true);

	if($postjson['action'] == 'list_college') {
		$u_id = $postjson['u_id'];
		$query = mysqli_query($conn, "SELECT * FROM tb_college");

		$read_college = array();

		while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data = array(
				 'kolej_id'=> $read['kolej_id'];
				'kolej_name' => $read['kolej_name'];
			);
	            array_push($read_college,$data);
	        }
	        $result = json_encode(array('success'=>true,'msg'=>'success','colleges'=>$read_college))

	        echo $result;}
?>