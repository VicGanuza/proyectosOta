<?php
require_once('../include/header.php');
require "../inc/documents.php";

$hist = new Documents();
$history = $hist->getHistoryDocuments();

if (!$history) {
  http_response_code(400);
  echo json_encode(['message'=>'message.somethingWentWrong']);
} else {
  echo json_encode($history);
}
