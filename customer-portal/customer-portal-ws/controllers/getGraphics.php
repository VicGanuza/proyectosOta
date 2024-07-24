<?php
include "../include/Header.php";
require "../inc/graphics.php";

$user = $_GET['user']??null;
$graphic = new Graphics();

if (isset($user)) $response = $graphic->getGraphicsList($user);
else $response = $graphic->getGraphicsList();
error_log(json_encode($response));
if (isset($response['error'])) http_response_code(400);

echo json_encode($response);

