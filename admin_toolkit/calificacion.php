<?php require_once('session.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formguardar")) {



  $publicar = $_POST['publicar'];
  $publicarguardado = $_POST['publicarguardado'];
  $idcalificacion = $_POST['idcalificacion'];
  $idtaller = $_POST['idtaller'];
  $atencion = $_POST['atencion'];
  $precio = $_POST['precio'];
  $servicio = $_POST['servicio'];


  for($i=0;$i<count($idcalificacion);$i++){
	  $colname_registro = $idtaller[$i];
	  mysql_select_db($database_config, $config);
	  $query_registro = sprintf("SELECT atencion, precio, servicio FROM dlg_taller WHERE idtaller = %s", GetSQLValueString($colname_registro, "int"));
	  $registro = mysql_query($query_registro, $config) or die(mysql_error());
	  $row_registro = mysql_fetch_assoc($registro);
	  $totalRows_registro = mysql_num_rows($registro);

	  $updateSQL = sprintf("UPDATE dlg_calificacion SET publicar=%s WHERE idcalificacion=%s",
						   GetSQLValueString($publicar[$i], "int"),
						   GetSQLValueString($idcalificacion[$i], "int"));
	  mysql_select_db($database_config, $config);
	  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

    // Si cambia
	  if($publicar[$i] != $publicarguardado[$i]){
      // Si se está publicando
		  if($publicar[$i] == '1'){
			$taller_atencion = $row_registro['atencion'] + $atencion[$i];
			$taller_precio = $row_registro['precio'] + $precio[$i];
			$taller_servicio = $row_registro['servicio'] + $servicio[$i];


      // Preparar data para el mail
      // Calificación
     $calificacion = sprintf("SELECT * FROM dlg_calificacion WHERE idcalificacion = %s", GetSQLValueString($idcalificacion[$i], "int"));
     $registro = mysql_query($calificacion, $config) or die(mysql_error());
     $calificacion = mysql_fetch_assoc($registro);
     // echo json_encode($calificacion);
     // die();

     // Taller
     $taller = sprintf("SELECT * FROM dlg_taller WHERE idtaller = %s", GetSQLValueString($idtaller[$i], "int"));
     $registro = mysql_query($taller, $config) or die(mysql_error());
     $taller = mysql_fetch_assoc($registro);
     // echo json_encode($taller);
     // die();

     // User
     $user = sprintf("SELECT * FROM dlg_usuario WHERE idusuario = %s", GetSQLValueString($calificacion['idusuario'], "int"));
     $query = mysql_query($user, $config) or die(mysql_error());
     $user = mysql_fetch_assoc($query);
     // echo json_encode($user);
     // die();


      // Send mail
     require_once('../class.phpmailer.php');
     require_once('../mailTemplate.php');

     $mail = new PHPMailer();
     $paragraphs = [];
     $paragraphs[] = "Hola " . $user['nick' ] . ':';
     $paragraphs[] = "Su calificación en www.delagrua.com para " . $taller['nombre'] . " ha sido aprobada.";
     $paragraphs[] = 'Atentamente<br>El equipo de Delagrua';


     $mail = new PHPMailer();
     $mail->IsHTML(true);
     $mail->FromName = 'DE LA GRUA';
     $mail->From = $email_admin_cuentas;
     $mail->AddAddress($user['email']);
     $mail->Subject = utf8_decode("DE LA GRUA - Calificación aprobada");
     $mail->Body = mailTemplate('Muchas gracias', $paragraphs) ;

     if ($mail->Send()){
      $mensaje = 'Se envió un mail a ' . $user['email'];
    } else {
      $mensaje = 'No se pudo enviar mail a ' . $user['email'];
    }






		  } else {
			$taller_atencion = $row_registro['atencion'] - $atencion[$i];
			$taller_precio = $row_registro['precio'] - $precio[$i];
			$taller_servicio = $row_registro['servicio'] - $servicio[$i];
		  }
		  $updateSQL = sprintf("UPDATE dlg_taller SET atencion=%s, precio=%s, servicio=%s WHERE idtaller=%s",
							   GetSQLValueString($taller_atencion, "int"),
                 GetSQLValueString($taller_precio, "int"),
                 GetSQLValueString($taller_servicio, "int"),
                 GetSQLValueString($idtaller[$i], "int"));

		  mysql_select_db($database_config, $config);
		  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());



	  }

  }
  $updateGoTo = "calificacion.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }





 header(sprintf("Location: %s", $updateGoTo));
}

