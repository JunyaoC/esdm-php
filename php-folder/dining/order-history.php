<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    
    if($postjson['action'] == 'list_orderhistory') {


        $query = mysqli_query($conn, "SELECT * FROM tb_order AS ord
                -- LEFT JOIN tb_item_order AS iord ON iord.order_id=ord.order_id
                -- LEFT JOIN tb_food ON tb_food.food_id=iord.food_id
                -- LEFT JOIN tb_restaurant ON tb_food.restaurant_id=tb_restaurant.restaurant_id
                WHERE ord.order_price!= '' 
                ORDER BY order_status DESC
                                        ");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                // 'restaurant_name' => $read['restaurant_name'],
                'order_date' => $read['order_date'],
                'order_status' => $read['order_status'],
                'order_price' => $read['order_price'],
                'order_id' => $read['order_id']          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'orderhistory'=>$read_data));

        echo $result;

    }



?>