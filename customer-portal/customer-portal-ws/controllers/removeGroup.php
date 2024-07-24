<?php
require_once('../include/Header.php');
require "../inc/groups.php";

$id = $_GET['id'];
$group = new Groups();

$response = $group->removeGroup($id);

if ($response['error']){
  http_response_code(400);
}

echo json_encode($response);
