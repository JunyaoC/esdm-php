<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $food_id = $postjson['id'];

    // echo $restaurant_id;
    if($postjson['action'] == 'list_food') {

        //read item order
        $sql = "SELECT * FROM tb_food LEFT JOIN tb_restaurant ON tb_restaurant.restaurant_id = tb_food.restaurant_id  WHERE food_id='$food_id'";

        $query = mysqli_query($conn, $sql);

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'food_id' => $read['food_id'],
               'food_name' => $read['food_name'],
                'food_description' => $read['food_description'],       
                'food_price' => $read['food_price'],    
                'restaurant_name' => $read['restaurant_name'],   
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'food'=>$read_data));

        echo $result;

    }

?>