<?php
$config = [];
$config['providers'] = [];
$config['secure'] = [];
$config['secure']['mail'] = [];
$config['secure']['database'] = [];
$config['secure']['providers'] = [];

$config['webservices'] = 'http://localhost/otamerica-ws';
$config['site'] = 'http://localhost/otamerica';
$config['files'] = $config['webservices'] . '/files';

$config['product'] = 'otamerica';
$config['version'] = '1.0';
$config['description'] = 'Otamerica';
$config['environment'] = 'development'; /* development | production */

$path = __DIR__;

$db_host_name = '127.0.0.1';
$db_port = '3306';
$db_database = 'w290045_otam';
$db_username = 'root';
$db_password = 'mysql'; 

$config['secure']['database']['connection'] = "mysql:dbname=$db_database;host=$db_host_name;port=$db_port;";
$config['secure']['database']['username'] = $db_username;
$config['secure']['database']['password'] = $db_password;

?>
