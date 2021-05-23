<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
   // $user_id = $postjson['id'];

    if($postjson['action'] == 'list_cart') {

        //read item order
        $sql = "SELECT * FROM tb_item_order 
                LEFT JOIN tb_food ON tb_item_order.food_id = tb_food.food_id
                LEFT JOIN tb_restaurant ON tb_food.restaurant_id = tb_restaurant.restaurant_id
                WHERE tb_item_order.user_id='2' AND tb_item_order.status='In Cart'";

        $query = mysqli_query($conn, $sql);

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'item_quantity' => $read['item_quantity'],
               'food_name' => $read['food_name'],
                'restaurant_name' => $read['restaurant_name'],       
                'food_price' => $read['totalprice'],      
                'itemorder_id' => $read['itemorder_id'],    
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'cart'=>$read_data));

        echo $result;

    }

?>