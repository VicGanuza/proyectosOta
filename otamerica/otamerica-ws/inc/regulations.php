<?php
Class Regulations
{
  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function get()
  {
    try {

      $sql = "SELECT * FROM regulations";

      $q = $this->conn->prepare($sql);
      $q->execute([]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['name'] = utf8_encode($rows[$i]['name']);
      }
      return $rows;
    } catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}
