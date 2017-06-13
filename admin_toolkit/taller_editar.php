<?php  require_once('session.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formguardar")) {
  $updateSQL = sprintf("UPDATE dlg_taller SET nombre=%s, tipovehiculo=%s, idmarca=%s, telefonocodarea=%s, telefono=%s, email=%s, web=%s, activo=%s WHERE idtaller=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['tipovehiculo'], "text"),
                       GetSQLValueString($_POST['idmarca'], "int"),
                       GetSQLValueString($_POST['telefonocodarea'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['web'], "text"),
                       GetSQLValueString($_POST['activo'], "int"),
                       GetSQLValueString($_POST['idtaller'], "int"));

  mysql_select_db($database_config, $config);
  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

	  $id = $_POST['idtaller'];

	  if(isset($_POST['quitarfoto1']) && ($_POST['quitarfoto1'] == 1)){
		  $updateSQL = sprintf("UPDATE dlg_taller SET foto1=%s WHERE idtaller=%s",
							   GetSQLValueString('', "text"),
							   GetSQLValueString($id, "int"));
		  mysql_select_db($database_config, $config);
		  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
	  } else {
		  $name = $_FILES['foto1']['name'];
		  $name = explode('.',$name);
		  $ext = $name[1];
		  $foto = "foto1_". $id . "." . $ext;
		  $type = $_FILES['foto1']['type'];
		  $size = $_FILES['foto1']['size'];

		  if (strpos($type, "jpg") || strpos($type, "jpeg") || strpos($type, "gif") || strpos($type, "png") && ($size < 2000000)) {

			$_FILES['foto1']['tmp_name'];
			 move_uploaded_file($_FILES['foto1']['tmp_name'], "../img/talleres/" . $foto);

			//Ruta de la original
			$rtOriginal="../img/talleres/" . $foto;
			//Crear variable de imagen a partir de la original
			$original = imagecreatefromjpeg($rtOriginal);
			//Definir tamaño máximo y mínimo
			$max_ancho = 640;
			$max_alto = 640;
			//Recoger ancho y alto de la original
			list($ancho,$alto)=getimagesize($rtOriginal);
			//Calcular proporción ancho y alto
			$x_ratio = $max_ancho / $ancho;
			$y_ratio = $max_alto / $alto;
			if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
			//Si es más pequeña que el máximo no redimensionamos
				$ancho_final = $ancho;
				$alto_final = $alto;
			}
			//si no calculamos si es más alta o más ancha y redimensionamos
			elseif (($x_ratio * $alto) < $max_alto){
				$alto_final = ceil($x_ratio * $alto);
				$ancho_final = $max_ancho;
			}
			else{
				$ancho_final = ceil($y_ratio * $ancho);
				$alto_final = $max_alto;
			}
			//Crear lienzo en blanco con proporciones
			$lienzo=imagecreatetruecolor($ancho_final,$alto_final);
			//Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
			imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
			//Limpiar memoria
			imagedestroy($original);
			//Definimos la calidad de la imagen final
			$cal=90;
			//Se crea la imagen final en el directorio indicado
			imagejpeg($lienzo,"../img/talleres/" . $foto,$cal);

		  } else {
			$foto = '';
		  }
		  if($foto != ''){
			  $updateSQL = sprintf("UPDATE dlg_taller SET foto1=%s WHERE idtaller=%s",
								   GetSQLValueString($foto, "text"),
								   GetSQLValueString($id, "int"));
			  mysql_select_db($database_config, $config);
			  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
		  }
	  }

	  if(isset($_POST['quitarfoto2']) && ($_POST['quitarfoto2'] == 1)){
		  $updateSQL = sprintf("UPDATE dlg_taller SET foto2=%s WHERE idtaller=%s",
							   GetSQLValueString('', "text"),
							   GetSQLValueString($id, "int"));
		  mysql_select_db($database_config, $config);
		  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
	  } else {
		  $name = $_FILES['foto2']['name'];
		  $name = explode('.',$name);
		  $ext = $name[1];
		  $foto = "foto2_". $id . "." . $ext;
		  $type = $_FILES['foto2']['type'];
		  $size = $_FILES['foto2']['size'];

		  if (strpos($type, "jpg") || strpos($type, "jpeg") || strpos($type, "gif") || strpos($type, "png") && ($size < 2000000)) {

			$_FILES['foto2']['tmp_name'];
			 move_uploaded_file($_FILES['foto2']['tmp_name'], "../img/talleres/" . $foto);

			//Ruta de la original
			$rtOriginal="../img/talleres/" . $foto;
			//Crear variable de imagen a partir de la original
			$original = imagecreatefromjpeg($rtOriginal);
			//Definir tamaño máximo y mínimo
			$max_ancho = 640;
			$max_alto = 640;
			//Recoger ancho y alto de la original
			list($ancho,$alto)=getimagesize($rtOriginal);
			//Calcular proporción ancho y alto
			$x_ratio = $max_ancho / $ancho;
			$y_ratio = $max_alto / $alto;
			if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
			//Si es más pequeña que el máximo no redimensionamos
				$ancho_final = $ancho;
				$alto_final = $alto;
			}
			//si no calculamos si es más alta o más ancha y redimensionamos
			elseif (($x_ratio * $alto) < $max_alto){
				$alto_final = ceil($x_ratio * $alto);
				$ancho_final = $max_ancho;
			}
			else{
				$ancho_final = ceil($y_ratio * $ancho);
				$alto_final = $max_alto;
			}
			//Crear lienzo en blanco con proporciones
			$lienzo=imagecreatetruecolor($ancho_final,$alto_final);
			//Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
			imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
			//Limpiar memoria
			imagedestroy($original);
			//Definimos la calidad de la imagen final
			$cal=90;
			//Se crea la imagen final en el directorio indicado
			imagejpeg($lienzo,"../img/talleres/" . $foto,$cal);

		  } else {
			$foto = '';
		  }
		  if($foto != ''){
			  $updateSQL = sprintf("UPDATE dlg_taller SET foto2=%s WHERE idtaller=%s",
								   GetSQLValueString($foto, "text"),
								   GetSQLValueString($id, "int"));
			  mysql_select_db($database_config, $config);
			  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
		  }
	  }

	  if(isset($_POST['quitarfoto3']) && ($_POST['quitarfoto3'] == 1)){
		  $updateSQL = sprintf("UPDATE dlg_taller SET foto3=%s WHERE idtaller=%s",
							   GetSQLValueString('', "text"),
							   GetSQLValueString($id, "int"));
		  mysql_select_db($database_config, $config);
		  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
	  } else {
		  $name = $_FILES['foto3']['name'];
		  $name = explode('.',$name);
		  $ext = $name[1];
		  $foto = "foto3_". $id . "." . $ext;
		  $type = $_FILES['foto3']['type'];
		  $size = $_FILES['foto3']['size'];

		  if (strpos($type, "jpg") || strpos($type, "jpeg") || strpos($type, "gif") || strpos($type, "png") && ($size < 2000000)) {

			$_FILES['foto3']['tmp_name'];
			 move_uploaded_file($_FILES['foto3']['tmp_name'], "../img/talleres/" . $foto);

			//Ruta de la original
			$rtOriginal="../img/talleres/" . $foto;
			//Crear variable de imagen a partir de la original
			$original = imagecreatefromjpeg($rtOriginal);
			//Definir tamaño máximo y mínimo
			$max_ancho = 640;
			$max_alto = 640;
			//Recoger ancho y alto de la original
			list($ancho,$alto)=getimagesize($rtOriginal);
			//Calcular proporción ancho y alto
			$x_ratio = $max_ancho / $ancho;
			$y_ratio = $max_alto / $alto;
			if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
			//Si es más pequeña que el máximo no redimensionamos
				$ancho_final = $ancho;
				$alto_final = $alto;
			}
			//si no calculamos si es más alta o más ancha y redimensionamos
			elseif (($x_ratio * $alto) < $max_alto){
				$alto_final = ceil($x_ratio * $alto);
				$ancho_final = $max_ancho;
			}
			else{
				$ancho_final = ceil($y_ratio * $ancho);
				$alto_final = $max_alto;
			}
			//Crear lienzo en blanco con proporciones
			$lienzo=imagecreatetruecolor($ancho_final,$alto_final);
			//Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
			imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
			//Limpiar memoria
			imagedestroy($original);
			//Definimos la calidad de la imagen final
			$cal=90;
			//Se crea la imagen final en el directorio indicado
			imagejpeg($lienzo,"../img/talleres/" . $foto,$cal);

		  } else {
			$foto = '';
		  }
		  if($foto != ''){
			  $updateSQL = sprintf("UPDATE dlg_taller SET foto3=%s WHERE idtaller=%s",
								   GetSQLValueString($foto, "text"),
								   GetSQLValueString($id, "int"));
			  mysql_select_db($database_config, $config);
			  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
		  }
	  }
	  $deleteSQL = sprintf("DELETE FROM dlg_tallerservicio WHERE idtaller=%s",
						   GetSQLValueString($_POST['idtaller'], "int"));

	  mysql_select_db($database_config, $config);
	  $Result1 = mysql_query($deleteSQL, $config) or die(mysql_error());

	  $servicio = $_POST['servicio'];
	  for($i=0;$i<count($servicio);$i++){
		$insertSQL = sprintf("INSERT INTO dlg_tallerservicio (idtaller, idservicio) VALUES (%s, %s)",
						   GetSQLValueString($id, "int"),
						   GetSQLValueString($servicio[$i], "int"));

		mysql_select_db($database_config, $config);
		$Result1 = mysql_query($insertSQL, $config) or die(mysql_error());
	  }

  $updateGoTo = "taller.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_config, $config);
