<?php
class News {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getNews($id = null) {
    try {
      if (isset($id)) {
        $sql = "SELECT * FROM news where active = 1 and id = ".$id;
      } else {
        $sql = "SELECT * FROM news where active = 1 order by date desc";
      }
      escribirLog($sql);
      $q = $this->conn->prepare($sql);
      $q->execute();
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      escribirLog(count($rows));
      for ($i = 0; $i < count($rows); $i++) {
        escribirLog($rows[$i]['headline']);
        $rows[$i]['headline'] = utf8_encode($rows[$i]['headline']);
        $rows[$i]['image'] = utf8_encode($rows[$i]['image']);
      }
      return $rows;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}
?>