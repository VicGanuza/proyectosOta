<?php
require_once ('../../include/header.php');
require "../../inc/regulations.php";
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {

  $data = $_POST;

  $document = new Regulations();
  $doc = $document->getByName($data['name']);
  error_log(json_encode($doc));

  if ($doc && ($doc['id'] != $data['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'documentAdmin.nameAlreadyInUse']);
  } else {
    if (count($_FILES) > 0) {
      $filename = $_FILES['file']['name'];
      $file = new Files();
      $folder = 'regulations/';

      $name = $file->save($filename, $folder);
      if ($name) {
        $data['url'] = $name;
        $d = $document->edit($data);
        echo json_encode(['message' => 'message.recordSaved']);
      } else {
        http_response_code(400);
        echo json_encode(['message' => 'message.troublesWithFileSaving']);
      }
    } else {
      $d = $document->edit($data);
      echo json_encode(['message' => 'message.recordSaved']);
    }

  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}