$query_registros = "SELECT * FROM dlg_marca ORDER BY marca ASC";
$registros = mysql_query($query_registros, $config) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);
$totalRows_registros = mysql_num_rows($registros);

mysql_select_db($database_config, $config);
$query_registros2 = "SELECT * FROM dlg_provincia ORDER BY provincia ASC";
$registros2 = mysql_query($query_registros2, $config) or die(mysql_error());
$row_registros2 = mysql_fetch_assoc($registros2);
$totalRows_registros2 = mysql_num_rows($registros2);

$colname_registros3 = $row_registros2['idprovincia'];
if (isset($_POST['idprovincia'])) {
  $colname_registros3 = $_POST['idprovincia'];
}
mysql_select_db($database_config, $config);
$query_registros3 = sprintf("SELECT * FROM dlg_localidad WHERE idprovincia = %s ORDER BY localidad ASC", GetSQLValueString($colname_registros3, "int"));
$registros3 = mysql_query($query_registros3, $config) or die(mysql_error());
$row_registros3 = mysql_fetch_assoc($registros3);
$totalRows_registros3 = mysql_num_rows($registros3);

mysql_select_db($database_config, $config);
$query_registros4 = "SELECT * FROM dlg_servicio ORDER BY servicio ASC";
$registros4 = mysql_query($query_registros4, $config) or die(mysql_error());
$row_registros4 = mysql_fetch_assoc($registros4);
$totalRows_registros4 = mysql_num_rows($registros4);

