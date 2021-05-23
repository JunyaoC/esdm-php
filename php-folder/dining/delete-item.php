<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);
    $itemorder_id = $postjson['id'];


    if($postjson['action'] == 'delete') {

        //read item order
        $sql = "DELETE FROM tb_item_order WHERE itemorder_id = '$itemorder_id'";
        mysqli_query($conn, $sql);

    }

?>