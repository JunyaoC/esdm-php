<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    
    if($postjson['action'] == 'list_procourse') {


        $query = mysqli_query($conn, "SELECT * FROM tb_pro_course");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'procourse_code' => $read['procourse_code'],
                'procourse_name' => $read['procourse_name'],
                'procourse_type' => $read['procourse_type'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'procourse'=>$read_data));

        echo $result;

    }



?>