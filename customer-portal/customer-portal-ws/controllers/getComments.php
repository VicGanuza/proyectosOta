<?php
include "../include/Header.php";
require "../inc/comments.php";

$comments = new Comments();

if (isset($_GET["gid"])){
  $response = $comments->commentsByGraphic($_GET['gid']);
  if (isset($response['error'])) http_response_code(400);
  echo json_encode($response);
}
