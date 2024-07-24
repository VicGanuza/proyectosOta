<?php
require_once('../include/Header.php');
require_once('../include/Functions.php');


$data = $_GET;
$solicitud_id = data_clean($_GET['psec']??'');
$filename =  data_clean($_GET['name']??'');

if (strlen($solicitud_id) == 32)
{
  escribirLog('$solicitud_id');

  // Eliminar archivos *.pdf mayores a 72hrs.
  $dir    = '..\\..\\proyecto\\disponibles_para_entrega';
  archivos_pdf_eliminar($dir);

  // solo push del PDF (sin body ni otros headers)
  $filename_prefix = 'solicitud_' . $solicitud_id;
	$filename = $filename_prefix . '.pdf';

	$archivo = '..\\..\\proyecto\\' . 'disponibles_para_entrega' . '\\' . $filename;

	$archivo_nombre_push = "pliego_" . $solicitud_id . '.pdf';

	push_archivo($archivo, $archivo_nombre_push);

} else {
	$archivo = '..\\..\\files\\' . $filename;
  $file = explode('/',$filename);
  push_archivo($archivo,end($file));
}
