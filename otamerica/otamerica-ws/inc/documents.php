<?php
class Documents {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getAnpDocuments() {
    try {

      $sql = "SELECT * FROM public_access_documents where public_access_id = 3";

      $q = $this->conn->prepare($sql);
      $q->execute([]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['name'] = utf8_encode($rows[$i]['name']);
      }
      return $rows;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function getPoliticsDocuments() {
    try {

      $sql = "SELECT * FROM public_access_documents where public_access_id = 4";

      $q = $this->conn->prepare($sql);
      $q->execute([]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['name'] = utf8_encode($rows[$i]['name']);
      }
      return $rows;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function getHistoryDocuments($filtro) {
    try {
      $op[]=$filtro['y'];
      //if ($filtro['y'] != 0) {
        $sql = "Select *, DATE_FORMAT(updated, '%d/%m/%Y') as fecha from historical_movements where year = ? ";
        if ($filtro['m']!='0') {
          $sql .= "and month = ? ";
          $op[] = $filtro['m'];
        }
        $sql .= "order by month desc";
        $q = $this->conn->prepare($sql);
        $q->execute($op);
      /* } else {
        $sql = "Select *, DATE_FORMAT(updated, '%d/%m/%Y') as fecha from historical_movements where `updated` = (SELECT MAX(`updated`) from historical_movements)";
        $q = $this->conn->prepare($sql);
        $q->execute();
      } */
      
      $row = $q->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
    /*try {

      $sql = "SELECT * FROM historical_movements hm order by hm.date desc";

      $q = $this->conn->prepare($sql);
      $q->execute([]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }*/
  }
  function getYears(){
    try {
      $sql = "select year as id, year as name from historical_movements group by year order by year DESC";
      $q = $this->conn->prepare($sql);
      $q->execute([]);
      $row = $q->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function getMonths($y){
    try {
      $sql = "select month from historical_movements where year = ? group by month order by month ASC";
      $q = $this->conn->prepare($sql);
      $q->execute([$y]);
      $row = $q->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}
?>