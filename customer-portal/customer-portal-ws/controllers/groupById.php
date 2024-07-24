<?php
require_once ('../include/header.php');
require "../inc/groups.php";

$gr = new Groups();
$id = $_GET['id'];

$g= $gr->getById($id);

if(isset($g['error'])) {
  http_response_code(400);
}
echo json_encode($g);
