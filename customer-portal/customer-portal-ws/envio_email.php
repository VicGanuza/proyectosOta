<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'include/PHPMailer/src/Exception.php';
require 'include/PHPMailer/src/PHPMailer.php';
require 'include/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();


try {
  echo 'En el try';
  $mail->isSMTP();
  $mail->Host = 'dtc029.ferozo.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'no-reply@otamerica.com';
  $mail->Password = 'Xxxxx';
  $mail->Port = 465;
  $mail->CharSet = 'utf-8';
  $mail->SMTPOptions = array(
    'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
    )
  );
  $mail->setFrom('no-reply@otamerica.com', 'XXXX');
  $mail->addAddress('victoriaganuza@gmail.com', 'XXXX XXXX');
  $mail->isHTML(true);
  $mail->Subject = 'Recuperación de contraseña';
  $mail->Body    = "Su nueva clave de acceso es XXX";
  $mail->send();
  echo "enviado";

} catch (Exception $e) {
  return "El mensaje no pudo ser enviado. Error: $mail->ErrorInfo";
}
