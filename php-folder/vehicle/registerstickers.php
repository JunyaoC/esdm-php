<?php 
 include "../connect.php";

 $postjson = json_decode(file_get_contents('php://input'), true);
 $stickerID = $postjson['stickerID'];
 $vehiclePlateNo = $postjson['vehiclePlateNo'];
 $stickerCollege = $postjson['stickerCollege'];
 $stickerDate = $postjson['stickerDate'];
 $stickerStatus = $postjson['stickerStatus'];
 $stickerFee = $postjson['stickerFee'];

 if($postjson['action'] == 'addsticker'){

    //Run checking if the car plate exist

    // $exist_check = mysqli_query($conn, "SELECT * FROM tb_sticker
    // LEFT JOIN tb_vehicle ON tb_sticker.vehiclePlateNo = tb_vehicle.vehicleID
    // WHERE vehiclePlateNo = '$vehiclePlateNo'");

   // $row_cnt = mysqli_num_rows($exist_check);

    // if($row_cnt > 0){
    //     $result = json_encode(array('success'=>false, 'msg'=>'Car plate exist'));
    //     echo $result;
    // }else{
        $insert = mysqli_query($conn, "INSERT INTO tb_sticker SET stickerID = '$stickerID', vehiclePlateNo = '$vehiclePlateNo', stickerCollege = '$stickerCollege', stickerDate = '$stickerDate', stickerStatus = '$stickerStatus', stickerFee='$stickerFee'");

        if($insert) {
            $result = json_encode(array('success'=>true, 'msg'=>'success'));
        } else {
            $result = json_encode(array('success'=>false, 'msg'=>'fail'));
        }

        echo $result;
    }




?>