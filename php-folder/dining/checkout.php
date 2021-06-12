<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    
    // date_default_timezone_set('Asia/Kuala Lumpur');

    $order_status = 'Preparing';
    $current_time = date('Y-m-d H:i:s') ;

    echo $current_time;

    $student_id = $postjson['student_id'];
    $order_price = $postjson['totalPrice'];

    if($postjson['action'] == 'checkout') {

        //read item order
        $sql = "INSERT INTO tb_order(order_date,order_status,order_price,user_id)VALUES ('$current_time','$order_status','$order_price', '$student_id')";
        mysqli_query($conn, $sql);

        
        $sql2 = "SELECT * FROM tb_order WHERE order_id=(SELECT max(order_id) FROM tb_order)";
        $result = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_array($result); 
        $generated_order = $row['order_id'];

        $sql3 = "UPDATE tb_item_order SET order_id = '$generated_order',status = 'Paid' WHERE user_id='$student_id' AND status = 'In Cart'";
        mysqli_query($conn, $sql3);
    }

?>