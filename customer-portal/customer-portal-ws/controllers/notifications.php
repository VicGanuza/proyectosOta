<?php
require_once ('../include/header.php');
require "../inc/mails.php";

$mail_destino = ['victoriaganuza@gmail.com','vic.toriaga.nuz.a@gmail.com'];
$template = "nuevo_comentario.html";
$asunto = "Nuevo Comentario";
$replace['nombre_usuario'] = 'Victoria Ganuza';
$replace['nombre_grafico'] = 'Argentina OT';
$replace['linkConsulta'] = 'https://otamerica.com/costumer-portal/#/graphic/2';
$replace['comentario'] = 'Hice este cometario';

$enviado = Mail::enviarMailPlantilla($mail_destino,  __DIR__.'/../mail_templates/'.$template, $asunto, $replace);

if( $enviado ){
  echo "Mail enviado correctamente";
} else {
  echo $enviado;
}/* */