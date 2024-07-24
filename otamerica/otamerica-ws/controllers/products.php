<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/products.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $el = new Products();

  $response = $el->get();

  echoResponse(200, $response);
}
?>