<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/locations.php";
require "../inc/offices.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $office = new Offices();
  $data = (object) new StdClass();

  if (isset($_GET["business_area"])){
    $data->business_area = $_GET['business_area'];
  }
  if (isset($_GET['product'])) {
    $data->product = $_GET['product'];
  }
  if (isset($_GET['access_type'])) {
    $data->access_type = $_GET['access_type'];
  }
  if (isset($_GET['service'])) {
    $data->service = $_GET['service'];
  }
  if (isset($_GET['location'])) {
    $data->location = $_GET['location'];
  }
  if (isset($_GET['nombre'])) {
    $data->nombre = $_GET['nombre'];
  }

  if (isset($_GET['preSelected'])) {
    $data->preSelected = $_GET['preSelected'];
  }
  $response = $office->getOfficesList($data);

  echoResponse(200, $response);
}
?>