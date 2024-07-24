<?php
Class PublicAccess{
  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }
  function get($id = null){
    try{
      $op = [];

      $sql = "Select * from public_access_documents where 1";

      if (isset($id)){
        $sql .= " and id = ?";
        $op[] = $id;
      }
      $q = $this->conn->prepare($sql);

      $q->execute($op);
      if (isset($id)) {
        $res = $q->fetch(PDO::FETCH_ASSOC);
        $res['name'] = utf8_encode($res['name']);
      } else{
        $res = $q->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) {
          $res[$i]['name'] = utf8_encode($res[$i]['name']);
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

      $sql = "Select * from public_access_documents where name = ? and public_access_id = ?";

      $q = $this->conn->prepare($sql);
      $q->execute([$name, 3]);
      $res = $q->fetchAll(PDO::FETCH_ASSOC);

      return $res;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getByNameNotId($name,$id){
    try{

      $sql = "Select * from public_access_documents where name = ? and public_access_id = ? and id <> ?";

      $q = $this->conn->prepare($sql);
      $q->execute([$name, 3, $id]);
      $res = $q->fetchAll(PDO::FETCH_ASSOC);

      return $res;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function create($data){
    try{
      $name = utf8_decode($data['name']);
      $sql = "INSERT INTO public_access_documents (name, url, pdf, excel, public_access_id) VALUES (?,null,null,null,?)";
      $q = $this->conn->prepare($sql);
      $q->execute([$name,3]);
      return $this->conn->lastInsertId();
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function edit($data){
    try {
      $name = utf8_decode($data['name']);
      $pdf = $data['pdf'] ?? null;
      $excel = $data['excel'] ?? null;
      $sql = "UPDATE public_access_documents SET name = ?, pdf = ?, excel = ? where id = ?";
      error_log($sql);
      $q = $this->conn->prepare($sql);
      $q->execute([$name,$pdf,$excel,$data['id']]);
      return true;
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function remove($id){
    try {
      $sql = "DELETE FROM public_access_documents WHERE id = ?";
      $q = $this->conn->prepare($sql);

      $q->execute([$id]);
      return true;
    } catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
}