<?php
require_once('../include/Header.php');

$data = $_GET;
$solicitud_id = $data['psec'];

$filename_prefix = 'solicitud_' . $solicitud_id;
$filename = $filename_prefix . '.pdf';

$archivo = '..\\..\\proyecto\\' . 'disponibles_para_entrega' . '\\' . $filename;
$archivo_nombre = "pliego_" . $solicitud_id . '.pdf';

if (file_exists($archivo)){
  echo json_encode(["exists"=>'1', 'message'=>$archivo_nombre]); /*  */
} else {
  echo json_encode(["message"=>'documentForm.fileRemoved']);
}