<?php

require_once('../../include/header.php');
require "../../inc/documents.php";

$filtro = $_GET;
$hist = new Documents();
$history = $hist->getHistoryDocuments($filtro);
echo json_encode($filtro);

/*if (!$history) {
  http_response_code(400);
  echo json_encode(['message'=>'message.somethingWentWrong']);
} else {
  echo json_encode($history);
}*/
