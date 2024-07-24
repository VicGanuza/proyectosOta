<?php
class Users {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getUsers() {
    try {
      $sql = "SELECT * FROM cwp_users where isnull(removed_at) order by id desc";
      $q = $this->conn->prepare($sql);
      $q->execute();
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['username'] = utf8_encode($rows[$i]['username']);
      }
      return $rows;
    }catch (PDOException $e) {
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function newUser($data){
    try{
      $isAdmin = $data['isAdmin'] ?? 0;
      $sql = "SELECT id FROM cwp_users where username = ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$data['username']]);
      $result = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($result['id'])){
        return ['error'=>true, 'message'=>'userAlreadyExist'];
      } else {
        try {
          $sql = "INSERT INTO cwp_users (name, lastname, username, active, isAdmin, cookieConsent) VALUES (?, ?, ?, ?, ?, ?) ";
          $q = $this->conn->prepare($sql);
          $q->execute([$data['name'], $data['lastname'], $data['username'], 1, $isAdmin, 0]);
          $id = $this->conn->lastInsertId();
          $data['id'] = $id;
          return $data;
        } catch (PDOException $e){
          error_log($e);
          return ['error'=>true, 'message'=>'errorCreating'];
        }
      }
    } catch(PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function getUserById($id){
    try {
      $sql = "Select * from cwp_users where id = ? and active = ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$id,1]);
      return $q->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function getUserByUser($user){
    try {
      $sql = "Select * from cwp_users where username = ? and active = ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$user,1]);
      return $q->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function editUser($id,$data){
    try {

      $sql = "SELECT id FROM cwp_users where username = ? and id <> ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$data['username'],$id]);
      $result = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($result['id'])) {
        return ['error'=>true, 'message'=>'userAlreadyExist'];
      } else {
        try {
          $sql = "UPDATE cwp_users SET name = ?, lastname = ?, username = ?, isAdmin = ? where id = ?";
          $q = $this->conn->prepare($sql);
          $q->execute([$data['name'], $data['lastname'], $data['username'], $data['isAdmin'], $id]);
          return true;
        } catch (PDOException $e){
          error_log($e);
          return ['error'=>true, 'message'=>'errorUpdating'];
        }
      }
    }catch(PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function removeUser($id){
    try{
      $sql = "DELETE FROM r_cwp_users_groups where id_user = ?";
      $q = $this->conn->prepare($sql);
      $q->execute([$id]);
      try {
        $sql = "UPDATE cwp_users SET active = ?, removed_at = now() where id = ?";
        $q = $this->conn->prepare($sql);
        $q->execute([0,$id]);
        return ['error'=>false, 'message'=>'removedProperly'];
      } catch(PDOException $e){
        error_log($e);
        return ['error'=>true, 'message'=>'errorRemoving'];
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorRemoving'];
    }
  }

  function setConsent($data){
    try{
      $cookieConsent = $data['cookieConsent'] ? 1 : 0;
      $sql = "UPDATE cwp_users set cookieConsent = ? WHERE username = ?";
      error_log($sql);
      $q = $this->conn->prepare($sql);
      $q->execute([$cookieConsent,$data['username']]);
      error_log($cookieConsent);
      error_log($data['username']);
      return true;
    }catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorUpdating'];
    }
  }
}
