<?php require_once('session.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {
	$colname_registro = $_POST['nombre'];
	mysql_select_db($database_config, $config);
	$query_registro = sprintf("SELECT * FROM dlg_taller WHERE nombre = %s", GetSQLValueString($colname_registro, "text"));
	$registro = mysql_query($query_registro, $config) or die(mysql_error());
	$row_registro = mysql_fetch_assoc($registro);
	$totalRows_registro = mysql_num_rows($registro);

	if(true){
		$insertSQL = sprintf("INSERT INTO dlg_taller (nombre, tipovehiculo, idmarca, telefonocodarea, telefono, email, web, activo, direction, point_of_interest, lat, lng, location, location_type, formatted_address, bounds, viewport, route, street_number, postal_code, locality, sublocality, country, country_short, administrative_area_level_1, place_id, reference, url, website ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )",
			GetSQLValueString($_POST['nombre'], "text"),
			GetSQLValueString($_POST['tipovehiculo'], "text"),
			GetSQLValueString($_POST['idmarca'], "int"),
			GetSQLValueString($_POST['telefonocodarea'], "text"),
			GetSQLValueString($_POST['telefono'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['web'], "text"),
			GetSQLValueString($_POST['activo'], "int"),

			GetSQLValueString($_POST['name'], "text"),
			GetSQLValueString($_POST['point_of_interest'], "text"),
			GetSQLValueString($_POST['lat'], "text"),
			GetSQLValueString($_POST['lng'], "text"),
			GetSQLValueString($_POST['location'], "text"),
			GetSQLValueString($_POST['location_type'], "text"),
			GetSQLValueString($_POST['formatted_address'], "text"),
			GetSQLValueString($_POST['bounds'], "text"),
			GetSQLValueString($_POST['viewport'], "text"),
			GetSQLValueString($_POST['route'], "text"),
			GetSQLValueString($_POST['street_number'], "text"),
			GetSQLValueString($_POST['postal_code'], "text"),
			GetSQLValueString($_POST['locality'], "text"),
			GetSQLValueString($_POST['sublocality'], "text"),
			GetSQLValueString($_POST['country'], "text"),
			GetSQLValueString($_POST['country_short'], "text"),
			GetSQLValueString($_POST['administrative_area_level_1'], "text"),
			GetSQLValueString($_POST['place_id'], "text"),
			GetSQLValueString($_POST['reference'], "text"),
			GetSQLValueString($_POST['url'], "text"),
			GetSQLValueString($_POST['website'], "text")
			);

mysql_select_db($database_config, $config);
$Result1 = mysql_query($insertSQL, $config) or die(mysql_error());

$id = mysql_insert_id($config);

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
$updateSQL = sprintf("UPDATE dlg_taller SET foto1=%s WHERE idtaller=%s",
	GetSQLValueString($foto, "text"),
	GetSQLValueString($id, "int"));
mysql_select_db($database_config, $config);
$Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

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
$updateSQL = sprintf("UPDATE dlg_taller SET foto2=%s WHERE idtaller=%s",
	GetSQLValueString($foto, "text"),
	GetSQLValueString($id, "int"));
mysql_select_db($database_config, $config);
$Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

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
$updateSQL = sprintf("UPDATE dlg_taller SET foto3=%s WHERE idtaller=%s",
	GetSQLValueString($foto, "text"),
	GetSQLValueString($id, "int"));
mysql_select_db($database_config, $config);
$Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

$servicio = $_POST['servicio'];
for($i=0;$i<count($servicio);$i++){
	$insertSQL = sprintf("INSERT INTO dlg_tallerservicio (idtaller, idservicio) VALUES (%s, %s)",
		GetSQLValueString($id, "int"),
		GetSQLValueString($servicio[$i], "int"));

	mysql_select_db($database_config, $config);
	$Result1 = mysql_query($insertSQL, $config) or die(mysql_error());
}
$insertGoTo = "taller.php";
if (isset($_SERVER['QUERY_STRING'])) {
	$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
	$insertGoTo .= $_SERVER['QUERY_STRING'];
}
header(sprintf("Location: %s", $insertGoTo));
} else {
	$tallerexistente = "El taller no se agreg&oacute; porque ya existe un taller con ese nombre en la base de datos.";
}
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
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
	<script src="<?php echo $url_relativa;?>js/vendor/jquery.geocomplete.min.js"></script>
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
	.map_canvas {
		float: left;
		width: 80%;
		height: 400px;
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
    					<div class="uno"><a class="fa fa-wrench"></a> NUEVO TALLER</div>
    					<div class="entero">
    						<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="formguardar" id="formguardar" onSubmit="MM_validateForm('nombre','','R','email','','NisEmail');return document.MM_returnValue">
    							<table width="100%" border="0" cellspacing="0" cellpadding="4">
    								<?php if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {  ?>
    								<tr>
    									<td><?php echo $tallerexistente;?></td>
    								</tr>
    								<?php } else { ?>
    								<tr>
    									<td><strong>Nombre</strong></td>
    									<td><input name="nombre" type="text" id="nombre" value="<?php echo $_POST['nombre'];?>" maxlength="250"></td>
    									<td><strong>Tipo de vehículo</strong></td>
    									<td><select name="tipovehiculo" id="tipovehiculo">
    										<option value="auto" <?php if (!(strcmp("auto", $_POST['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>auto</option>
    										<option value="moto" <?php if (!(strcmp("moto", $_POST['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>moto</option>
    									</select></td>
    								</tr>
    								<tr>
    									<td><strong>Marca</strong></td>
    									<td><select name="idmarca" id="idmarca">
    										<?php
    										do {
    											?>
    											<option value="<?php echo $row_registros['idmarca']?>"<?php if (!(strcmp($row_registros['idmarca'], $_POST['idmarca']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros['marca']?></option>
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
    									<td><input name="telefonocodarea" type="text" id="telefonocodarea" value="<?php echo $_POST['telefonocodarea'];?>" size="10" maxlength="10">
    										<input name="telefono" type="text" id="telefono" value="<?php echo $_POST['telefono'];?>" maxlength="50"></td>
    										<td><strong>Email</strong></td>
    										<td><input name="email" type="text" id="email" value="<?php echo $_POST['email'];?>" maxlength="255"></td>
    									</tr>
    									<tr>
    										<td><strong>Web</strong></td>
    										<td><input name="web" type="text" id="web" value="<?php echo $_POST['web'];?>" maxlength="255"></td>
    									</tr>
    									<tr>
    										<td><strong>Foto 1</strong></td>
    										<td><input type="file" name="foto1" id="foto1"></td>
    										<td><strong>Foto 2</strong></td>
    										<td><input type="file" name="foto2" id="foto2"></td>
    									</tr>
    									<tr>
    										<td><strong>Foto 3</strong></td>
    										<td><input type="file" name="foto3" id="foto3"></td>
    										<td><strong>Activo</strong></td>
    										<td><input <?php if (!(strcmp($_POST['activo'],"1"))) {echo "checked=\"checked\"";} ?> name="activo" type="radio" id="radio" value="1" checked="checked">
    											Si
    											<input <?php if (!(strcmp($_POST['activo'],"0"))) {echo "checked=\"checked\"";} ?> name="activo" type="radio" id="radio2" value="0">
    											No </td>
    										</tr>
    										<tr>
    											<td><strong>Servicios</strong></td>
    											<td><select name="servicio[]" size="5" multiple id="servicio[]">
    												<?php
    												do {
    													?>
    													<option value="<?php echo $row_registros4['idservicio']?>"><?php echo $row_registros4['servicio']?></option>
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
    											<td>&nbsp;</td>
    										</tr>
    										<input type="hidden" name="MM_insert" value="formguardar">
    										<?php } ?>
    									</table>

    									<input id="geocomplete" type="text" placeholder="Dirección" value="" style="width: 80%;" />
    									<input id="find" type="button" value="Buscar" />
    									<br>


    									<input placeholder="Name" name="name" type="hidden" value="">

    									<input placeholder="POI Name" name="point_of_interest" type="hidden" value="">

    									<input placeholder="Latitude" name="lat" type="hidden" value="">

    									<input placeholder="Longitude" name="lng" type="hidden" value="">

    									<input placeholder="Location" name="location" type="hidden" value="">

    									<input placeholder="Location Type" name="location_type" type="hidden" value="">

    									<input placeholder="Formatted Address" name="formatted_address" type="hidden" value="">

    									<input placeholder="Bounds" name="bounds" type="hidden" value="">

    									<input placeholder="Viewport" name="viewport" type="hidden" value="">

    									<input placeholder="Route" name="route" type="hidden" value="">

    									<input placeholder="Street Number" name="street_number" type="hidden" value="">

    									<input placeholder="Postal Code" name="postal_code" type="hidden" value="">

    									<input placeholder="Localidad" name="locality" type="text" value="">

    									<input placeholder="Sub Locality" name="sublocality" type="hidden" value="">

    									<input placeholder="Country" name="country" type="hidden" value="">

    									<input placeholder="Country Code" name="country_short" type="hidden" value="">

    									<input placeholder="Provincia" name="administrative_area_level_1" type="text" value="">

    									<input placeholder="Place ID" name="place_id" type="hidden" value="">

    									<input placeholder="Reference" name="reference" type="hidden" value="">

    									<input placeholder="URL" name="url" type="hidden" value="">

    									<input placeholder="Website" name="website" type="hidden" value="">

    									<div class="map_canvas"></div>
    									<input type="submit" class="button" name="btnguardar" id="btnguardar" value="Guardar">

    								</form>



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
    		<script>
    			$(function() {
    				$("#geocomplete").geocomplete({
    					map: ".map_canvas",
    					details: "form",
                // types: ["geocode", "establishment"],
                country: 'ar',
                markerOptions: {
                	draggable: true
                }
            });

    				$("#find").click(function() {
    					$("#geocomplete").trigger("geocode");
    				});

    				$("#geocomplete").bind("geocode:dragged", function(event, latLng){
          // $("input[name=lat]").val(latLng.lat());
          // $("input[name=lng]").val(latLng.lng());
          $("#geocomplete").geocomplete("find", latLng.toString());
      });
    			});
    		</script>

    		</html>
    		<?php
    		mysql_free_result($registros);
    		mysql_free_result($registros2);
    		mysql_free_result($registros3);
    		mysql_free_result($registros4);
    		mysql_free_result($sesion);
    		mysql_close($config);
    		?>
