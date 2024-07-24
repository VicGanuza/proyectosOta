<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/locations.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $language = new Locations();

  $response = $language->getLocations();

  echoResponse(200, $response);
}
?>