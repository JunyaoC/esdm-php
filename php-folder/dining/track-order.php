<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $order_id = $postjson['order_id'];

    // echo $restaurant_id;
    if($postjson['action'] == 'track_order') {

        //read item order
        $sql = "SELECT * FROM tb_order 
                LEFT JOIN tb_item_order ON tb_order.order_id = tb_item_order.order_id
                LEFT JOIN tb_food ON tb_food.food_id = tb_item_order.food_id
                LEFT JOIN tb_restaurant ON tb_food.restaurant_id = tb_restaurant.restaurant_id
                WHERE tb_order.order_id= '$order_id' ";

        $query = mysqli_query($conn, $sql);

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'restaurant_name'=> $read['restaurant_name'],
                'order_date' => $read['order_date'],   
                'restaurant_address'   => $read['restaurant_address'], 
                'food_totalprice'  => $read['order_price'], 
                'order_status' => $read['order_status'], 
            );
            array_push($read_data,$data);
        }


        $result = json_encode(array('success'=>true, 'msg'=>'success', 'order_item'=>$read_data));

        echo $result;

    }

?>