<?php
require_once('../include/Header.php');
require "../inc/groups.php";
$data = $_POST;

$gr = new Groups();

$reg= $gr->newGroup($data);

if (isset($reg['error'])) {
  http_response_code(400);
}

echo json_encode($reg);
