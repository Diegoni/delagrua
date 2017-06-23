<?php
$server = $_SERVER['HTTP_HOST'];

// Check enviroment
if ($server == 'www.delagrua.loc' || $server == 'delagrua.loc') 
{
    error_reporting(0);

    $hostname_config = "localhost";
    $database_config = "delagrua";
    $username_config = "root";
    $password_config = "root";

    $email_admin_cuentas = 'delagrua1@gmail.com';
    $email_admin_taller = 'delagrua1@gmail.com';
    $email_contacto = 'delagrua1@gmail.com';

    $url_relativa = 'http://www.delagrua.loc/';
}else 
{
    error_reporting(0);
    $hostname_config = "localhost";
    $database_config = "delagrua";
    //$username_config = "jasdju8712jj";
    //$password_config = "k1209djjauuuua";
    $username_config = "root";
    $password_config = "";

    $email_admin_cuentas = 'delagrua1@gmail.com';
    $email_admin_taller = 'delagrua1@gmail.com';
    $email_contacto = 'delagrua1@gmail.com';

    //$url_relativa = 'http://www.delagrua.com/';
    $url_relativa = 'http://localhost/delagrua/';
}

define('DB_HOST',       $hostname_config);
define('DB_USER',       $username_config);
define('DB_PASS',       $password_config);
define('DB_NAME',       $database_config);
define('DB_CHARSET',    'utf-8');

$_config = array(
    'libraries' => $url_relativa.'libraries/',
    'url'       => $url_relativa
);

$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(), E_USER_ERROR);
?>