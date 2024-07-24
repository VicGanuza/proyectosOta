<?php
require_once ('../../include/header.php');
require "../../inc/user.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_POST;

  $user = new User();
  $fil = ['username'=>$data['username']];
  $us = $user->get($fil);
  if (count($us) > 0) {
    http_response_code(400);
    echo json_encode(['message' => 'userForm.userAlreadyCreated']);
  } else {
    $id = $user->create($data);
    if ($id) {
      echo json_encode(['message' => 'message.recordSaved']);
    } else {
      http_response_code(400);
      echo json_encode(['message' => 'message.troublesWithRecordSaving']);
    }
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}

