<?php
require_once('../include/Header.php');
require "../inc/graphics.php";

$id = $_GET['id'];

$graphic = new Graphics();

$reg = $graphic->removeGraphic($id);

if ($reg['error']) {
  http_response_code(400);
}

echo json_encode($reg);
