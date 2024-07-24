<?php
class Locations {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getLocations() {
    try {

      $sql = "SELECT * FROM locations";

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