<?php
require_once('../include/Header.php');
require "../inc/users.php";
$data = $_POST;

$id = $_GET['id'];
$user = new Users();

$u = $user->editUser($id,$data);

if (isset($u['error'])) http_response_code(400);

echo json_encode($u);
