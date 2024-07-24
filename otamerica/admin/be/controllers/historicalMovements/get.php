<?php

require_once('../../include/header.php');
require "../../inc/historical.php";
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $filtro = $_GET;

  $hist = new Historical();
  $history = (isset($filtro['id'])) ? $hist->getHistorical($filtro['id']) : $hist->search($filtro);

  if (!$history) {
    http_response_code(400);
    if (isset($filtro['id'])) {
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      echo json_encode(['message'=>'message.somethingWentWrong']);
    }
  } else {
    echo json_encode($history);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
