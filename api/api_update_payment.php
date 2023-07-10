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
        $amount = $_POST['amount'];
        $paymentDate = $_POST['payment-date'];
       


        $res = $config->update_payment($id, $customerId, $amount, $paymentDate);

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