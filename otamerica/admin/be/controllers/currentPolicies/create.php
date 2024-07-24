<?php
require_once ('../../include/header.php');
require_once ("../../inc/currentPolicies.php");
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {

  $data = $_POST;
  error_log(json_encode($data));

  $policy = new CurrentPolicies();
  $doc = $policy->getByName($data['name']);
  error_log(json_encode($doc));

  if ($doc) {
    http_response_code(400);
    echo json_encode(['message' => 'documentAdmin.nameAlreadyInUse']);
  } else {
    $id = $policy->create($data);
    if ($id) {
      $filename = $_FILES['file']['name'];
      $file = new Files();
      $folder = 'policies/';
  //    $nName = 'Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_'.$data['year'].'-'.$data['month'];
      $name = $file->save($filename, $folder);
      if ($name) {
        $data['id'] = $id;
        $data['url'] = $name;
        $d = $policy->edit($data);
        echo json_encode(['message' => 'message.recordSaved']);
      }
      else {
        $policy->remove($id);
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

