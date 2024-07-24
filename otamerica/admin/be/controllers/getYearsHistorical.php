<?php
require_once ('../include/header.php');
require "../inc/historical.php";

$hist = new Historical();

$history= $hist->getYears();

if(!$history) {
  http_response_code(400);
  echo json_encode(['message' => 'message.somethingWentWrong']);
} else {
  echo json_encode($history);
}
