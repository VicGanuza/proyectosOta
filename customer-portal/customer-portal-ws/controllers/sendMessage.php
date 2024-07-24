<?php
require_once('../include/Header.php');
require_once ('../inc/mails.php');

$data = $_POST;

$to = [];
//$to[] = "helpdesk@otamerica.com";
$to[] = "victoriaganuza@gmail.com";
$to[] = "julia.sanchez@otamerica.com";
$to[] = "arthur.passos@otamerica.com";
$to[] = "ariel.perez@otamerica.com";
$asunto = "Contacto desde Costumer Web Portal (CWP)";

$replace['nombre_usuario'] = $data['username'];
$replace['fullname'] = $data['name'] . ' ' . $data['lastname'];
$replace['user_email'] = $data['mail'];
$replace['mensaje'] = $data['message'];

$enviado = Mail::enviarMailPlantilla($to,  __DIR__.'/../mail_templates/consulta.html', $asunto, $replace);

            

//$preferred = 'Didácticos del Sur';
//$message   = 'Se ha rellenado el formulario de Help Desk:<br><br>' .
  //'<h3>Nombre:' . $data['name'] . ' ' . $data['lastname'] . '</h3>' .
  //'<h3>Email de contacto: ' . $data['mail'] . '</h3>' .
  //'<h3>Usuario: ' . $data['username'] . '</h3>' .
  //'<p>Mensaje: ' . $data['message'] . '</p>' .
 // '<hr>';

echo json_encode(true);

