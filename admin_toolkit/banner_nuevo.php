<?php require_once('session.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {
	  $insertSQL = sprintf("INSERT INTO dlg_banner (ubicacion, enlace, publicar) VALUES (%s, %s, %s)",
						   GetSQLValueString($_POST['ubicacion'], "text"),
						   GetSQLValueString($_POST['enlace'], "text"),
						   GetSQLValueString($_POST['publicar'], "int"));
	
	  mysql_select_db($database_config, $config);
	  $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());
	
	  $id = mysql_insert_id($config);
	  
	  $name = $_FILES['imagen']['name']; 
	  $name = explode('.',$name);
	  $ext = $name[1]; 
	  $imagen = "banner_". $id . "." . $ext;
	  $type = $_FILES['imagen']['type']; 
	  $size = $_FILES['imagen']['size']; 
	
	  if (strpos($type, "jpg") || strpos($type, "jpeg") || strpos($type, "gif") || strpos($type, "png") && ($size < 2000000)) { 
		$_FILES['imagen']['tmp_name']; 
		 move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/banner/" . $imagen);

		//Ruta de la original
		$rtOriginal="../img/banner/" . $imagen;
		//Crear variable de imagen a partir de la original
		$original = imagecreatefromjpeg($rtOriginal);
		//Definir tamaño máximo y mínimo
		$max_ancho = 280;
		$max_alto = 280;
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
		imagejpeg($lienzo,"../img/banner/" . $imagen,$cal);

	  } else { 
		$imagen = ''; 
	  }
	  $updateSQL = sprintf("UPDATE dlg_banner SET imagen=%s WHERE idbanner=%s",
						   GetSQLValueString($imagen, "text"),
						   GetSQLValueString($id, "int"));
	  mysql_select_db($database_config, $config);
	  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());
	
	  $insertGoTo = "banner.php";
	  if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  }
	  header(sprintf("Location: %s", $insertGoTo));
}
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
<div class="uno"><a class="fa fa-wrench"></a> NUEVO BANNER</div>
<div class="entero">
   <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="formguardar" id="formguardar" onSubmit="MM_validateForm('imagen','','R','enlace','','R');return document.MM_returnValue"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="4">
    <?php if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {  ?>
    <tr>
      <td><?php echo $tallerexistente;?></td>
    </tr>
    <?php } else { ?>
   <tr>
     <td><strong>Imagen</strong></td>
     <td><input type="file" name="imagen" id="imagen">
       (se ajusta a 280px de ancho)</td>
      <td><strong>Ubiación</strong></td>
      <td><strong>
        <select name="ubicacion" id="ubicacion">
          <option value="home izquierda">home izquierda</option>
          <option value="home centro">home centro</option>
          <option value="home derecha">home derecha</option>
          <option value="home abajo">home abajo</option>
          <option value="busqueda arriba">busqueda arriba</option>
          <option value="busqueda medio">busqueda medio</option>
          <option value="busqueda abajo">busqueda abajo</option>
          <option value="taller arriba">taller arriba</option>
          <option value="taller medio">taller medio</option>
          <option value="taller abajo">taller abajo</option>
        </select>
      </strong></td>
    </tr>
      <tr>
        <td><strong>Enlace</strong></td>
        <td><input name="enlace" type="text" id="enlace" size="40"></td>
        <td><strong>Publicar</strong></td>
        <td><input <?php if (!(strcmp($_POST['activo'],"1"))) {echo "checked=\"checked\"";} ?> name="publicar" type="radio" id="publicar" value="1" checked="checked">
Si
  <input <?php if (!(strcmp($_POST['activo'],"0"))) {echo "checked=\"checked\"";} ?> name="publicar" type="radio" id="publicar" value="0">
No </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnguardar" id="btnguardar" value="Guardar"></td>
        <td>&nbsp;</td>
      </tr>
      <input type="hidden" name="MM_insert" value="formguardar">
      <?php } ?>
  </table>
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
</html>
<?php
mysql_free_result($sesion);
?>
