<?php
require_once('../include/Header.php');

$data = $_POST;

$id = $data['id'];
$name = $data['name'];
$tel = $data['tel'] ;
$email = $data['email'];
$empresa = $data['empresa'];
$title = $data['fileTitle'];

// Definición de aprobadores.
//$aprobador = 'alejandro.boland@otamerica.com';
//$aprobador = 'victoriaganuza@gmail.com';
$aprobador = 'rolando.balsamello@otamerica.com';
//$aprobador = 'ljd.dematteis@gmail.com';

$solicitud_id = md5(uniqid(rand(), true));
$filename_prefix = 'solicitud_' . $solicitud_id;
$filename = $filename_prefix . '.pdf';

//print 'ruta: '.getcwd();
if (!copy('..\\..\\proyecto\\pliegos_originales\\' . $data['filename'], '..\\..\\proyecto\\disponibles_para_entrega\\' . $filename))
  die('Error 102');

// Guardar los datos del solicitante en archivo .txt
$archivo_solicitante = fopen('..\\..\\proyecto\\' . 'solicitudes' . '\\' . $filename_prefix .".txt", "w");
fwrite($archivo_solicitante, $name   . ';');
fwrite($archivo_solicitante, $tel     . ';');
fwrite($archivo_solicitante, $email   . ';');
fwrite($archivo_solicitante, $empresa . ';');
fwrite($archivo_solicitante, $title . ';');
fclose($archivo_solicitante);

// Email
$to       = $aprobador;
$from     = 'no-reply@otamerica.net';
$subject  = 'Solicitud de acceso a pliego de licitación';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=UTF-8';
$headers[] = 'To: ' . $to;
$headers[] = 'From: ' . $from;

$body = '<div
            style="
              width: 650px;
              background-color: white;
              padding: 0 35px;
              margin: 0 auto;
              color: #707070;
            "
          >';

$body .= '<div style="display: block; width: 100%; height: 45px">
        <img
          style="margin-top: 10px; float: left; max-width: 185px"
          src="https://otamerica.com/proyecto/OilTanking-America-Logo.png"
        />
      </div>

      <hr />';
$body .= '<div style="text-align: justify; font-size: 16px; line-height: 26px">
    <div style="font-size: 22px; color: #707070">
      <b>Solicitud de acceso</b>
    </div>';

$body .= '<p style="color: #707070">Datos del solicitante:</p>';
$body .= '<p style="color: #707070">';
$body .= 'Nombre y Apellido: <b>' . $name .'</b><br />';
$body .= 'Nombre de la Empresa: <b>' . $empresa .'</b><br />';
$body .= 'Teléfono: <b>' . $tel .'</b><br />';
$body .= 'Corre electrónico: <span class="mail">' . $email .'</span><br />';

$body .= 'Pliego solicitado: <b>' . $title.'</b></p>';
$body .= '<div style="text-align: center; margin: 30px 0">
                <a href="https://www.otamerica.com/#/documentApprove/' . $id . '/' . $solicitud_id . '">Aprobar</a>
              </div>
              </div>
              </div>';

$message = '
		<html>
    <head>
      <meta charset="UTF-8" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      />
      <style>
        body,
        html,
        head {
          margin: 0px;
          padding: 0px;
          font-family: "Montserrat", Arial, Verdana, Tahoma, Geneva, sans-serif;
        }
        a {
          border: 1px solid #d51020;
          border-radius: 90px;
          font-family: "Source Sans Pro", Arial, Verdana, Tahoma, Geneva,
            sans-serif;
          color: #d51020 !important;
          font-size: 18px;
          line-height: 4;
          text-decoration: none;
          white-space: nowrap;
          font-weight: bold;
          padding: 19px 28px;
        }
        hr {
          color: #e0e0e0;
          margin: 30px 0;
        }
        .mail a {
          border: none;
          font-size: 16px;
          font-weight: bold;
          padding: 0;
        }
      </style>
		<title></title>
		</head>
		<body style="background-color: #eff1f9">
    ' . $body . '
		</body>
		</html>
		';


mail($to, $subject, $message, implode("\r\n", $headers));

echo json_encode(["message"=>'documentForm.requestSent', 'id'=>$id, 'sol'=>$solicitud_id]);
