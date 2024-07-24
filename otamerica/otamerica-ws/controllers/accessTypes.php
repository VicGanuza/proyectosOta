<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/accessTypes.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $el = new AccessTypes();

  $response = $el->get();

  echoResponse(200, $response);
}
?>