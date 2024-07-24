<?php
require_once ('../../include/header.php');
require_once ("../../inc/document.php");
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';
require_once ('../../inc/user.php');
require_once ('../../inc/office.php');

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {

  $data = $_POST;
  $document = new Document();
  $doc = $document->getByName($data['user'],$data['name']);

  error_log('doc: '.json_encode($doc));
  if (isset($doc)) {
    http_response_code(400);
    echo json_encode(['message' => 'documentAdmin.nameAlreadyInUse']);
  } else {
    $id = $document->create($data);
    if ($id) {
      $user = new User();
      $country = $user->getLocationByUser($data['user']);
      $filename = $_FILES['file']['name'];
      $file = new Files();
      $folder = $country . '/';

      $office = new Office();
      $region = $office->getRegionByOffice($data['office']);
      $nName = $region . '_Document_' . $data['name'];

      $name = $file->save($filename, $folder, $nName);
      if ($name) {
        $data['id'] = $id;
        $data['url'] = $name;
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

