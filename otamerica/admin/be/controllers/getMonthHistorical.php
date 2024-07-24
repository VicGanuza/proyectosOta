<?php
require_once ('../include/header.php');
require "../inc/historical.php";
require_once '../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $year = $_GET['y'];

  $hist = new Historical();
  $history= $hist->getMonths($year);

  if(!$history) {
    http_response_code(400);
    echo json_encode(['message' => 'message.somethingWentWrong']);
  } else {
    echo json_encode($history);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}

