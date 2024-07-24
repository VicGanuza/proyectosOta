<?php
require_once ('../../include/header.php');
require "../../inc/historical.php";
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {

  $data = $_POST;
  $history = new Historical();
  $fil = ['y'=>$data['year'],'m'=>$data['month']];
  $reg = $history->search($fil);

  if ((count($reg) > 0) && ($reg[0]['id'] != $data['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'fileForm.historyAlreadyCreated']);
  } else {
    $historical = $history->getHistorical($data['id']);
    if ($historical) {
      if (isset($_FILES['file']['name'])){
        $filename = $_FILES['file']['name'];
        $file = new Files();
        $folder = 'brasil/history/';
        $nName = 'Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_'.$data['year'].'-'.$data['month'];
        $name = $file->save($filename, $folder,$nName);
        if ($name) {
          $ext = explode('.',$name)[1];
          $data['url'] = $name;
          $data['size'] = round($_FILES['file']['size']/1000) . ' KB';
          $data['type'] = $ext === 'xlsx' ? 'EXCEL' : ($ext === 'xls' ? 'EXCEL': 'PDF');
        }
        else {
          http_response_code(400);
          echo json_encode(['message' => 'message.troublesWithFileSaving']);
        }
      } else {
        $data['url'] = $historical['url'];
        $data['size'] = $historical['size'];
        $data['type'] = $historical['type'];
      }
      $d = $history->edit($data);
      echo json_encode(['message' => 'message.recordSaved']);
    } else {
      http_response_code(400);
      echo json_encode(['message' => 'message.registerDoesntExists']);
    }
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}



