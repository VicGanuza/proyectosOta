<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/services.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $el = new Services();

  $response = $el->get();

  echoResponse(200, $response);
}
?>