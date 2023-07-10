<?php

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH") {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);

        $id = $_UPDATE['id'];
        $customerId = $_POST['customer_id'];
        $licensePlate = $_POST['license_plate'];
        $model = $_POST['model'];
       


        $res = $config->update_vehicles($id, $customerId, $licensePlate, $model);

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