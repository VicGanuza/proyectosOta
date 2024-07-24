<?php
require_once('../include/Header.php');
require "../inc/cuenta.php";
require_once '../include/jwt_utils.php';
require_once '../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();

if ($access_allowed) {
  $data = $_POST;
  $cuenta = new Cuenta();

  $jwt = $cuenta->login($data);

  if(!$jwt) {
    http_response_code(401);
    echo json_encode(['message' => 'message.invalidUser']);
  } else {
    $access = $cuenta->getAccess($data);
    echo json_encode(['token' =>  $jwt, 'access'=>$access]);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}

