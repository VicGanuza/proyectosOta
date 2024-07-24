<?php
class Graphics {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getGraphicsList($user = null) {
    try {
      $op = [];
      $sql = "select * from cwp_pbi_graphics where isnull(removed_at)";
      if (isset($user)){
        $s = "SELECT isAdmin FROM cwp_users WHERE username = ? and isnull(removed_at)";
        $q = $this->conn->prepare($s);
        $q->execute([$user]);
        $resp = $q->fetch(PDO::FETCH_ASSOC);
        if ($resp['isAdmin']===0){
          $sql = 'select cwp_pbi_graphics.* from cwp_pbi_graphics
                left join r_cwp_graphics_groups on r_cwp_graphics_groups.id_graphic = cwp_pbi_graphics.id
                left join r_cwp_users_groups on r_cwp_users_groups.id_group = r_cwp_graphics_groups.id_group
                left join cwp_users on cwp_users.id = r_cwp_users_groups.id_user
                where cwp_users.username = ? and isnull(cwp_pbi_graphics.removed_at) group by cwp_pbi_graphics.id order by cwp_pbi_graphics.id';
          $op[] = $user;
        }
      }
      $q = $this->conn->prepare($sql);
      $q->execute($op);
      return $q->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function hasAccessTo($user,$gr) {
    try {
      $s = "SELECT isAdmin FROM cwp_users WHERE username = ? and isnull(removed_at)";
      $q = $this->conn->prepare($s);
      $q->execute([$user]);
      $resp = $q->fetch(PDO::FETCH_ASSOC);
      if (!$resp['isAdmin']){
        $sql = 'select cwp_pbi_graphics.* from cwp_pbi_graphics
              left join r_cwp_graphics_groups on r_cwp_graphics_groups.id_graphic = cwp_pbi_graphics.id
              left join r_cwp_users_groups on r_cwp_users_groups.id_group = r_cwp_graphics_groups.id_group
              left join cwp_users on cwp_users.id = r_cwp_users_groups.id_user
              where cwp_users.username = ? and cwp_pbi_graphics.id = ? and isnull(cwp_pbi_graphics.removed_at) order by cwp_pbi_graphics.id';
        error_log($sql);
        $q = $this->conn->prepare($sql);
        $q->execute([$user, $gr]);
        $rows = $q->fetchAll(PDO::FETCH_ASSOC);
        return ['hasAccess'=> count($rows) > 0];
      } else {
        return ['hasAccess'=> true];
      }

    }catch (PDOException $e) {
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function graphicById($id){
    try {
      $s = "select * from cwp_pbi_graphics where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function newGraphic($data){
    try {
      $sql = "SELECT id from cwp_pbi_graphics where token = ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$data['token']]);
      $reg = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($reg['id'])){
        return ['error'=>true, 'message'=>'tokenTaken'];
      }
      try{
        $sql = "INSERT INTO cwp_pbi_graphics (title, menu_title, token) VALUES (?,?,?)";
        $q = $this->conn->prepare($sql);
        $q->execute([$data['title'],$data['menu_title'],$data['token']]);
        return true;
      } catch (PDOException $e){
        error_log($e);
        return ['error'=>true, 'message'=>'errorCreating'];
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function editGraphic($id,$data){
    try {
      $sql = "SELECT id from cwp_pbi_graphics where token = ? and id <> ? and isnull(removed_at)";
      $q = $this->conn->prepare($sql);
      $q->execute([$data['token'],$id]);
      $reg = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($reg['id'])){
        return ['error'=>true, 'message'=>'tokenTaken'];
      }
      try{
        $sql = "UPDATE cwp_pbi_graphics SET title = ?, menu_title = ?, token = ? where id = ?";
        $q = $this->conn->prepare($sql);
        $q->execute([$data['title'],$data['menu_title'],$data['token'], $id]);
        return true;
      } catch (PDOException $e){
        error_log($e);
        return ['error'=>true, 'message'=>'errorEditing'];
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function removeGraphic($id){
    try {
      $sql = "DELETE FROM r_cwp_graphics_groups where id_graphic = ?";
      $q = $this->conn->prepare($sql);
      $q->execute([$id]);
      try{
        $sql = "UPDATE cwp_pbi_graphics SET removed_at = now() where id = ?";
        $q = $this->conn->prepare($sql);
        $q->execute([$id]);
        return ['error'=>false, 'message'=>'removedProperly'];
      } catch (PDOException $e){
        error_log($e);
        return ['error'=>true, 'message'=>'errorRemoving'];
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>true, 'message'=>'errorRemoving'];
    }
  }
}
?>