// End update



$maxRows_registros = 30;
$pageNum_registros = 0;
if (isset($_GET['pageNum_registros'])) {
  $pageNum_registros = $_GET['pageNum_registros'];
}
$startRow_registros = $pageNum_registros * $maxRows_registros;

$colname_registros = date('Y-m-d');
if (isset($_GET['fechadesde'])) {
  $colname_registros = formato_fecha_mysql($_GET['fechadesde']);
}
$colname2_registros = date('Y-m-d');
if (isset($_GET['fechahasta'])) {
  $colname2_registros = formato_fecha_mysql($_GET['fechahasta']);
}
mysql_select_db($database_config, $config);
$query_registros = "SELECT dlg_calificacion.idcalificacion, dlg_calificacion.fechahora, dlg_calificacion.calificacion, dlg_calificacion.atencion, dlg_calificacion.precio, dlg_calificacion.servicio, dlg_calificacion.publicar, dlg_taller.idtaller, dlg_taller.nombre AS taller, dlg_usuario.nick FROM dlg_calificacion LEFT JOIN dlg_taller ON dlg_taller.idtaller = dlg_calificacion.idtaller LEFT JOIN dlg_usuario ON dlg_usuario.idusuario = dlg_calificacion.idusuario ";
$query_registros .= sprintf(" WHERE DATE(fechahora) BETWEEN %s AND %s", GetSQLValueString($colname_registros, "date"), GetSQLValueString($colname2_registros, "date"));

$query_registros .= " ORDER BY fechahora DESC, publicar ASC";
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
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
</script>
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
<script src="../jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/main.js"></script>
<style>
.entero {
	float: left;
	width: 90%;
	margin-right: 5%;
	margin-left: 5%;
}

</style>
<link href="../jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="../jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<!--datepicker -->
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui.datepicker-es.js"></script>

<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
  $( "#fechadesde").datepicker(
		$.extend(
		$.datepicker.regional['es'],
		{
		firstDay:1,
		changeMonth:true,
		changeYear:true,
		yearRange:"1900:2040"
		}
		)
		);
});
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
  $( "#fechahassta").datepicker(
		$.extend(
		$.datepicker.regional['es'],
		{
		firstDay:1,
		changeMonth:true,
		changeYear:true,
		yearRange:"1900:2040"
		}
		)
		);
});
</script>
<!-- fin datepicker -->

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
<div class="uno"><a class="fa fa-wrench"></a> CALIFICACIONES</div>
<div class="entero">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="9">
    <form action="calificacion.php" method="get" id="formbuscar" name="formbuscar">
    <strong>Fecha
    desde
    <input name="fechadesde" type="text" class="input" id="fechadesde" value="<?php if(isset($_GET['fechadesde'])){ echo $_GET['fechadesde']; }  else {echo date('d-m-Y');}?>">
     hasta
     <input name="fechahasta" type="text" class="input" id="fechahasta" value="<?php if(isset($_GET['fechahasta'])){ echo $_GET['fechahasta']; }  else {echo date('d-m-Y');}?>">
