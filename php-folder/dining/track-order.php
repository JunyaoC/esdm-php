<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $order_id = $postjson['order_id'];

    // echo $restaurant_id;
    if($postjson['action'] == 'track_order') {

        //read item order
        $sql = "SELECT * FROM tb_order WHERE order_id= '$order_id' ";

        $query = mysqli_query($conn, $sql);

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
               'order_date' => $read['order_date'],      
            );
            array_push($read_data,$data);
        }


        $result = json_encode(array('success'=>true, 'msg'=>'success', 'order_item'=>$read_data));

        echo $result;

    }

?>