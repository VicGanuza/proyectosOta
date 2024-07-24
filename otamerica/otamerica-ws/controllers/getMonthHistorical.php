<?php
require_once ('../include/header.php');
require "../inc/documents.php";

$year = $_GET['y'];

$hist = new Documents();
$history= $hist->getMonths($year);

if(!$history) {
  http_response_code(400);
  echo json_encode(['message' => 'message.somethingWentWrong']);
} else {
  echo json_encode($history);
}

