<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/regulations.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $language = new Regulations();

  $response = $language->get();

  echoResponse(200, $response);
}
?>