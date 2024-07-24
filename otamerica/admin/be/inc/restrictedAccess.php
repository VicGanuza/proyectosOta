<?php
Class RestrictedAccess {
  function getIpAddress()
  {
    if (!empty($_SERVER ['HTTP_CLIENT_IP'] ))
      $ip=$_SERVER ['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER ['HTTP_X_FORWARDED_FOR'] ))
      $ip=$_SERVER ['HTTP_X_FORWARDED_FOR'];
    else
      $ip=$_SERVER ['REMOTE_ADDR'];

    return $ip;
  }

  function ipCheck ($IP, $CIDR) {
    list ($net, $mask) = explode ("/", $CIDR);

    $ip_net = ip2long ($net);
    $ip_mask = ~((1 << (32 - $mask)) - 1);

    $ip_ip = ip2long ($IP);

    $ip_ip_net = $ip_ip & $ip_mask;

    return ($ip_ip_net == $ip_net);
  }

  function restrictRange()
  {
    $ipCliente = $this->getIpAddress();

    if(($ipCliente == "190.194.118.111") || ($ipCliente="::1") || ($ipCliente == '80.109.238.54'))
      return true;
    else
      if ($this->ipCheck ($ipCliente, "136.226.0.0/23")) return true;
      else return $this->ipCheck ($ipCliente, "64.215.22.0/24");
  }
}