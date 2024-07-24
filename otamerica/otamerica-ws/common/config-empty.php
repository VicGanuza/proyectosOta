<?php
$config = array();
$config['secure'] = array();
$config['secure']['mail'] = array();
$config['secure']['database'] = array();
$config['secure']['providers'] = array();

$config['server'] = 'https://localhost';
$config['webservices'] = '/';

$config['product'] = 'sip-mobile';
$config['version'] = '1.0';
$config['description'] = 'SIP Móvil';
$config['environment'] = 'development'; /* development | production */

$config['pushpad-project-id'] = 'YOUR PUSHPAD PROJECT ID';
$config['google-application-id'] = 'YOUR GOOGLE CLIENT ID';
$config['microsoft-application-id'] = 'YOUR MICROSOFT CLIENT ID';
$config['facebook-application-id'] = 'YOUR FACEBOOK CLIENT ID';
$config['yahoo-application-id'] = 'YOUR YAHOO CLIENT ID';

$config['secure']['pushpad-authorization-token'] = 'YOUR PUSHPAD PROJECT PASSWORD';
$config['secure']['google-recaptcha-secret-key'] = 'YOUR GOOGLE RECAPTCHA KEY';
$config['secure']['google-application-secret'] = 'YOUR GOOGLE CLIENT SECRET';
$config['secure']['microsoft-application-secret'] = 'YOUR MICROSOFT CLIENT SECRET';
$config['secure']['facebook-application-secret'] = 'YOUR FACEBOOK CLIENT SECRET';
$config['secure']['yahoo-application-secret'] = 'YOUR YAHOO CLIENT SECRET';

$authorization = "{$config['server']}{$config['webservices']}authorization";
$config['google-authorization-provider'] = "$authorization/google.php";
$config['microsoft-authorization-provider'] = "$authorization/microsoft.php";
$config['facebook-authorization-provider'] = "$authorization/facebook.php";
$config['yahoo-authorization-provider'] = "$authorization/yahoo.php";

$config['secure']['mail']['hostname'] = 'mail.domain.com';
$config['secure']['mail']['fullname'] = 'Accounts Manager';
$config['secure']['mail']['username'] = 'accounts@domain.com';
$config['secure']['mail']['password'] = 'secret';
$config['secure']['mail']['company'] = 'SIP';
$config['secure']['mail']['smtp-secure'] = 'ssl';
$config['secure']['mail']['auto-tls'] = true;
$config['secure']['mail']['verify-peer'] = true;
$config['secure']['mail']['port'] = 587;

$path = __DIR__;
$config['secure']['database']['connection'] = "sqlite:$path/../database/database.db";
$config['secure']['database']['username'] = null;
$config['secure']['database']['password'] = null;
?>
