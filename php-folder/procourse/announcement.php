<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    
    if($postjson['action'] == 'list_announcement') {


        $query = mysqli_query($conn, "SELECT * FROM tb_pro_announcement");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'an_id' => $read['an_id'],
                'an_title' => $read['an_title'],
                'an_detail' => $read['an_detail'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'announcement'=>$read_data));

        echo $result;

    }



?>