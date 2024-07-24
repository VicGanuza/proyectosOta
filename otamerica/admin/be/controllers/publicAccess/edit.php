<?php
require_once ('../../include/header.php');
require "../../inc/publicAccess.php";
require_once ('../../inc/files.php');
require_once '../../inc/restrictedAccess.php';

$access = new RestrictedAccess();
$access_allowed = $access->restrictRange();
if ($access_allowed) {
  $data = $_POST;

  $publicAccess = new PublicAccess();
  $cert = $publicAccess->get($data['id']);

  if ($cert) {
    $doc = $publicAccess->getByNameNotId($data['name'],$cert['id']);

    if (count($doc) > 0) {
      http_response_code(400);
      echo json_encode(['message' => 'documentAdmin.nameAlreadyInUse']);
    } else {
      if (isset($_FILES['file']['name'])) {
        $filename = $_FILES['file']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = new Files();
        $folder = 'brasil/public_access/';
        if ($extension === 'pdf') {
          if (isset($cert['url'])) {
            $nName = explode('.', explode('/', $cert['url'])[2])[0];
          } else {
            $nName = explode('.', explode('/', $cert['pdf'])[2])[0];
          }
        } else {
          if (isset($cert['excel'])) {
            $nName = explode('.', explode('/', $cert['excel'])[2])[0];
          } else {
            $nName = explode('.', explode('/', $cert['pdf'])[2])[0];
          }
        }
        $name = $file->save($filename, $folder, $nName);
        if ($name) {
          if (!isset($cert['url'])) {
            if ($extension === 'xls') {
              if (!isset($cert['excel'])) {
                $cert['excel'] = $name;
                $publicAccess->edit($cert);
              }
            } else {
              if (!isset($cert['pdf'])) {
                $cert['pdf'] = $name;
                $publicAccess->edit($cert);
              }
            }
          }
          echo json_encode(['message' => 'message.recordSaved', 'cert' => $cert]);
        } else {
          http_response_code(400);
          echo json_encode(['message' => 'message.troublesWithFileSaving']);
        }
      } else {
        $cert['name'] = $data['name'];
        $d = $publicAccess->edit($cert);
      }
      echo json_encode(['message' => 'message.recordSaved']);
    }
  } else {
    http_response_code(400);
    echo json_encode(['message' => 'message.registerDoesntExists']);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'message.restrictedAccess']);
}



