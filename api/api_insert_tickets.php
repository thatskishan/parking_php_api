<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $customerId = $_POST['customer_id'];
        $vehicleId = $_POST['vehicle_id'];
        $startTime = $_POST['start_time'];
        $endTime = $_POST['end_time'];

        $res = $config->insert_parking_tickets($customerId, $vehicleId, $startTime, $endTime);

        if($res){
            $arr['data'] = "Record Inserted Successfully....";
            http_response_code(201);
        }   else{
                $arr['data'] = "Record Insertion failed...";
        }
        
    } else {
            $arr['msg']="Only Post HTTP request method is allowed...";
    }

        echo json_encode($arr);



?>