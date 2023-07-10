<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include("../config/config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $capacity = $_POST['capacity'];


        $res = $config->insert_parking($name, $capacity);

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