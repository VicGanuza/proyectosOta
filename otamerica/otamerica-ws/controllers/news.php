<?php
require_once ('../include/header.php');

require "../include/Functions.php";
require "../inc/news.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $response = [];
  $news = new News();

  if (isset($_GET["id"])){
    $response = $news->getNews($_GET['id']);
  } else {
    $response = $news->getNews();
  }
  echoResponse(200, $response);
}
?>