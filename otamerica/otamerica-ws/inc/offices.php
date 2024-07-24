<?php
class Offices {
  private $conn;

  function __construct()
  {
    require_once __DIR__ . "/../include/DbConnect.php";
    // opening db connection
    $db = new DbConnect();
    $this->conn = $db->connect();
  }

  function getOfficesList($data) {
    try {
      /*
    * filtros disponibles:
      [
        'location'      => (int id del pais)
        'nombre'            => (string nombre oficina)
        'business_area'  => (int id del area)
        'product'                => (int id del producto)
        'access_type'             => (int tipo de acceso)
        'service'           => (int id del servicio)
       ]
    */
      $op = [];
      $sql = "select o.id, o.name, o.region, l.lang_key as country, ot.lang_key as terminal_type, o.terminal_page, o.office_page_img from offices o
              left join locations l on l.id = o.location_id
              left join offices_terminals ot on ot.id = o.office_terminal_id
              ";


      if (property_exists($data, 'product')) {//
        $sql .= ' inner join products_office po on po.office_id = o.id and po.product_id = ?';
        $op[] = $data->product;
      }

      if (property_exists($data, 'business_area')) {//
        $sql .= ' inner join offices_business_areas oba on oba.office_id = o.id and oba.business_area_id = ?';
        $op[] = $data->business_area;
      }

      if (property_exists($data, 'access_type')) {//
        $sql .= ' inner join offices_access_types oat on oat.office_id = o.id and oat.access_type_id = ?';
        $op[] = $data->access_type;
      }

      if (property_exists($data, 'service')) {//
        $sql .= ' inner join offices_services os on os.office_id = o.id and os.service_id = ?';
        $op[] = $data->service;
      }

      if (property_exists($data, 'preSelected')) {//
        switch ($data->preSelected) {
          case 1: {//oil Products
            $sql .= ' inner join products_office po on po.office_id = o.id and po.product_id =  2';
            break;
          }
          case 2: {//chemical
            $sql .= ' inner join products_office po on po.office_id = o.id and (po.product_id = 5 or po.product_id = 4)';
            break;
          }
          case 3: {//gas
            $sql .= ' inner join products_office po on po.office_id = o.id and po.product_id = 8';
            break;
          }
          case 4: {//others
            $sql .= ' inner join products_office po on po.office_id = o.id and (po.product_id = 1 or po.product_id = 3 or po.product_id = 6 or po.product_id = 7)';
            break;
          }
        }

      }

      $sql .= ' where activa = 1';

      if (property_exists($data, 'location')) {//
        $sql .= ' and o.location_id = ?';
        $op[] = $data->location;
      }

      if (property_exists($data, 'nombre') && strlen($data->nombre)) {
        $sql .= " and o.name like ? ";
        $op[] = '%' . $data->nombre . '%';
      }

      $sql .= "
        group by o.id
        order by l.name";
      $q = $this->conn->prepare($sql);
      $q->execute($op);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);

      for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['name'] = utf8_encode($rows[$i]['name']);
        $rows[$i]['region'] = utf8_encode($rows[$i]['region']);

        $s = "select p.lang_key from products_office po left join products p on p.id = po.product_id where office_id = ? order by po.product_id asc";
        $q = $this->conn->prepare($s);
        $q->execute([$rows[$i]['id']]);
        $rows[$i]['products'] = $q->fetchAll(PDO::FETCH_ASSOC);
      }
      return $rows;

    }catch (PDOException $e) {
      error_log($e);
      return false;
    }
  }
  function servicesByOffice($id){
    try {
      $s = "select * from office_services where office_id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      $row =  $q->fetch(PDO::FETCH_ASSOC);
      return ['en'=>utf8_encode($row['services_en']),'es'=>utf8_encode($row['services_es']),'pt'=>utf8_encode($row['services_pt'])];
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function productsByOffice($id){
    try {
      $s = "select p.lang_key from products_office po left join products p on p.id = po.product_id where office_id = ? order by po.product_id asc";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function accessTypesByOffice($id){
    try {
      $s = "select a.lang_key from offices_access_types oat left join access_types a on a.id = oat.access_type_id where office_id = ? order by oat.access_type_id asc";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function tankTypesByOffice($id){
    try {
      $s = "select t.lang_key from offices_tank_types tp left join tank_types t on t.id = tp.tank_type_id where office_id = ? order by tp.tank_type_id asc";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function documentsByOffice($id){
    try {
      $s = "select name, url from documentation where office_id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      $rows =  $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i=0; $i < count($rows); $i++) {
        $rows[$i]['name'] =  utf8_encode($rows[$i]['name']);
      }
      return $rows;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function certificationsByOffice($id){
    try {
      $s = "select c.name, co.url from certification_office co left join certification c on c.id = co.certification_id where co.office_id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function publicAccessByOffice($id){
    try {
      $s = "select * from public_access where office_id = ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i=0; $i < count($rows); $i++) {
        $rows[$i]['name'] =  utf8_encode($rows[$i]['name']);
      }
      return $rows;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function personalByOffice($id){
    try {
      $s = "select p.name, pos.lang_key from personal_office po
            left join personal p on p.id = po.personal_id
            left join positions pos on pos.id = p.position_id
            where po.office_id= ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i=0; $i < count($rows); $i++) {
        $rows[$i]['name'] =  utf8_encode($rows[$i]['name']);
      }
      return $rows;
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function maritimeFacilities($id){
    try {
      $s = "select * from maritime_facilities
            where office_id= ?";
      $q = $this->conn->prepare($s);
      $q->execute([$id]);
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }

  function getTerminalData($id){
    try {
      $sql = "SELECt o.*, ot.lang_key as terminal, l.lang_key as location from offices o 
              left join locations l on l.id = o.location_id
              left join offices_terminals ot on ot.id = o.office_terminal_id
              where o.id = ?";
      /*$sql = "SELECt o.name,o.address, o.city, o.region, o.office_terminal_id, o.location_id, o.phone, o.fax, o.email, o.gps_coordinates,
                  o.local_time, o.area_plan, o.site_plan, o.railway_map, o.terminal_data, o.terminal_page_img, o.cbm_tank_capacity, o.tanks,
                  o.cbm_tank_sizes from offices o
                  left join locations l on l.id = o.location_id
                  left join offices_terminals ot on ot.id = o.office_terminal_id
                  where o.id = ?";*/
      //return $sql;
       $q = $this->conn->prepare($sql);
      $q->execute([$id]);
      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['name'] = utf8_encode($rows[$i]['name']);
        $rows[$i]['address'] = utf8_encode($rows[$i]['address']);
        $rows[$i]['city'] = utf8_encode($rows[$i]['city']);
        $rows[$i]['region'] = utf8_encode($rows[$i]['region']);
         /*$rows[$i]['phone'] = utf8_encode($rows[$i]['phone']);
         $rows[$i]['email'] = utf8_encode($rows[$i]['email']);
         $rows[$i]['gps_coordinates'] = utf8_encode($rows[$i]['gps_coordinates']);
         $rows[$i]['area_plan'] = utf8_encode($rows[$i]['area_plan']);
         $rows[$i]['site_plan'] = utf8_encode($rows[$i]['site_plan']);
         $rows[$i]['terminal_data'] = utf8_encode($rows[$i]['terminal_data']);
         $rows[$i]['terminal_page_img'] = utf8_encode($rows[$i]['terminal_page_img']);*/

        $rows[$i]['products'] = $this->productsByOffice($rows[$i]['id']);
        $rows[$i]['services'] = $this->servicesByOffice($rows[$i]['id']);
        $rows[$i]['access_types'] = $this->accessTypesByOffice($rows[$i]['id']);
        $rows[$i]['tank_types'] = $this->tankTypesByOffice($rows[$i]['id']);
        $rows[$i]['documents'] = $this->documentsByOffice($rows[$i]['id']);
        $rows[$i]['certifications'] = $this->certificationsByOffice($rows[$i]['id']);
        $rows[$i]['public_access'] = $this->publicAccessByOffice($rows[$i]['id']);
        $rows[$i]['personal'] = $this->personalByOffice($rows[$i]['id']);
        $rows[$i]['marimeFacilities'] = $this->maritimeFacilities($rows[$i]['id']);
      }
      return $rows[0];
    }catch (PDOException $e){
      error_log($e);
      return false;
    }
  }
  function getOfficesFacts(){
    $sql = "select count(offices.terminal_page) as terminales, 
                    sum(offices.tank_capacity) as cdm_total, 
                    '57.70' as dwt_total, 
                    (select count(id)-1 from locations where 1) as location_total,
                    '475' as employees from offices where offices.terminal_page = 1 and offices.activa";
    $q = $this->conn->prepare($sql);
    $q->execute();
    return $q->fetchAll(PDO::FETCH_ASSOC)[0];
  }
}
?>