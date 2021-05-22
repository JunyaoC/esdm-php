<?php   

    include "../connect.php";

    $postjson = json_decode(file_get_contents('php://input'), true);

    $id=$postjson['id'];
    if($postjson['action'] == 'list_procourse') {


        $query = mysqli_query($conn, "SELECT * FROM tb_pro_course WHERE procourse_code='$id'");

        $read_data = array();

        while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'procourse_code' => $read['procourse_code'],
                'procourse_name' => $read['procourse_name'],
                'procourse_type' => $read['procourse_type'],
                'procourse_objective' => $read['procourse_objective'],
                'procourse_learningOut' => $read['procourse_learningOut'],          
            );
            array_push($read_data,$data);
        }

        $result = json_encode(array('success'=>true, 'msg'=>'success', 'procourse'=>$read_data));

        echo $result;

    }

    if($postjson['action'] == 'list_section') {


        $query = mysqli_query($conn, "SELECT c.*,sc.* FROM tb_pro_course c 
        LEFT JOIN tb_procourse_section sc  ON sc.courseSec_courseID=c.procourse_code
        WHERE sc.courseSec_courseID='$id'");

        $read_data = array();
       
            while($read = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data = array(
                'courseSec_id' => $read['courseSec_id'],
                'courseSec_seat' => $read['courseSec_seat'],
                'courseSec_maxseat' => $read['courseSec_maxseat'],
            );
            array_push($read_data,$data);
             }
             $result = json_encode(array('success'=>true, 'msg'=>'success', 'section'=>$read_data));

            echo $result;
        
        

        

    }



?>