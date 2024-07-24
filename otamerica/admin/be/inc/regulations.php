<?php
Class Regulations{
  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }
  function get($data){
    try{
      $op = [] ;
      $sql = "Select * from regulations where 1";
      if (isset($data['id'])) {
        $sql .= " and id = ?";
        $op[]=$data['id'];
      }

      error_log($sql);
      $q = $this->conn->prepare($sql);
      $q->execute($op);
      if (isset($data['id'])) {
        $res = $q->fetch(PDO::FETCH_ASSOC);
        $res['name'] = $res['name'];
      } else{
        $res = $q->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
          $res[$i]['name'] = $res[$i]['name'];
        }
      }
      return $res;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getByName($name){
    try{
      $sql = "Select * from regulations
              where name = ? ";

      $q = $this->conn->prepare($sql);
      $q->execute([$name]);
      return $q->fetch(PDO::FETCH_ASSOC);

    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function create($data){
    try {
      $s = "INSERT INTO regulations (name) VALUES(?)";

      $q = $this->conn->prepare($s);
      $q->execute([$data['name']]);
      return $this->conn->lastInsertId();
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function edit($data){
    try {
      $op[]=$data['name'];
      $s = "UPDATE regulations SET name = ?";
      if (isset($data['url'])) {
        $s .= ", url = ? ";
        $op[] = $data['url'];
      }
      $s .= " where id = ?";
      $op[] = $data['id'];
      $q = $this->conn->prepare($s);
      $q->execute($op);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function remove($id){
    try {
      $s = "Delete from regulations where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return true;
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
}