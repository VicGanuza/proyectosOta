<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/currentPolicies.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $language = new CurrentPolicies();

  $response = $language->get();

  echoResponse(200, $response);
}
?>