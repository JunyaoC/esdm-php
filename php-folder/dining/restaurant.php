<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    
    if($postjson['action'] == 'list_restaurant') {


        $query = mysqli_query($conn, "SELECT * FROM tb_restaurant");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'restaurant_name' => $read['restaurant_name'],
                'restaurant_address' => $read['restaurant_address'],
                'restaurant_status' => $read['restaurant_status'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'restaurant'=>$read_data));

        echo $result;

    }



?>