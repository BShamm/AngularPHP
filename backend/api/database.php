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
define('DB_HOST','YOUR DB HOST');
define('DB_USER','YOUR DB USERNAME');
define('DB_PASS','YOUR DB PASSWORD');
define('DB_NAME','YOUR DB NAME');


function connect() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(mysqli_connect_errno($connect)){
        die("Failed to connect " . mysqli_connect_error());
    }

    mysqli_set_charset($connect, "utf8");

    return $connect;

}

$con = connect();