<a href="#"><img src="img/iconos/buscar.png" alt="" width="32" height="32" onClick="MM_callJS('document.formbuscar.submit();')"/></a></strong>
    </form>
      </td>
    </tr>
  <form method="post" action="<?php echo $editFormAction; ?>" name="formguardar" id="formguardar">
  <tr>
    <td><strong>Fecha y hora</strong></td>
    <td><strong>Calificación<a href="#"></a></strong></td>
    <td><strong>Usuario</strong></td>
    <td><strong>Taller</strong></td>
    <td><strong>Atención</strong></td>
    <td><strong>Precio</strong></td>
    <td><strong>Servicio</strong></td>
    <td><strong>Publicar <a href="#"><img src="img/iconos/guardar.png" alt="Guardar orden" width="18" height="18" id="btnguardar" title="Guardar orden" onClick="MM_callJS('document.formguardar.MM_update.value=\'formguardar\';document.formguardar.submit();')"/></a></strong></td>
    <td align="center"></td>
    </tr>
  <?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
    <?php do { ?>
      <tr <?php if (!(strcmp(0, $row_registros['publicar']))) {echo "bgcolor=\"#F69D9E\"";} ?>>
        <td>
		<?php
		$fecha = explode(' ',$row_registros['fechahora']);
		echo formato_fecha($fecha[0]) . " " .  $fecha[1];
		?>
        </td>
        <td><?php echo $row_registros['calificacion']; ?></td>
        <td><?php echo $row_registros['nick'];?></td>
        <td><?php echo $row_registros['taller'];?>
          <input name="idtaller[]" type="hidden" id="idtaller[]" value="<?php echo $row_registros['idtaller']; ?>"></td>
        <td><?php echo $row_registros['atencion'];?>
          <input name="atencion[]" type="hidden" id="atencion[]" value="<?php echo $row_registros['atencion']; ?>"></td>
        <td><?php echo $row_registros['precio'];?>
          <input name="precio[]" type="hidden" id="precio[]" value="<?php echo $row_registros['precio']; ?>"></td>
        <td><?php echo $row_registros['servicio'];?>
          <input name="servicio[]" type="hidden" id="servicio[]" value="<?php echo $row_registros['servicio']; ?>"></td>
        <td><select name="publicar[]" id="publicar[]">
          <option value="1" <?php if (!(strcmp(1, $row_registros['publicar']))) {echo "selected=\"selected\"";} ?>>si</option>
          <option value="0" <?php if (!(strcmp(0, $row_registros['publicar']))) {echo "selected=\"selected\"";} ?>>no</option>
        </select>
          <input name="idcalificacion[]" type="hidden" id="idcalificacion[]" value="<?php echo $row_registros['idcalificacion']; ?>">
          <input name="publicarguardado[]" type="hidden" id="publicarguardado[]" value="<?php echo $row_registros['publicar']; ?>"></td>
        <td align="center"><?php if (!(strcmp(0, $row_registros['publicar']))) { ?><a href="calificacion_borrar.php?idcalificacion=<?php echo $row_registros['idcalificacion']; ?>"><img src="img/iconos/borrar.png" width="32" height="32" alt=""/></a><?php } ?></td>
      </tr>
      <?php } while ($row_registros = mysql_fetch_assoc($registros)); ?>
    <?php mysql_free_result($registros); ?>
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
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="2" align="right"><?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
      &nbsp;<?php echo ($startRow_registros + 1) ?>-
      <?php echo min($startRow_registros + $maxRows_registros, $totalRows_registros) ?>/<?php echo $totalRows_registros ?>
      <?php } // Show if recordset not empty ?>    </td>
    </tr>
	<input type="hidden" name="MM_update" value="">
	</form>
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
<script type="text/javascript">
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
  $( "#fechanacimiento").datepicker(
		$.extend(
		$.datepicker.regional['es'],
		{
		firstDay:1,
		changeMonth:true,
		changeYear:true,
		yearRange:"1900:2040"
		}
		)
		);
});
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
  $( "#fechahasta").datepicker(
		$.extend(
		$.datepicker.regional['es'],
		{
		firstDay:1,
		changeMonth:true,
		changeYear:true,
		yearRange:"1900:2040"
		}
		)
		);
});
</script>
</body>
</html>
<?php
mysql_free_result($sesion);
mysql_close($config);
?>
