<?php 
include "../connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['action']=='show_record'){
    $query = mysqli_query($conn,"SELECT * FROM tb_sticker LEFT JOIN tb_vehicle ON tb_sticker.vehiclePlateNo=tb_vehicle.vehicleID");
    $read_data = array();
    while($read=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $data=array(
            'id'=> $read['stickerID'],
            'vehiclePlateNo'=> $read['vehiclePlateNo'],
            'vehicleModel'=> $read['vehicleModel'],
            'vehicleColor'=> $read['vehicleColor'],
            'vehicleType'=> $read['vehicleType'],
        );
        array_push($read_data,$data);
    }
    $result = json_encode(array('success'=>true, 'msg'=>'success','record'=>$read_data));

    echo $result;
}
//echo "OK";
//echo "Theresa";
?>