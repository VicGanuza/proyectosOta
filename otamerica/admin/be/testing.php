<?php
/*function turing($x){
  return function ($y) use ($x){
    return str_repeat($y,$x);
  };
}
$a = turing(2);
$b = turing(3);*/
echo "1" + 2 * "007";



/*function turing($x){
  return function ($y) use ($x){
    return str_repeat($y,$x);
  };
}
$a = turing(2);
$b = turing(3);
echo $a(3).$b(2);
Class Tur {
  static function mul(){
    return __METHOD__;
  }
}
/*$tur = new Tur(2);
$tur->mul = function ($x){
  return $x*$x;
    }
;
$m = $tur->mul();
echo $m(3);
print Tur::mul();

function unique_names(array $array1, array $array2) : array
{
  $data = array_merge($array1,$array2);
  return array_unique($data);
}

$names = unique_names(['Ava', 'Emma', 'Olivia'], ['Olivia', 'Sophia', 'Emma']);
echo join(', ', $names); // should print Emma, Olivia, Ava, Sophia

*function groupByOwners(array $files) : array
{
  $keys=array_keys($files);
  $values=array_values($files);
  $result = [];
  foreach ($values as $v) {
    $result[$v] = [];
  }
  foreach($keys as $key){
    array_push($result[$files[$key]],$key) ;
  }
  return $result;
}

$files = array
(
  "Input.txt" => "Randy",
  "Code.py" => "Stan",
  "Output.txt" => "Randy"
);
var_dump(groupByOwners($files));*/