$colname_registro = "-1";
if (isset($_GET['idtaller'])) {
  $colname_registro = $_GET['idtaller'];
}
mysql_select_db($database_config, $config);
$query_registro = sprintf("SELECT * FROM dlg_taller WHERE idtaller = %s", GetSQLValueString($colname_registro, "int"));
$registro = mysql_query($query_registro, $config) or die(mysql_error());
$row_registro = mysql_fetch_assoc($registro);
$totalRows_registro = mysql_num_rows($registro);
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
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es requerido.\n'; }
    } if (errors) alert('Error:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
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
       <p class="user">HOLA <?php echo $row_sesion['nick']; ?></p>
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
<div class="uno"><a class="fa fa-wrench"></a> EDITAR TALLER</div>
<div class="entero">
   <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="formguardar" id="formguardar" onSubmit="MM_validateForm('nombre','','R','email','','NisEmail');return document.MM_returnValue">
  <table width="100%" border="0" cellspacing="0" cellpadding="4">
   <tr>
      <td><strong>Nombre</strong></td>
      <td><input name="nombre" type="text" id="nombre" value="<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } else { echo $row_registro['nombre'];}?>" maxlength="250">
        <input name="idtaller" type="hidden" id="idtaller" value="<?php if(isset($_POST['idtaller'])){ echo $_POST['idtaller']; } else { echo $row_registro['idtaller'];}?>"></td>
      <td><strong>Tipo de vehículo</strong></td>
      <td><select name="tipovehiculo" id="tipovehiculo">
        <option value="auto" <?php if(isset($_POST['tipovehiculo'])){ if (!(strcmp("auto", $_POST['tipovehiculo']))) {echo "selected=\"selected\"";}} else { if (!(strcmp("auto", $row_registro['tipovehiculo']))) {echo "selected=\"selected\"";}} ?>>auto</option>
        <option value="moto" <?php if(isset($_POST['tipovehiculo'])){ if (!(strcmp("moto", $_POST['tipovehiculo']))) {echo "selected=\"selected\"";}} else { if (!(strcmp("moto", $row_registro['tipovehiculo']))) {echo "selected=\"selected\"";}} ?>>moto</option>
        </select></td>
    </tr>
      <tr>
        <td><strong>Marca</strong></td>
        <td><select name="idmarca" id="idmarca">
          <?php
do {
?>
          <option value="<?php echo $row_registros['idmarca']?>"<?php if(isset($_POST['idmarca'])){ if (!(strcmp($row_registros['idmarca'], $_POST['idmarca']))) {echo "selected=\"selected\"";}} else { if (!(strcmp($row_registros['idmarca'], $row_registro['idmarca']))) {echo "selected=\"selected\"";} }?>><?php echo $row_registros['marca']?></option>
          <?php
} while ($row_registros = mysql_fetch_assoc($registros));
  $rows = mysql_num_rows($registros);
  if($rows > 0) {
      mysql_data_seek($registros, 0);
	  $row_registros = mysql_fetch_assoc($registros);
  }
?>
        </select></td>


      </tr>

      <tr>
        <td><strong>Teléfono (cod. area - teléfono)</strong></td>
        <td><input name="telefonocodarea" type="text" id="telefonocodarea" value="<?php if(isset($_POST['telefonocodarea'])){ echo $_POST['telefonocodarea']; } else { echo $row_registro['telefonocodarea'];}?>" size="10" maxlength="10">
          <input name="telefono" type="text" id="telefono" value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; } else { echo $row_registro['telefono'];}?>" maxlength="50"></td>
        <td><strong>Email</strong></td>
        <td><input name="email" type="text" id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } else { echo $row_registro['email'];}?>" maxlength="255"></td>
      </tr>
      <tr>
        <td><strong>Web</strong></td>
        <td><input name="web" type="text" id="web" value="<?php if(isset($_POST['web'])){ echo $_POST['web']; } else { echo $row_registro['web'];}?>" maxlength="255"></td>
        </tr>
      <tr>
        <td><strong>Foto 1</strong></td>
        <td><?php if ($row_registro['foto1'] != '') { ?>
          <img src="../img/talleres/<?php echo $row_registro['foto1']; ?>" width="30%" height="30%">
          <input name="quitarfoto1" type="checkbox" id="quitarfoto1" value="1">
          <label for="quitarfoto1">Quitar foto </label>
          <?php }  ?>          <input type="file" name="foto1" id="foto1">
