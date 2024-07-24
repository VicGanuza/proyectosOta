<?php

require_once('../../include/header.php');
require "../../inc/user.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $filtro = $_GET;

  $user = new User();

  $users = $user->get($filtro);

  if (!$users) {
    http_response_code(400);
    if (isset($filtro['id'])) {
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      echo json_encode(['message'=>'message.somethingWentWrong']);
    }
  } else {
    if (isset($filtro['id'])) {
      echo json_encode($users[0]);
    } else echo json_encode($users);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
