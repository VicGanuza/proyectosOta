<?php
require_once ('../../include/header.php');
require "../../inc/publicAccess.php";
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {

  $data = $_POST;
  $document = new PublicAccess();
  $doc = $document->getByName($data['name']);

  if (count($doc) > 0) {
    http_response_code(400);
    echo json_encode(['message' => 'documentAdmin.nameAlreadyInUse']);
  } else {
    $id = $document->create($data);
    if ($id) {
      $filename = $_FILES['file']['name'];
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      $file = new Files();
      $folder = 'brasil/public_access/';

      $name = $file->save($filename, $folder);
      if ($name) {
        $data['id'] = $id;
        if ($extension === 'pdf') {
          $data['pdf'] = $name;
        } else{
          $data['excel'] = $name;
        }

        $d = $document->edit($data);
        echo json_encode(['message' => 'message.recordSaved']);
      } else {
        $document->remove($id);
        http_response_code(400);
        echo json_encode(['message' => 'message.troublesWithFileSaving']);
      }
    } else {
      http_response_code(400);
      echo json_encode(['message' => 'message.troublesWithRecordSaving']);
    }
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}

