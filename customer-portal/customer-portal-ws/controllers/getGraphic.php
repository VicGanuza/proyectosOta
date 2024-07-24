<?php
include "../include/Header.php";
require "../inc/graphics.php";

$graphic = new Graphics();

 if (isset($_GET["id"])){
  $response = $graphic->graphicById($_GET['id']);
  if (isset($response['error'])) http_response_code(400);
  echo json_encode($response);
}
