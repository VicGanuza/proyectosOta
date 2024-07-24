<?php
require_once ('../include/header.php');
require "../inc/cuenta.php";
require_once '../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $user = $_GET['user'];

  $cuenta = new Cuenta();

  $access= $cuenta->getAccess($user);

  if(!$access) {
    http_response_code(400);
    echo json_encode(['message' => 'message.somethingWentWrong']);
  } else {
    echo json_encode($access);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
