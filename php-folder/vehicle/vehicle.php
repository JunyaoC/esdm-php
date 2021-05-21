<?php 
include "../connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['action']=='show_history'){
    $query = mysqli_query($conn,"SELECT * FROM tb_sticker");
    $read_data = array();
    while($read=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $data=array(
            'id'=> $read['stickerID'],
            'vehiclePlateNo'=> $read['vehiclePlateNo'],
            'stickerCollege'=> $read['stickerCollege'],
            'stickerDate'=> $read['stickerDate'],
            'stickerStatus'=> $read['stickerStatus'],
        );
        array_push($read_data,$data);
    }
    $result = json_encode(array('success'=>true, 'msg'=>'success','vehicle'=>$read_data));

    echo $result;
}
//echo "OK";
//echo "Theresa";
?>