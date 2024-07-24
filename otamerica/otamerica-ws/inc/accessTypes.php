<?php
class AccessTypes {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function get() {
    try {

      $sql = "SELECT * FROM access_types";

      $q = $this->conn->prepare($sql);
      $q->execute([]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}
?>