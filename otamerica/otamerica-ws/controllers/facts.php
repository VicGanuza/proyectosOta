<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/offices.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $office = new Offices();
  $data = (object) new StdClass();

  $response = $office->getOfficesFacts();

  echoResponse(200, $response);
}
?>