(se ajusta a 640px de ancho)</td>
        <td><strong>Foto 2</strong></td>
        <td><?php if ($row_registro['foto2'] != '') { ?>
          <img src="../img/talleres/<?php echo $row_registro['foto2']; ?>" width="30%" height="30%">
          <input name="quitarfoto2" type="checkbox" id="quitarfoto2" value="1">
          <label for="quitarfoto2">Quitar foto</label>
          <?php }  ?>          <input type="file" name="foto2" id="foto2">
(se ajusta a 640px de ancho)</td>
      </tr>
      <tr>
        <td><strong>Foto 3</strong></td>
        <td><?php if ($row_registro['foto3'] != '') { ?>
          <img src="../img/talleres/<?php echo $row_registro['foto3']; ?>" width="30%" height="30%">
          <input name="quitarfoto3" type="checkbox" id="quitarfoto3" value="1">
          <label for="quitarfoto3">Quitar foto</label>
          <?php }  ?>          <input type="file" name="foto3" id="foto3">
(se ajusta a 640px de ancho)</td>
        <td><strong>Activo</strong></td>
        <td><input <?php if(isset($_POST['activo'])){ if (!(strcmp($_POST['activo'],"1"))) {echo "checked=\"checked\"";} } else { if (!(strcmp($row_registro['activo'],"1"))) {echo "checked=\"checked\"";}} ?> name="activo" type="radio" id="radio" value="1">
          Si
    <input <?php if(isset($_POST['activo'])){ if (!(strcmp($_POST['activo'],"0"))) {echo "checked=\"checked\"";} } else { if (!(strcmp($row_registro['activo'],"0"))) {echo "checked=\"checked\"";}} ?> name="activo" type="radio" id="radio" value="0">          No </td>
        </tr>
      <tr>
        <td><strong>Servicios</strong></td>
        <td><select name="servicio[]" size="5" multiple id="servicio[]">
          <?php
