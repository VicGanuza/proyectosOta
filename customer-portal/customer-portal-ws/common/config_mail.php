<?php
$config_mail=[];
$config_mail['webservices'] = 'http://localhost/otamerica-ws';
$config_mail['site'] = 'http://localhost/otamerica';
$config_mail['files'] = $config_mail['webservices'] . '/files';

$config_mail['secure']['mail']['company'] = 'Costumer Wep Portal';
$config_mail['secure']['mail']['fullname'] = 'CWP - Notificaciones';
$config_mail['secure']['mail']['username'] = 'costumer-web@otamerica.net';
$config_mail['secure']['mail']['from'] = 'no-reply@w290045.ferozo.com';
$config_mail['secure']['mail']['password'] = '098@tx29mU'; 
$config_mail['secure']['mail']['hostname'] = 'dtc029.ferozo.com'; 
$config_mail['secure']['mail']['port'] = 465;
$config_mail['secure']['mail']['smtp-secure'] = 'tls';
$config_mail['secure']['mail']['verify-peer'] = false;
$config_mail['secure']['mail']['verify_peer_name'] = false;
$config_mail['secure']['mail']['allow_self_signed'] = true;

?>