<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/documents.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $language = new Documents();

  $response = $language->getPoliticsDocuments();

  echoResponse(200, $response);
}
?>