<?php

require_once('../../include/header.php');
require "../../inc/document.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_GET;

  $document = new Document();
  $doc = $document->get($data);

  if (!$doc) {
    http_response_code(400);
    if (isset($data['id'])) {
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      echo json_encode(['message'=>'message.somethingWentWrong']);
    }
  } else {
    echo json_encode($doc);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
