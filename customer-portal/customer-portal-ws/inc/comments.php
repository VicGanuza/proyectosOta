<?php

class Comments
{
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();

  }

  function commentsByGraphic($id){
    try {
      $sql = "SELECT c.id, c.graphic_id, c.user_id, 
              Date_format(c.date, '%d/%m/%Y %H:%i') as date, c.comment,
              concat(substring(u.name,1,1),substring(u.lastname,1,1)) as avatar,
              concat(u.name,' ', u.lastname) as fullname,
              u.isAdmin
              FROM cwp_comments c LEFT JOIN cwp_users u on u.id = c.user_id WHERE graphic_id = ?  ORDER BY c.date desc";
      $q = $this->conn->prepare($sql);
      $q->execute([$id]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i = 0; $i < count($rows); $i++){
        try {
          $s = "SELECT c.id, c.comment_id, c.user_id, 
              Date_format(c.date, '%d/%m/%Y %H:%i') as date, c.comment,
              concat(substring(u.name,1,1),substring(u.lastname,1,1)) as avatar,
              concat(u.name,' ', u.lastname) as fullname,
              u.isAdmin FROM cwp_comments_reply c LEFT JOIN cwp_users u on u.id = c.user_id  WHERE comment_id = ?  ORDER BY c.date desc";
          $q = $this->conn->prepare($s);
          $q->execute([$rows[$i]['id']]);
          $r = $q->fetchAll(PDO::FETCH_ASSOC);
          $rows[$i]['reply'] = $r;
          
        } catch (PDOException $e) {
          error_log($e);
          return ['error'=>true, 'message'=>'errorSearching'];
        }
      }
      return $rows;
    } catch (Exception $e) {
      error_log($e);
      return ['error'=>true, 'message'=>'errorSearching'];
    }
  }

  function newComment($data){
    try {
      error_log(json_encode($data));
      $s = "SELECT id, concat(u.name,' ', u.lastname) as fullname FROM cwp_users u WHERE username = ? and active = 1";
      $q = $this->conn->prepare($s);
      $q->execute([$data['user']]);
      $r = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($r['id'])){
        $sql = "INSERT INTO cwp_comments (graphic_id, user_id, date, comment) VALUES (?,?,now(),?)";
        $q = $this->conn->prepare($sql);
        $q->execute([$data['graphic_id'], $r['id'],$data['newComment']]);
        try {
          $s = "SELECT title FROM cwp_pbi_graphics WHERE id = ?";
          $q = $this->conn->prepare($s);
          $q->execute([$data['graphic_id']]);
          $gr = $q->fetch(PDO::FETCH_ASSOC);
          try {
            $s1 = "SELECT username FROM cwp_users where isAdmin = 1";
            $q = $this->conn->prepare($s1);
            $q->execute();
            $admins = $q->fetchAll(PDO::FETCH_ASSOC);
            $admin_mails = [];
            for ($i = 0; $i<count($admins); $i++){
              $admin_mails[]=$admins[$i]['username'];
            }//
            error_log(json_encode($admin_mails));
            //$admin_mails = ['victoriaganuza@gmail.com','vic.toriaga.nuz.a@gmail.com'];
            $template = "nuevo_comentario.html";
            $asunto = "Nuevo Comentario";
            $replace['nombre_usuario'] = $r['fullname'];
            $replace['nombre_grafico'] = $gr['title'];
            $replace['linkConsulta'] = 'https://otamerica.com/costumer-portal/#/graphic/'.$data['graphic_id'];
            $replace['comentario'] = $data['newComment'];

            $enviado = Mail::enviarMailPlantilla($admin_mails,  __DIR__.'/../mail_templates/'.$template, $asunto, $replace);
            //return $enviado;
            //return ['admin_mails'=>$admin_mails, 'replace'=>$replace];
            return true;
          } catch(PDOException $e){
            error_log($e);
            return ['error'=>false, 'message'=>'somethingWentWrong'];
          }
        } catch(PDOException $e){
          error_log($e);
          return ['error'=>false, 'message'=>'somethingWentWrong'];
        }
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>false, 'message'=>'somethingWentWrong'];
    }
  }

  function replyComment($data){
    try {
      $s = "SELECT id, concat(u.name,' ', u.lastname) as fullname, isAdmin FROM cwp_users u WHERE username = ? and active = 1";
      $q = $this->conn->prepare($s);
      $q->execute([$data['user']]);
      $r = $q->fetch(PDO::FETCH_ASSOC);
      if (isset($r['id'])){
        $sql = "INSERT INTO cwp_comments_reply (comment_id, user_id, date, comment) VALUES (?,?,now(),?)";
        $q = $this->conn->prepare($sql);
        $q->execute([$data['comment_id'], $r['id'],$data['newReplay']]);
        try {
          $sqdata = "SELECT CONCAT(u.name,' ', u.lastname) as fullname, gr.title, c.comment, gr.id as graphic_id from cwp_comments c 
          left join cwp_users u on u.id = c.user_id  
          left join cwp_pbi_graphics gr on gr.id = c.graphic_id 
          where c.id = ? ";
          $q = $this->conn->prepare($sqdata);
          $q->execute([$data['comment_id']]);
          $dataSql = $q->fetch(PDO::FETCH_ASSOC);

          try {
            $s1 = "SELECT username FROM cwp_users where isAdmin = 1";
            $q = $this->conn->prepare($s1);
            $q->execute();
            $admins = $q->fetchAll(PDO::FETCH_ASSOC);
            $admin_mails = [];
            for ($i = 0; $i<count($admins); $i++){
              $admin_mails[]=$admins[$i]['username'];
            }
            error_log(json_encode($admin_mails));
            //$admin_mails = ['victoriaganuza@gmail.com','vic.toriaga.nuz.a@gmail.com'];
            if ($r['isAdmin']) {
              $template = "respuesta_admin.html";
              $asunto = "Nueva Respuesta de Admin";
              $replace['nombre_admin'] = $r['fullname'];
              $replace['nombre_usuario'] = $dataSql['fullname'];
            } else {
              $template = "respuesta_comentario.html";
              $asunto = "Nueva Respuesta de Usuario";
              $replace['nombre_usuario'] = $r['fullname'];
            }
            
            $replace['comentario'] = $dataSql['comment'];
            $replace['nombre_grafico'] = $dataSql['title'];
            $replace['linkConsulta'] = 'https://otamerica.com/costumer-portal/#/graphic/'.$dataSql['graphic_id'];
            $replace['respuesta'] = $data['newReplay'];

            $enviado = Mail::enviarMailPlantilla($admin_mails,  __DIR__.'/../mail_templates/'.$template, $asunto, $replace);
            //return $enviado;
            //return ['admin_mails'=>$admin_mails, 'replace'=>$replace];
            return true;
          } catch(PDOException $e){
            error_log($e);
            return ['error'=>false, 'message'=>'somethingWentWrong'];
          }
        } catch (PDOException $e){
          error_log($e);
          return ['error'=>false, 'message'=>'somethingWentWrong'];
        }
      }
    } catch (PDOException $e){
      error_log($e);
      return ['error'=>false, 'message'=>'somethingWentWrong'];
    }
  }
}