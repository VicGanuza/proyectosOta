<?php
require_once ('../../include/header.php');
require "../../inc/document.php";
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';
require_once ('../../inc/office.php');

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_POST;

  $document = new Document();
  $doc = $document->getByName($data['user'],$data['name']);
error_log(json_encode($doc));
  if ((count($doc) > 0) && ($doc['id'] != $data['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'documentAdmin.nameAlreadyInUse']);
  } else {
    //if ($doc) {
      if (count($_FILES) > 0) {
        $filename = $_FILES['file']['name'];
        $file = new Files();
        $folder = $doc['country'].'/';
        $office = new Office();
        $region = $office->getRegionByOffice($data['office']);

        $nName = $region.'_Document_'.$data['name'];
        $name = $file->save($filename, $folder,$nName);
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

    /*} else {
      http_response_code(400);
      echo json_encode(['message' => 'message.registerDoesntExists']);
    }*/
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}



