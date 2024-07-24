<?php
require ('../include/header.php');

require "../include/Functions.php";
require "../inc/offices.php";
error_log('en offices');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  /*$json = file_get_contents("php://input");
  $data = json_decode($json, true);*/
  echoResponse(200, '$data');
  /*$response = [];
  $offices = new Offices();

  $response = $offices->getOfficesList($data);

  echoResponse(200, $response);*/
}
?>
