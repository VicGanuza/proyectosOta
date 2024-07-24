<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/businessAreas.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $el = new BusinessAreas();

  $response = $el->get();

  echoResponse(200, $response);
}
?>