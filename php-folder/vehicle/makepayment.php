<?php 
include "../connect.php";

$postjson = json_decode(file_get_contents('php://input'), true);
//$paymentID = $postjson['paymentID'];
$stuACID = $postjson['stuACID'];
//$stickerID = $postjson['stickerID'];
$vehicleID=$postjson['vehicleID'];
$paymentAmount = $postjson['paymentAmount'];
$paymentProve = $postjson['paymentProve'];
$paymentStatus = $postjson['paymentStatus'];
$today = date('Y-m-d');

if($postjson['action']=='addpayment'){
    $insert = mysqli_query($conn, "INSERT INTO tb_payment (stuACID, stickerID,paymentAmount,paymentDate,paymentProve,paymentStatus) 
    VALUES('$stuACID',(SELECT stickerID FROM tb_sticker WHERE tb_sticker.vehiclePlateNo = '$vehicleID'),'$paymentAmount','$today','$paymentProve','$paymentStatus')");
	
    if($insert) {
        $result = json_encode(array('success'=>true, 'msg'=>'success'));
    } else {
        $result = json_encode(array('success'=>false, 'msg'=>'fail'));
    }

    echo $result;
}

//paymentID = '$paymentID',
//, stickerID = '$stickerID'


?>