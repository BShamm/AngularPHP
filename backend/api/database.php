<?php
/*
 * Add response headers and the Allowed methods
 * Note: Setting CORS to * will allow your PHP server to accept requests from another domain!
 * Allowing it to not get blocked by the Same Origin Policy
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT,GET,POST,DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type,Accept");

/*
 * Variables that hold DB credentials
 */
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','swimmyCfcrgr8');
define('DB_NAME','mydb');


function connect() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno($connect)){
        die("Failed to connect " . mysqli_connect_error());
    }

    mysqli_set_charset($connect, "utf8");

    return $connect;

}

$con = connect();