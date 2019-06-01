<?php

require 'database.php';

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
    //Extract the Data
    $request = json_decode($postdata);

    //Validate
    if(trim($request->number) === '' || (float)$request->amount < 0){
        return http_response_code(400);
    }

    //Sanitize
    $number = mysqli_real_escape_string($con, trim($request->number));
    $number = mysqli_real_escape_string($con, (int)$request->amount);

    //Create
    $sql = "INSERT INTO `policies`(`id`,`number`,`amount`) VALUES (null,'{$number}','{$amount}')";

    if(mysqli_query($con,$sql)){
        http_response_code(201);

        $policy = [
            'number' => $number,
            'amount' => $amount,
            'id' => mysqli_insert_id($con)
        ];

        echo json_encode($encode);
    } else {
        http_response_code(422);
    }
}