<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/locations.php";
require "../inc/offices.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $office = new Offices();

    $response = $office->getTerminalData($_GET["id"]);
    echoResponse(200, $response);
}
?>