do {
?>
<?php
$colname_registros5 = "-1";
if (isset($_GET['idtaller'])) {
  $colname_registros5 = $_GET['idtaller'];
}
$colname2_registros5 = $row_registros4['idservicio'];
mysql_select_db($database_config, $config);
$query_registros5 = sprintf("SELECT * FROM dlg_tallerservicio WHERE idtaller = %s AND idservicio=%s", GetSQLValueString($colname_registros5, "int"), GetSQLValueString($colname2_registros5, "int"));
$registros5 = mysql_query($query_registros5, $config) or die(mysql_error());
$row_registros5 = mysql_fetch_assoc($registros5);
$totalRows_registros5 = mysql_num_rows($registros5);

?>
          <option value="<?php echo $row_registros4['idservicio']?>" <?php if($totalRows_registros5 > 0){echo "selected";}?>><?php echo $row_registros4['servicio']?></option>
          <?php
} while ($row_registros4 = mysql_fetch_assoc($registros4));
  $rows = mysql_num_rows($registros4);
  if($rows > 0) {
      mysql_data_seek($registros4, 0);
	  $row_registros4 = mysql_fetch_assoc($registros4);
  }
?>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnguardar" id="btnguardar" value="Guardar"></td>
        <td>&nbsp;</td>
      </tr>
      <input type="hidden" name="MM_insert" value="formguardar">
  </table>
  <input type="hidden" name="MM_update" value="formguardar">
   </form>







<?php include_once '2015/listLocations.php'; ?>










</div><!--entero-->

</div><!--rb-->

</div><!--cont-->
</div><!--contenido-->

<div class="pie"><!--contenido-->
     <div class="cont">
       <div class="centro">
         <div class="c"><img src="img/iconos/auto-negro.png"></div>
       <p class="r">Copyright De la Grua 2014<br>
         Design by <a href="#">kalidoscopio</a></p>
       </div>
    </div>
</div>
</div><!--contenido-->
</div><!--wrapper-->

</body>
</html>
<?php
mysql_free_result($registros);
mysql_free_result($registros2);
mysql_free_result($registros3);
mysql_free_result($registros4);
mysql_free_result($registro);
mysql_free_result($sesion);
mysql_close($config);
?>
