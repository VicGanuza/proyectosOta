<?php
require_once ('../../include/header.php');
require "../../inc/certificate.php";
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_POST;

  $certificate = new Certificate();
  $cert = $certificate->get($data);

  if ((count($cert) > 0) && ($cert['id'] != $data['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'fileForm.historyAlreadyCreated']);
  } else {
    if ($cert) {
      $filename = $_FILES['file']['name'];
      $file = new Files();
      $folder = $cert['country'].'/certificates/';
      $nName = $data['region'].'_Certificate_'.$data['name'];
      $name = $file->save($filename, $folder,$nName);
      if ($name) {
        $data['url'] = $name;
        $d = $certificate->edit($data);
        echo json_encode(['message' => 'message.recordSaved']);
      }
      else {
        http_response_code(400);
        echo json_encode(['message' => 'message.troublesWithFileSaving']);
      }
    } else {
      http_response_code(400);
      echo json_encode(['message' => 'message.registerDoesntExists']);
    }
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}



