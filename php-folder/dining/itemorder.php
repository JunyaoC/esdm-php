<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $order_id = $postjson['id'];

    
    if($postjson['action'] == 'list_order') {

        //read item order
        $sql = "SELECT * FROM tb_item_order 
                -- LEFT JOIN tb_order ON tb_order.itemorder_id=tb_item_order.itemorder_id
                LEFT JOIN tb_food ON tb_food.food_id=tb_item_order.food_id
                WHERE order_id='$order_id'";

        $sql2 = "SELECT * FROM tb_order AS ord
                LEFT JOIN tb_item_order ON tb_item_order.order_id=ord.order_id
                LEFT JOIN tb_food ON tb_food.food_id=tb_item_order.food_id
                LEFT JOIN tb_restaurant ON tb_food.restaurant_id=tb_restaurant.restaurant_id
                LEFT JOIN tb_student ON tb_student.u_id = ord.user_id
                WHERE ord.order_id='$order_id'";

        $query = mysqli_query($conn, $sql);
        $query2= mysqli_query($conn, $sql2);

        $read_data = array();
        $read_data2 = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
               // 'order_date' => $read['order_date'],
                 'food_id' => $read['food_id'], 
                'food_name' => $read['food_name'],       
                // 'restaurant_name' => $read['restaurant_name'],  
                'food_price' => $read['food_price'],
                'item_quantity' => $read['item_quantity'],
                'totalprice' => $read['totalprice']     
            );
            array_push($read_data,$data);
        }

        while($read = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
            $data = array(
                'food_id' => $read['food_id'], 
               'order_date' => $read['order_date'],   
                'restaurant_name' => $read['restaurant_name'],
                'order_price'=>$read['order_price'],
                'student_name'=>$read['student_name'],
                'student_matric'=>$read['student_matric'],
                'student_email'=>$read['student_email']
                   
            );
            array_push($read_data2,$data);
        }


        $result = json_encode(array('success'=>true, 'msg'=>'success', 'order'=>$read_data, 'order2'=>$read_data2));

        echo $result;

    }


?>