<?php
require_once('../include/Header.php');
require "../inc/users.php";

$id = $_GET['id'];
$user = new Users();

$rta = $user->removeUser($id);

if ($rta['error']) http_response_code(400);

echo json_encode($rta);
