<?php

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH") {

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_UPDATE['id'];


        $res = $config->update_customers($id, $name, $email, $phone);

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