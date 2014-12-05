<?php
require_once 'JWTHelper.php';

$token = array();

$token['id'] = "1"; // putting hard coded right now but it can be dynamically from DB.
$token['email'] = "jay@example.com";

define("SECRET_SERVER_KEY", "tnyDML2b");

$encodedToken =  JWT::encode($token, SECRET_SERVER_KEY);

echo "JWT Token :::: " . $encodedToken . "\n";

// Asume you are sending back token in $_POST request
$_POST['encodedToken'] = $encodedToken;

$token = JWT::decode($_POST['encodedToken'], SECRET_SERVER_KEY);

echo "id ::::" . $token->id. "\n";
echo "email ::::" . $token->email. "\n";


/**
 * Output:
 * JWT Token :::: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJlbWFpbCI6ImpheUBleGFtcGxlLmNvbSJ9.c96sopKqTQtdtkl9nGMEUWZUNDchZDNYzAKdbj0a_GY
 * id ::::1
 * email ::::jay@example.com
 */
