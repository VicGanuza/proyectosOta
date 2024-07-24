<?php

require_once('../../include/header.php');
require "../../inc/regulations.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $filtro = $_GET;

  $pol = new Regulations();
  $policies = $pol->get($filtro);

  /*if (!$policies) {
    http_response_code(400);
    if (isset($filtro['id'])) {
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      echo json_encode(['message'=>'message.somethingWentWrong']);
    }
  } else {*/
  echo json_encode($policies);
  //}
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
