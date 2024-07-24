<?php

require_once('../../include/header.php');
require "../../inc/office.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_GET;

  $office = new Office();
  $of = $office->get($data);

  if (!$of) {
    http_response_code(400);
    if (isset($data['id'])) {
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      echo json_encode(['message'=>'message.somethingWentWrong']);
    }
  } else {
    echo json_encode($of);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
