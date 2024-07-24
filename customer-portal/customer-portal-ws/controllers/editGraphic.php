<?php
require_once('../include/Header.php');
require "../inc/graphics.php";
$data = $_POST;

$id = $_GET['id'];

$graphic = new Graphics();

$reg = $graphic->editGraphic($id,$data);

if (isset($reg['error'])) {
  http_response_code(400);
}

echo json_encode($reg);
