<?php require_once('Connections/config.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && true) {
      $isValid = true;
    }
  }
  return $isValid;
}

$MM_restrictGoTo = "login_error.html";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0)
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}
?>
<?php
$colname_usuario_sesion = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usuario_sesion = $_SESSION['MM_Username'];
}
mysql_select_db($database_config, $config);
$query_usuario_sesion = sprintf("SELECT nick FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_usuario_sesion, "text"));
$usuario_sesion = mysql_query($query_usuario_sesion, $config) or die(mysql_error());
$row_usuario_sesion = mysql_fetch_assoc($usuario_sesion);
$totalRows_usuario_sesion = mysql_num_rows($usuario_sesion);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<meta name="description" content="De la Grúa | Guía colectiva de talleres para autos y motos. Para que busques el taller que necesites.">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>DE LA GRUA | Guía colectiva de talleres para autos y motos</title>
<link rel="icon" href="favicon.png" type="image/png" />
<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortcut icon" href="favicon.ico" /><meta name="description" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">
<link href="css/grua.css" rel="stylesheet" type="text/css">
<link href="fonts/fuentes.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-54692324-1', 'auto');
  ga('send', 'pageview');
</script>
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script></head>
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script></head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/main.js"></script>

<body onBlur="top.location.reload(true);" onUnload="top.location.reload(true);">
<meta http-equiv="Refresh" content="1">
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<div class="wrapper"><!--wrapper-->

<div class="cont-pop"><!--pop-->
     <div class="sup">
          <img src="img/iconos/auto-negro-up.png">
     </div>

     <div class="cen">
       <div class="box-pop">
          <h1><span class="amarillo">2.</span>BIENVENIDO A DE LA GRUA!</h1>
       </div>

       <div class="box-pop">
         <h2>Hola  <?php echo $row_usuario_sesion['nick']; ?>!</h2>
       </div>
     </div>
  </div><!--pop-->
</div><!--wrapper-->

</body>
</html>
<?php
mysql_free_result($usuario_sesion);
?>
