<?php

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH") {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);

        $levelId = $_POST['level_id'];
        $spaceNumber = $_POST['space_number'];
        $status = $_POST['status'];
        $id = $_UPDATE['id'];


        $res = $config->update_parking_space($levelId, $spaceNumber, $status, $id);

        if($res){
            $arr['data'] = "Record Update Succssfully...";
        }else{
            $arr['data'] = "Record Updation Failed...";
        }
        
    } else {
            $arr['msg']="Only PUT or PATCH HTTP request method is allowed...";
    }

        echo json_encode($arr);
?>