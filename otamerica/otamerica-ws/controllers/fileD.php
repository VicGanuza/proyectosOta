<?php
require_once('../include/Header.php');

// Eliminar archivos *.pdf mayores a 72hrs.
archivos_pdf_eliminar();

$data = $_GET;
$solicitud_id = $data['psec'];

$filename_prefix = 'solicitud_' . $solicitud_id;
$filename = $filename_prefix . '.pdf';

$archivo = '..\\..\\proyecto\\' . 'disponibles_para_entrega' . '\\' . $filename;
if (file_exists($archivo)){
  $archivo_url = "proyecto/disponibles_para_entrega/".$filename;
  $archivo_nombre = "pliego_" . $solicitud_id . '.pdf';
  echo json_encode(["file"=>$archivo_url, 'message'=>$archivo_nombre]);
} else {
  echo json_encode(["message"=>'documentForm.fileRemoved']);
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
