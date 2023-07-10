<?php

    header("Access-Control-Allow-Methods: DELETE");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $input = file_get_contents('php://input');

        parse_str($input, $_DELETE);

        $id = $_DELETE['id'];

        $res = $config->delete_vehicles($id);

        if($res){
            $arr['data'] = "Record Deleted Succssfully...";
        }else{
            $arr['data'] = "Record Deletion Failed...";
        }
        
    } else {
            $arr['msg']="Only DELETE HTTP request method is allowed...";
    }

        echo json_encode($arr);



?>