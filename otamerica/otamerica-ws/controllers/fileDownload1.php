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
  archivos_pdf_eliminar();

  // solo push del PDF (sin body ni otros headers)
  descargarSolicitud($solicitud_id);
} else {
	$archivo = '..\\Files\\' . $filename;
  $file = explode('/',$filename);
  push_archivo($archivo,end($file));
}

function descargarSolicitud($solicitud_id) {
  $filename_prefix = 'solicitud_' . $solicitud_id;
	$filename = $filename_prefix . '.pdf';

	$archivo = '..\\..\\proyecto\\' . 'disponibles_para_entrega' . '\\' . $filename;

	$archivo_nombre_push = "pliego_" . $solicitud_id . '.pdf';

	push_archivo($archivo, $archivo_nombre_push);
}

function push_archivo($archivo, $archivo_nombre_push)
{
  escribirLog($archivo);
  
	if (file_exists($archivo)) 
	{ 
    header('Content-Description: File Transfer');
    if (preg_match("/\.pdf$/i", $archivo)) {
      header('Content-Type: application/pdf');
    } else {
      header('Content-Type: application/x-download');
    }
    header('Content-Disposition: inline; filename="' . $archivo_nombre_push . '"');		
    header('Content-Length: ' . filesize($archivo));
    header('Expires: 0');
    header('Cache-Control: private, max-age=0, must-revalidate'); // el proxy no tiene que guardar la página.
    header('Pragma: public');
    ini_set('zlib.output_compression','0');

    $fp = fopen($archivo, "r") ;

    ob_clean();
    flush();
    while (!feof($fp)) {
        $buff = fread($fp, 1024);
        print $buff;
    }
    exit;
	}
}
function data_clean($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}

function archivos_pdf_eliminar()
{
  $current_dir = getcwd();

  $dir    = '..\\..\\proyecto\\disponibles_para_entrega';
  $dir_archivos = scandir($dir);

  $k = count($dir_archivos);

  for ($i = 0; $i < $k; $i++)
  {
    $file_with_path = $dir . '\\' . $dir_archivos[$i];

    if (file_exists($file_with_path) && (preg_match('/\.pdf$/i', $dir_archivos[$i])) && ((filemtime($file_with_path) + (60 * 60 * 72)) < time()))
    {
      //print $file_with_path;
      //print "<br />";
      unlink($file_with_path);
    }
  }
}
