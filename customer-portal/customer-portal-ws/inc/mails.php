<?php

//require __DIR__.'/../libraries/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../include/PHPMailer/src/Exception.php';
require '../include/PHPMailer/src/PHPMailer.php';
require '../include/PHPMailer/src/SMTP.php';

require_once __DIR__."/../common/config_mail.php";

global $mail_config;
$mail_config = $config_mail['secure']['mail'];

class Mail{

	public static function enviarMailPlantilla($mailDestino = '', $plantilla = '', $asunto = '', $reemplazar = null ){
			/*
			$reemplazar es una array con los nombres y valores que se reemplazaran en la plantilla $plantilla
			ej:  $reemplazar = array("email"=>$direccion_email); reemplazara todas las ocurrencias de %%email%%
							en la plantilla 
			*/
			global $mail_config,$config_mail;

			$template = file_get_contents(__DIR__.'/../mail_templates/base.html');

			$template = str_replace('{{contenido}}', file_get_contents($plantilla), $template);  
			if( $reemplazar ){
				foreach($reemplazar as $variable=>$valor){
					$template = str_replace('{{'.$variable.'}}', $valor, $template);
				}
			}

			$template = str_replace('{{linkSite}}', $config_mail['site'], $template);
			$template = str_replace('{{linkFiles}}', $config_mail['files'], $template);

		 	if($template){
				try {

					$mail = new PHPMailer;
					$mail->isSMTP(); 
					$mail->isHTML(true); 
					$mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;// 0; 
					$mail->Host = $mail_config['hostname']; 
					$mail->Port = $mail_config['port']; 
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
					$mail->SMTPAuth = true; 
					$mail->Username = $mail_config['username']; 
					$mail->Password = $mail_config['password']; 
					$mail->setFrom( $mail_config['from'], $mail_config['fullname'] );
					$mail->AltBody = '';

					$mail->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
					);

					for ($i=0; $i<count($mailDestino); $i++){
						$mail->addAddress($mailDestino[$i], $mailDestino[$i]);
					}
					$mail->Subject 		= $asunto;
					$mail->Body 		= $template;
					$mail->CharSet = 'UTF-8';
					$mail->send();
					//return ['mailDestino'=>$mailDestino, 'replace'=>$reemplazar, 'mail_config'=>$mail_config];
					return true;
				} catch (PDOException $e) {
					echo( " ERROR, Envia el Email: " . $mailDestino );
					error_log($e);
			        return false;
			    }
				
				
			}else{
				error_log("Error:  No se encontro la plantilla.");
				return false;
			} 
	}
}


?>
