<?php 
include "../connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);
$stuACID = $postjson['stuACID'];
$stickerID = $postjson['stickerID'];
$vehicleID=$postjson['vehicleID'];
$paymentAmount = $postjson['paymentAmount'];
$paymentProve = $postjson['paymentProve'];
$paymentStatus = $postjson['paymentStatus'];
$today = date_format(date_create("+1 year"), 'Y-m-d');

if($postjson['action']=='renew_sticker'){
    //Check if the sticker exist
    $exist_check = mysqli_query($conn, "SELECT * FROM tb_sticker WHERE stickerID = '$stickerID' AND stickerStatus='Rejected'");

	$row_cnt = mysqli_num_rows($exist_check);
    
    if($row_cnt > 0){
        $insert = mysqli_query($conn, "INSERT INTO tb_payment (stuACID, stickerID, paymentAmount,paymentDate,paymentProve,paymentStatus) 
    VALUES('$stuACID',(SELECT stickerID FROM tb_sticker WHERE tb_sticker.vehiclePlateNo = '$vehicleID'),'$paymentAmount','$today','$paymentProve','$paymentStatus')");
	
		if($insert) {
			$result = json_encode(array('success'=>true, 'msg'=>'success'));
		} else {
			$result = json_encode(array('success'=>false, 'msg'=>'fail'));
		}
	
		echo $result;
    }
    else
    {
        $result = json_encode(array('success'=>false, 'msg'=>'Sticker does not exist or still valid'));
        echo $result;
    }
}
//echo "OK";
//echo "Theresa";
?>