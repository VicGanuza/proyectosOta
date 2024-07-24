<?php
require_once('../include/Header.php');
require "../inc/users.php";
$data = $_POST;

$user = new Users();

$reg = $user->setConsent($data);

if (isset($reg['error'])) {
  http_response_code(400);
}

echo json_encode($reg);
