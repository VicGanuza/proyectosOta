<?php
require_once ('../include/header.php');
require "../inc/users.php";

$u = new Users();

$user= $u->getUserByUser($_GET['user']);

if (isset($user['error']))   http_response_code(400);

echo json_encode($user);
