<?php
include "../include/Header.php";
require "../inc/graphics.php";

$user = $_GET['user'];
$id = $_GET['id'];
$graphic = new Graphics();

$response = $graphic->hasAccessTo($user,$id);

if (isset($response['error'])) http_response_code(400);

echo json_encode($response);