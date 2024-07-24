<?php
Class Certificate {
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
      $sql = "Select co.*, c.name, s.* from certification_office co 
              left join certification c on co.certification_id = c.id 
              inner join 
                (select o.id as office,o.region, u.location_id, l.lang_key as country from offices o 
                    left join users u on o.location_id = u.location_id left join locations l on l.id=u.location_id 
                    where u.username = ?) s on s.office = co.office_id
              where 1";
      if (isset($data['id'])) {
        $sql .= " and co.id = ?";
        $op[]=$data['id'];
      }
      $sql .= " order by s.region";
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
  function edit($data){
    try {
      $s = "UPDATE certification_office SET url = ? where id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$data['url'],$data['id']]);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
}