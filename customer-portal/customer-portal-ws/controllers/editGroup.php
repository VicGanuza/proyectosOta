<?php
require_once('../include/Header.php');
require "../inc/groups.php";
$data = $_POST;

$id = $_GET['id'];
$group = new Groups();

$response = $group->editGroup($id,$data);

if (isset($response['error'])) {
  http_response_code(400);
}

echo json_encode($response);
