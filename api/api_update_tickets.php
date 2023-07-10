<?php

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH") {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);

        $customerId = $_POST['customer_id'];
        $vehicleId = $_POST['vehicle_id'];
        $startTime = $_POST['start_time'];
        $endTime = $_POST['end_time'];
        $id = $_UPDATE['id'];

        $res = $config->update_parking_tickets($id, $customerId, $vehicleId, $startTime, $endTime);

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