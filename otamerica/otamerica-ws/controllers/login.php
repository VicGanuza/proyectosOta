<?php
require_once ('../include/header.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
http_response_code(400);
echo json_encode(array('error' => 'Invalid User'));

/*
require "../include/Functions.php";
require "../inc/cuenta.php";

require_once '../include/jwt_utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get posted data
  $data = json_decode(file_get_contents("php://input", true));
  $json = file_get_contents("php://input");
  $data = json_decode($json, true);
  echo json_encode(array('user' =>  $data));

  $response = [];
  $cuenta = new Cuenta();

  $jwt = $cuenta->login($data);

  if(!$jwt) {
    echo json_encode(array('error' => 'Invalid User'));
  } else {
    echo json_encode(array('token' =>  $jwt));
 }

}*/

