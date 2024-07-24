<?php
Class Document {
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
      $sql = "Select d.*,  s.* from documentation d
              inner join 
              (select o.id as office,o.region, u.location_id, l.lang_key as country from offices o 
                  left join users u on o.location_id = u.location_id 
                  left join locations l on l.id = u.location_id where u.username = ?) s on s.office = d.office_id
              where 1 ";
      if (isset($data['id'])) {
        $sql .= " and d.id = ?";
        $op[]=$data['id'];
      }
      $sql .= " order by s.region";
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
  function getByName($user,$name){
    try{
      $sql = "Select d.*,  s.* from documentation d
              inner join 
              (select o.id as office,o.region, u.location_id, l.lang_key as country from offices o 
                  left join users u on o.location_id = u.location_id 
                  left join locations l on l.id = u.location_id where u.username = ?) s on s.office = d.office_id
              where d.name = ? ";
              error_log($sql);
              error_log(json_encode([$user, $name]));

      $q = $this->conn->prepare($sql);
      $q->execute([$user, $name]);
      $res = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($res)) {
        $res['name'] = utf8_decode($res['name']);
      }
      return $res['name']<>''?$res['name']:null;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function create($data){
    try {
      $s = "INSERT INTO documentation (name,office_id) VALUES(?,?)";

      $q = $this->conn->prepare($s);
      $q->execute([$data['name'],$data['office']]);
      return $this->conn->lastInsertId();
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function edit($data){
    try {
      $op[]=$data['name'];
      $op[]=$data['office'];
      $s = "UPDATE documentation SET name = ?, office_id = ?";
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
      $s = "Delete from documentation where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return true;
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
}