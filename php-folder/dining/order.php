<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    
    if($postjson['action'] == 'list_order') {

        //read item order
        $sql = "SELECT * FROM tb_item_order
                LEFT JOIN tb_food ON tb_food.food_id = tb_item_order.food_id
                LEFT JOIN tb_order ON tb_order.order_id = tb_item_order.order_id
                WHERE itemorder_id='2'";

        $query = mysqli_query($conn, $sql);
        $read = mysqli_fetch_array($query, MYSQLI_ASSOC);


        //read restaurant
        $rid = $read['restaurant_id'];
        $sql2 = "SELECT * FROM tb_restaurant WHERE restaurant_id = '$rid'";
        $query2 = mysqli_query($conn, $sql2);
        $read2 = mysqli_fetch_array($query2, MYSQLI_ASSOC);


        //food image hold

        $read_data = array();

        $data = array(
             'restaurant_name' => $read2['restaurant_name'],   
            // 'restaurant_address' => $read2['restaurant_address'],           
            'order_date' => $read['order_date'],
            // 'order_status' => $read['order_status'],
            'item_quantity' => $read['item_quantity'],
            'food_totalprice' => $read['totalprice'],  
             'food_name' => $read['food_name'],       
        );


        array_push($read_data,$data);


        $result = json_encode(array('success'=>true, 'msg'=>'success', 'order'=>$read_data));

        echo $result;

    }

?>