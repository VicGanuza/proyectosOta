<?php
require_once('../include/Header.php');
require_once ('../inc/mails.php');
require "../inc/comments.php";
$data = $_POST;

$c = new Comments();

$reg= $c->replyComment($data);

if (isset($reg['error'])) {
  http_response_code(400);
}

echo json_encode($reg);
