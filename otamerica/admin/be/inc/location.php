<?php
Class Location
{
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function get(){
    try {
      $s="select id, lang_key as name from locations";
      $q = $this->conn->prepare($s);
      $q->execute();
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}