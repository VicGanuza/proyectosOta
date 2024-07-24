<?php

require_once('../../include/header.php');
require "../../inc/publicAccess.php";
require_once '../../inc/restrictedAccess.php';
require_once '../../include/write_log.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
escribirLog("========================================================================== \r\n");
escribirLog(date("d/m/Y - H:i:s.- ") . " Inicia el proceso. \r\n");
if ($access_allowed) {
  $data = $_GET;

  $publicAccess = new PublicAccess();

  escribirLog(date("d/m/Y - H:i:s.- ") ." Data: ". json_encode($data)." \r\n");

  $pa = isset($data['id']) ? $publicAccess->get($data['id']) : $publicAccess->get();
  escribirLog(date("d/m/Y - H:i:s.- ") ." Result: ". json_encode($pa)." \r\n");

  if (!$pa) {
    http_response_code(400);
    if (isset($data['id'])) {
      echo json_encode(['message' => 'message.registerDoesntExists']);
    } else {
      echo json_encode(['message'=>'message.somethingWentWrong']);
    }
  } else {
    echo json_encode($pa);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}
