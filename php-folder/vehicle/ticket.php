<?php 
include "../connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['action']=='show_ticket'){
    $query = mysqli_query($conn,"SELECT * FROM tb_ticket");
    $read_data = array();
    while($read=mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $data=array(
            'id'=> $read['ticketID'],
            'ticket_uID'=> $read['ticket_uID'],
            'vehiclePlateNo'=> $read['vehiclePlateNo'],
            'ticketAmount'=> $read['ticketAmount'],
            'ticketDesc'=> $read['ticketDesc'],
        );
        array_push($read_data,$data);
    }
    $result = json_encode(array('success'=>true, 'msg'=>'success','ticket'=>$read_data));

    echo $result;
}
//echo "OK";
//echo "Theresa";
?>