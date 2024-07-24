<?php
require_once ('../include/header.php');
require "../inc/location.php";
require_once '../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $loc = new Location();

  $locations= $loc->get();

  if(!$locations) {
    http_response_code(400);
    echo json_encode(['message'=>'message.somethingWentWrong']);
  } else {
    echo json_encode($locations);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}