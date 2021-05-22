<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $order_id = $postjson['id'];

    
    if($postjson['action'] == 'list_order') {

        //read item order
        $sql = "SELECT * FROM tb_item_order 
                -- LEFT JOIN tb_order ON tb_order.order_id=tb_item_order.order_id
                -- LEFT JOIN tb_food ON tb_food.food_id=tb_item_order.food_id
                -- LEFT JOIN tb_restaurant ON tb_restaurant.restaurant_id=tb_order.restaurant_id
                WHERE order_id='$order_id'";

        $query = mysqli_query($conn, $sql);

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
               // 'order_date' => $read['order_date'],
                // 'food_name' => $read['food_name'],       
                // 'restaurant_name' => $read['restaurant_name'],  
                // 'food_price' => $read['food_price'],
                // 'item_quantity' => $read['item_quantity'],
                'totalprice' => $read['totalprice']     
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'order'=>$read_data));

        echo $result;

    }


?>