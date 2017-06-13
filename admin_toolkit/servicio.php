<?php require_once('session.php'); ?>
<?php 
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_registros = 30;
$pageNum_registros = 0;
if (isset($_GET['pageNum_registros'])) {
  $pageNum_registros = $_GET['pageNum_registros'];
}
$startRow_registros = $pageNum_registros * $maxRows_registros;

$colname_registros = "";
if (isset($_GET['servicio'])) {
  $colname_registros = $_GET['servicio'];
}
mysql_select_db($database_config, $config);
$query_registros = sprintf("SELECT idservicio, servicio FROM dlg_servicio WHERE servicio LIKE %s ORDER BY servicio ASC", GetSQLValueString("%" . $colname_registros . "%", "text"));
$query_limit_registros = sprintf("%s LIMIT %d, %d", $query_registros, $startRow_registros, $maxRows_registros);
$registros = mysql_query($query_limit_registros, $config) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);

if (isset($_GET['totalRows_registros'])) {
  $totalRows_registros = $_GET['totalRows_registros'];
} else {
  $all_registros = mysql_query($query_registros);
  $totalRows_registros = mysql_num_rows($all_registros);
}
$totalPages_registros = ceil($totalRows_registros/$maxRows_registros)-1;

$queryString_registros = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_registros") == false && 
        stristr($param, "totalRows_registros") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_registros = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_registros = sprintf("&totalRows_registros=%d%s", $totalRows_registros, $queryString_registros);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>DE LA GRUA | Guía colectiva de talleres para autos y motos</title>
<link rel="icon" href="favicon.png" type="image/png" />
<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortcut icon" href="favicon.ico" /><meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">
<link href="css/grua.css" rel="stylesheet" type="text/css">
<link href="fonts/fuentes.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/main.js"></script>
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
</script>
<style>
.entero {
	float: left;
	width: 90%;
	margin-right: 5%;
	margin-left: 5%;
}

</style>
</head>
<body>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="wrapper"><!--wrapper-->
<div class="cabecera"><!--header-->
<div class="cont"><!--cont-->
      <div class="cont960">
       <div class="login">
       <p class="user"><?php echo $row_sesion['nick']; ?></p>
       <p class="log"><a href="<?php echo $logoutAction ?>">Cerra sesión</a> <a href="<?php echo $logoutAction ?>" class="fa fa-power-off"></a></p>
       </div>
       
       <div class="logo"><a href="index2.php"><img src="img/logos/delagrua.png" title="DE LA GRÚA"></a>
       <p>Guía colectiva de talleres para autos y motos</p>
       </div>
       
       <div class="buscanos"></div> 
</div>
</div><!--cont-->
</div><!--header-->

<div class="contenido"><!--contenido-->
<div class="cont"><!--cont-->
<div class="nav-barra sombra"><!--barra-->
<?php require_once('menu.php'); ?>
</div><!--barra-->

<div class="cont960">            
<div class="resultados-busquedas"><!--rb-->
<div class="uno"><a class="fa fa-wrench"></a> SERVICIOS</div>
<div class="entero">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="2">
    <form action="servicio.php" method="get" id="formbuscar" name="formbuscar">
    <strong>Servicio
      <input name="servicio" type="text" id="servicio" value="<?php echo $_GET['servicio'];?>" maxlength="100" onClick="this.value='';">
      <a href="#"><img src="img/iconos/buscar.png" alt="" width="32" height="32" onClick="MM_callJS('document.formbuscar.submit();')"/></a></strong>
    </form>
      </td>
    </tr>
  <tr>
    <td><strong>Servicio</strong></td>
    <td><a href="servicio_nuevo.php"><img src="img/iconos/nuevo.png" alt="Nuevo" width="32" height="32" title="Nuevo"/></a></td>
    </tr>
  <?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
    <?php do { ?>
      <tr>
        <td><?php echo $row_registros['servicio']; ?></td>
        <td><a href="servicio_editar.php?idservicio=<?php echo $row_registros['idservicio']; ?>"><img src="img/iconos/editar.png" alt="Editar" width="32" height="32" title="Editar"/></a>&nbsp;&nbsp;<a href="servicio_borrar.php?idservicio=<?php echo $row_registros['idservicio']; ?>"><img src="img/iconos/borrar.png" width="32" height="32" alt=""/></a></td>
        </tr>
      <?php } while ($row_registros = mysql_fetch_assoc($registros)); ?>
    <?php } // Show if recordset not empty ?>
<tr>
  <td><?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
      <?php if ($pageNum_registros > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, 0, $queryString_registros); ?>"><img src="img/iconos/pag_primera.png" width="26" height="26" alt=""/></a>&nbsp;<a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, max(0, $pageNum_registros - 1), $queryString_registros); ?>"><img src="img/iconos/pag_anterior.png" width="26" height="26" alt=""/></a>
        <?php } // Show if not first page ?>
  &nbsp;
  <?php if ($pageNum_registros < $totalPages_registros) { // Show if not last page ?>
    <a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, min($totalPages_registros, $pageNum_registros + 1), $queryString_registros); ?>"><img src="img/iconos/pag_siguiente.png" width="26" height="26" alt=""/></a>&nbsp;<a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, $totalPages_registros, $queryString_registros); ?>"><img src="img/iconos/pag_ultima.png" width="26" height="26" alt=""/></a>
    <?php } // Show if not last page ?>
  <?php } // Show if recordset not empty ?></td>
    <td><?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
      &nbsp;<?php echo ($startRow_registros + 1) ?>-
      <?php echo min($startRow_registros + $maxRows_registros, $totalRows_registros) ?>/<?php echo $totalRows_registros ?>
      <?php } // Show if recordset not empty ?>    </td>
    </tr>
</table>
</div>

</div><!--rb-->                     
</div>  
</div><!--cont-->
</div><!--contenido-->

<div class="pie"><!--contenido-->
     <div class="cont">
       <div class="centro">
         <div class="c"><img src="img/iconos/auto-negro.png"></div>
       <p class="r">Copyright De la Grua 2014<br>
         Design by <a href="http://www.kalidoscopio-d.com/" target="_blank">kalidoscopio</a></p>
       </div>
    </div>
</div><!--contenido-->

</div><!--wrapper-->
</body>
</html>
<?php
mysql_free_result($registros);
mysql_free_result($sesion);
mysql_close($config);
?>
