<?php
Class Office {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }
  function get($data){
    try{
      $op[] = $data['user'] ;
      $sql = "Select o.id, o.name, ot.lang_key as terminal   from offices o
              left join offices_terminals ot on ot.id = o.office_terminal_id
              left join users u on u.location_id = o.location_id
              where u.username = ?";
      if (isset($data['id'])) {
        $sql .= " and o.id = ?";
        $op[]=$data['id'];
      }
      $q = $this->conn->prepare($sql);
      $q->execute($op);
      if (isset($data['id'])) {
        $res = $q->fetch(PDO::FETCH_ASSOC);
      } else
        $res = $q->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getRegionByOffice($id){
    try {
      $s = "Select region from offices where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      $result = $q->fetch(PDO::FETCH_ASSOC);
      return $result['region'];
    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}