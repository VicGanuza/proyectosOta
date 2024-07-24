<?php
class Cuenta
{
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";

    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function login($user) {
    try {
      $s = "Select * from users where username = ? and password = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$user['username'],$user['password']]);
      $row = $q->fetchAll(PDO::FETCH_ASSOC);
      if (count($row) == 0){
        return false;
      } else {

        $username = $row[0]['username'];

        $headers = array('alg'=>'HS256','typ'=>'JWT');
        $payload = array('username'=>$username, 'exp'=>(time() + 60));

        $jwt = generate_jwt($headers, $payload);

        return $jwt;
      }
    } catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function getAccess($user) {
    try {
      $s = "Select sa.section_lang_key as section, sa.access from users u left join section_admins sa on sa.location_id = u.location_id where u.username = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$user]);
      $row = $q->fetchAll(PDO::FETCH_ASSOC);
      if (count($row) == 0){
        return false;
      } else {
        if ($user == "admin") {
          $row[] = ['section' =>'userManager', 'access'=>'/userManager'];
        }
        return $row;
      }
    } catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
}