<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $food_id = $postjson['id'];
    $total_price = $postjson['total'];
    $item_quantity = $postjson['item_quantity'];
    $status = 'In Cart';
    $student_id = $postjson['student_id'];

    if($postjson['action'] == 'add_cart') {

        //read item order
        $sql = "INSERT INTO tb_item_order(food_id,user_id,item_quantity,totalprice,status)VALUES ('$food_id','$student_id','$item_quantity','$total_price','$status')";

        mysqli_query($conn, $sql);

        echo $food_id;
        echo $total_price;
        echo $item_quantity;
        echo $status;

    }

?>