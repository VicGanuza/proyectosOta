<?php
function obtenerDireccionIP()
{
  if (!empty($_SERVER ['HTTP_CLIENT_IP'] ))
    $ip=$_SERVER ['HTTP_CLIENT_IP'];
  elseif (!empty($_SERVER ['HTTP_X_FORWARDED_FOR'] ))
    $ip=$_SERVER ['HTTP_X_FORWARDED_FOR'];
  else
    $ip=$_SERVER ['REMOTE_ADDR'];

  return $ip;
}

function restringirRango()
{
  $ipCliente = obtenerDireccionIP();
  $ex = explode('.',$ipCliente);

  return ['ip'=>$ipCliente];

  if(substr($ipCliente, 0, 10 ) == "136.226.0.")
  {
    $rta = (intval($ex[3]) >= 0 && intval($ex[3]) <= 23) ? true : false;
    return $rta;
  }
  else
  {
    if(substr($ipCliente, 0, 10 ) == "64.215.22.")
    {
      $rta = (intval($ex[3]) >= 0 && intval($ex[3]) <= 24) ? true : false;
      return $rta;
    } else
      return false;
  }
}

function ipCheck ($IP, $CIDR) {
  list ($net, $mask) = explode ("/", $CIDR);

  $ip_net = ip2long ($net);
  $ip_mask = ~((1 << (32 - $mask)) - 1);

  $ip_ip = ip2long ($IP);

  $ip_ip_net = $ip_ip & $ip_mask;

  return ($ip_ip_net == $ip_net);
}
echo ipCheck ("136.226.1.0", "136.226.0.0/23");
echo " 136.22.1.0";