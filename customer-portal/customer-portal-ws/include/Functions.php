<?php
/**
 * Created by PhpStorm.
 * User: Victoria Ganuza
 * Date: 8/3/2021
 * Time: 9:44 AM
 */

function echoResponse($status_code, $response)
{
    header("HTTP/1.1 " . $status_code); //200 OK
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
}

function verifyRequiredParams($request_params, $required_fields)
{
    $error = false;
    $error_fields = "";
    //$request_params = array();
    // $request_params = $_REQUEST;

    /* $app = \Slim\Slim::getInstance();
    $json = $app->request->getBody();
    $request_params = json_decode($json, true) /*
   /*Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }*/

    foreach ($required_fields as $field) {
        if (
            !isset($request_params[$field]) ||
            strlen(trim($request_params[$field])) <= 0
        ) {
            $error = true;
            $error_fields .= $field . ", ";
        }
    }

    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = [];
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] =
            "Required field(s) " .
            substr($error_fields, 0, -2) .
            " is missing or empty";
        echoResponse(400, $response);

        $app->stop();
    }
}
function escribirLog ($texto) {
    
    $textoAAgregar = date("d/m/Y - H:i:s.- ") . $texto . "\r\n";
	$textoAAgregar .= file_get_contents('../errorLogs.log');
	file_put_contents('../errorLogs.log', $textoAAgregar);
}

function data_clean($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

	return $data;
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

function archivos_pdf_eliminar($dir)
{
  $current_dir = getcwd();

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
