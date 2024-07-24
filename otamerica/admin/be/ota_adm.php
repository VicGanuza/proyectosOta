<?php
require_once 'inc/restrictedAccess.php';
include __DIR__ . "/common/config.php";

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();

if ($access_allowed) {
  header("Location: ".$config['site']);

}else {
  http_response_code(405);
  header("Location: ".$config['site']."/#/restrictedAccess");
  echo json_encode(['message' => 'message.restrictedAccess']);
}