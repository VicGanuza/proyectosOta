<?php
$path = __DIR__;
//require "$path/../libraries/vendor/autoload.php";
require "$path/config.php";

//ORM\connect($string = $config['secure']['database']['connection'], $config['secure']['database']['username'], $config['secure']['database']['password']);
class Conexion{
  public static function Conectar(){
    global $config;
   /* define('servidor', 'localhost');
    define('nombre_bd', 'articulosdb');
    define('usuario', 'root');
    define('password', '');
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');*/
    try{
      $conexion = new PDO($config['secure']['database']['connection'], $config['secure']['database']['username'], $config['secure']['database']['password']);
      return $conexion;
    }catch (Exception $e){
      die("El error de Conexión es: ". $e->getMessage());
    }
  }
}

?>
