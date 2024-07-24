<?php
class Historical
{
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }
  function search($filtro){
    try {
      $op[]=$filtro['y'];
      $sql = "Select * from historical_movements where year = ? ";
      if ($filtro['m']!='0') {
        $sql .= "and month = ? ";
        $op[] = $filtro['m'];
      }
      $sql .= "order by month desc";
      $q = $this->conn->prepare($sql);
      $q->execute($op);

      return  $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getHistorical($id){
    try {
      $s = 'Select * from historical_movements where id = ?';

      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetchAll(PDO::FETCH_ASSOC)[0];
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
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
  function create($data){
    try {
      $date = $data['year'] .'-'.$data['month'].'-10';
      $s = "Insert into historical_movements (date, year, month, url) VALUES (?, ?,?, '')";
      $q = $this->conn->prepare($s);
      $q->execute([$date,$data['year'],$data['month']]);
      return $this->conn->lastInsertId();
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function edit($data){
    try {
      $date = $data['year'] .'-'.$data['month'].'-10';
      $s = "Update historical_movements set date = ?, year = ?, month = ?, url = ?, size = ?, type=?, name = ?, updated = now() where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$date,$data['year'],$data['month'],$data['url'], $data['size'], $data['type'], $data['name'], $data['id']]);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function remove($id) {
    try {
      $s = "Delete from historical_movements where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return true;
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
}