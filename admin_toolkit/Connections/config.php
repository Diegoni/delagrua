<?php
$server = $_SERVER['HTTP_HOST'];

// Check enviroment
if ($server == 'www.delagrua.loc' || $server == 'delagrua.loc') 
{
  //  error_reporting(0);

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
    //error_reporting(0);
    $hostname_config = "localhost";
    $database_config = "c0730102_dlg";
    //$username_config = "jasdju8712jj";
    //$password_config = "k1209djjauuuua";
    $username_config = "c0730102_dlg";
    $password_config = "zo86MErona";

    $email_admin_cuentas = 'delagrua1@gmail.com';
    $email_admin_taller = 'delagrua1@gmail.com';
    $email_contacto = 'delagrua1@gmail.com';

    //$url_relativa = 'http://www.delagrua.com/';
    $url_relativa = 'http://c0730102.ferozo.com/';
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



try
{
	$config = mysql_connect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(), E_USER_ERROR);
		
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>