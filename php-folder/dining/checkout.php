<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
   
    $order_status = 'Preparing';
    $user_id = '2';

    if($postjson['action'] == 'checkout') {

        //read item order
        $sql = "INSERT INTO tb_order(order_status,user_id)VALUES ('$order_status','$user_id')";
        mysqli_query($conn, $sql);


        $sql2 = "SELECT * FROM tb_order WHERE order_id=(SELECT max(order_id) FROM tb_order)";
        $result = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($result); 
        $generated_order = $row['order_id'];

        $sql3 = "UPDATE tb_item_order SET order_id = '$generated_order',status = 'Paid' WHERE user_id='$user_id' AND status = 'In Cart'";
        mysqli_query($conn, $sql3);
    }

?>