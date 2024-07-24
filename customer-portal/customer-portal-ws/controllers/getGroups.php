<?php
require_once ('../include/header.php');
require "../inc/groups.php";

$gr = new Groups();

$reg= $gr->getGroups();

if (isset($reg['error'])) {
  http_response_code(400);
}
echo json_encode($reg);

