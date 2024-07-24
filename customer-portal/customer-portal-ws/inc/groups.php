<?php
class Groups {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getGroups() {
    try {

      $sql = "SELECT * FROM cwp_user_groups where isnull(removed_at)";

      $q = $this->conn->prepare($sql);
      $q->execute([]);
      return $q->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function newGroup($data){
    try{
      $sql = "SELECT id FROM cwp_user_groups where name = ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$data['name']]);
      $result = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($result['id'])){
        return ['error'=>true, 'message'=>'groupAlreadyExist'];
      } else {
        try {
          $sql = "INSERT INTO cwp_user_groups (name) VALUES (?) ";
          $q = $this->conn->prepare($sql);
          $q->execute([$data['name']]);
          $id = $this->conn->lastInsertId();
          try {
            foreach ($data['users'] as $u) {
              $sql = "INSERT INTO r_cwp_users_groups (id_user,id_group) VALUES (?,?)";
              $q = $this->conn->prepare($sql);
              $q->execute([$u, $id]);
            }
            try {
              foreach ($data['graphics'] as $g) {
                $sql = "INSERT INTO r_cwp_graphics_groups (id_graphic,id_group) VALUES (?,?)";
                $q = $this->conn->prepare($sql);
                $q->execute([$g, $id]);
              }
              $data['id'] = $id;
              return $data;
            } catch (PDOException $e) {
              error_log($e);
              return ['error'=>true, 'message'=>'errorGraphicsGroup'];
            }
          } catch (PDOException $e){
            error_log($e);
            return ['error'=>true, 'message'=>'errorUsersGroup'];
          }
        } catch (PDOException $e) {
          error_log($e);
          return ['error'=>true, 'message'=>'errorCreating'];
        }
      }
    } catch(PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function getById($id){
    try {
      $sql = "SELECT * FROM cwp_user_groups WHERE id = ?";
      $q = $this->conn->prepare($sql);
      $q->execute([$id]);
      $row = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($row)){
        $row['users'] = [];
        $row['graphics'] = [];
        $sql = "SELECT id_user FROM r_cwp_users_groups where id_group = ?";
        $q = $this->conn->prepare($sql);
        $q->execute([$id]);
        $users = $q->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
          array_push($row['users'],$user['id_user']);
        }
        $sql = "SELECT id_graphic FROM r_cwp_graphics_groups where id_group = ?";
        $q = $this->conn->prepare($sql);
        $q->execute([$id]);
        $graphics = $q->fetchAll(PDO::FETCH_ASSOC);
        foreach ($graphics as $graphic){
          array_push($row['graphics'],$graphic['id_graphic']);
        }
        return $row;
      }
      return false;
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }
  function editGroup ($id, $data){
    try {
      $sql = "SELECT id FROM cwp_user_groups where name = ? and id <> ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$data['name'],$id]);
      $result = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($result['id'])) {
        return ['error'=>true, 'message'=>'groupAlreadyExist'];
      } else {
        try{
          $sql = "UPDATE cwp_user_groups SET name = ? WHERE id = ?";
          $q = $this->conn->prepare($sql);
          $q->execute([$data['name'],$id]);
          try {
            $sql = "DELETE FROM r_cwp_users_groups where id_group = ?";
            $q = $this->conn->prepare($sql);
            $q->execute([$id]);
            foreach ($data['users'] as $u) {
              $sql = "INSERT INTO r_cwp_users_groups (id_user,id_group) VALUES (?,?)";
              $q = $this->conn->prepare($sql);
              $q->execute([$u, $id]);
            }
            try {
              $sql = "DELETE FROM r_cwp_graphics_groups where id_group = ?";
              $q = $this->conn->prepare($sql);
              $q->execute([$id]);
              foreach ($data['graphics'] as $g) {
                $sql = "INSERT INTO r_cwp_graphics_groups (id_graphic,id_group) VALUES (?,?)";
                $q = $this->conn->prepare($sql);
                $q->execute([$g, $id]);
              }
              return true;

            } catch (PDOException $e){
              error_log($e);
              return ['error'=>true, 'message'=>'errorUpdatingGraph'];
            }
          } catch (PDOException $e){
            error_log($e);
            return ['error'=>true, 'message'=>'errorUpdatingUsers'];
          }
        } catch (PDOException $e){
          error_log($e);
          return ['error'=>true, 'message'=>'errorUpdating'];
        }
      }
    }catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }
  function removeGroup($id){
    try {
      $sql = "UPDATE cwp_user_groups SET  removed_at = now() WHERE id = ?";
      $q = $this->conn->prepare($sql);
      $q->execute([$id]);
      try {
        $sql = "DELETE FROM r_cwp_graphics_groups where id_group = ?";
        $q = $this->conn->prepare($sql);
        $q->execute([$id]);
        try {
          $sql = "DELETE FROM r_cwp_users_groups where id_group = ?";
          $q = $this->conn->prepare($sql);
          $q->execute([$id]);
          return ['error'=>false, 'message'=>'removedProperly'];
        } catch (PDOException $e){
          error_log($e);
          return ['error'=>true, 'message'=>'errorRemovingUsers'];
        }
      } catch (PDOException $e){
        error_log($e);
        return ['error'=>true, 'message'=>'errorRemovingGraph'];
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorRemoving'];
    }
  }
}
