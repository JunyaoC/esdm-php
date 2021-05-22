<?php 
include "../connect.php";

$postjson = json_decode(file_get_contents('php://input'), true);
//$paymentID = $postjson['paymentID'];
$stuACID = $postjson['stuACID'];
$stickerID = $postjson['stickerID'];
$paymentAmount = $postjson['paymentAmount'];
$paymentDate = $postjson['paymentDate'];
$paymentProve = $postjson['paymentProve'];
$paymentStatus = $postjson['paymentStatus'];

if($postjson['action']=='addpayment'){
    $insert = mysqli_query($conn, "INSERT INTO tb_payment SET stuACID = '$stuACID', stickerID = '$stickerID', paymentAmount = '$paymentAmount', paymentDate = '$paymentDate',paymentProve = '$paymentProve',paymentStatus = '$paymentStatus'");
	
    if($insert) {
        $result = json_encode(array('success'=>true, 'msg'=>'success'));
    } else {
        $result = json_encode(array('success'=>false, 'msg'=>'fail'));
    }

    echo $result;
}

//paymentID = '$paymentID',


?>