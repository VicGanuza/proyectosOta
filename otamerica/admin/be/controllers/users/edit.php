<?php

require_once('../../include/header.php');
require "../../inc/user.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_POST;

  $user = new User();

  $reg = $user->getByUsername($data['username']);

  if ($reg && ($reg['id'] != $data['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'userForm.userAlreadyCreated']);
  } else {
    $us = $user->getById($data['id']);
    if (!$us) {
      http_response_code(400);
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      if (isset($data['newPassword'])) {
        $same = $user->samePass($data['id'], $data['password']);
        if ($same) {
          $newUser = $user->edit($data);
          echo json_encode(['message' => 'message.recordSaved']);
        }  else {
          http_response_code(400);
          echo json_encode(['message' => 'message.userOrPasswordIncorrect']);
        }
      } else {
        $newUser= $user->edit($data);
        if (isset($newUser)){
          echo json_encode(['message' => 'message.recordSaved']);
        } else {
          http_response_code(400);
          echo json_encode(['message' => 'message.troublesWithRecordSaving']);
        }
      }
    }
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
