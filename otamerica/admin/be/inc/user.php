<?php
Class User {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }
  function get($filtro){
    try {
      $op=[];
      $s = "Select u.id, u.username, l.lang_key, l.id as location from users u left join locations l on l.id = u.location_id where 1 ";
      if (isset($filtro['username'])) {
        $s .= "and u.username = ? ";
        $op[]=$filtro['username'];
      }
      if (isset($filtro['id'])) {
        $s .= "and u.id = ? ";
        $op[]=$filtro['id'];
      }
      if (isset($filtro['location']) && $filtro['location'] != 0){
        $s .= "and u.location_id = ? ";
        $op[]=$filtro['location'];
      }
      $q = $this->conn->prepare($s);
      $q->execute($op);
      $row = $q->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getById($id){
    try {
      $s =  "Select * from users where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getByUsername($username){
    try {
      $s =  "Select * from users where username = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$username]);
      $user = $q->fetch(PDO::FETCH_ASSOC);
      error_log(json_encode($user));
      return $user;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function samePass($id,$pass){
    try {
      $s = "Select id from users where id = ? and password = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id,$pass]);
      return $q->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function create($data) {
    try {
      $s = "Insert into users (username, password, location_id) VALUES (?, ?,?)";
      $q = $this->conn->prepare($s);
      $q->execute([$data['username'],$data['password'],$data['location']]);
      return $this->conn->lastInsertId();
    } catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function edit($data) {
    try {
      $op[] = $data['username'];
      $op[] = $data['location'];

      $s = "Update users set username = ?, location_id = ? ";
      if (isset($data['newPassword'])) {
        $s .= ", password = ? ";
        $op[] = $data['newPassword'];
      }

      $s .= "where id = ?";
      $op[] = $data['id'];

      $q = $this->conn->prepare($s);
      $q->execute($op);
      return $data['id'];

    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function getLocationByUser($user){
    try {
      $s = "select l.lang_key as country from users u left join locations l on l.id = u.location_id where u.username = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$user]);
      $result = $q->fetch(PDO::FETCH_ASSOC);
      return $result['country'];
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
}
