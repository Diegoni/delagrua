<?php require_once('session.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {
  mysql_select_db($database_config, $config);
  $query_registro2 = "SELECT MAX(orden) AS maximo FROM dlg_faq";
  $registro2 = mysql_query($query_registro2, $config) or die(mysql_error());
  $row_registro2 = mysql_fetch_assoc($registro2);
  $totalRows_registro2 = mysql_num_rows($registro2);
  
  $colname_registro = $_POST['pregunta'];
  mysql_select_db($database_config, $config);
  $query_registro = sprintf("SELECT * FROM dlg_faq WHERE pregunta = %s", GetSQLValueString($colname_registro, "text"));
  $registro = mysql_query($query_registro, $config) or die(mysql_error());
  $row_registro = mysql_fetch_assoc($registro);
  $totalRows_registro = mysql_num_rows($registro);


  if($totalRows_registro == 0){
	  $insertSQL = sprintf("INSERT INTO dlg_faq (pregunta, respuesta, orden) VALUES (%s, %s, %s)",
						   GetSQLValueString($_POST['pregunta'], "text"),
						   GetSQLValueString($_POST['respuesta'], "text"),
						   GetSQLValueString(($row_registro2['maximo']+1), "int"));
	
	  mysql_select_db($database_config, $config);
	  $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());
  	  
	  mysql_free_result($registro);
	  mysql_free_result($registro2);
	  
	  $insertGoTo = "faq.php";
	  if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  }
	  header(sprintf("Location: %s", $insertGoTo));

  } else {
	  $preguntaexistente = "La faq no se agreg&oacute; porque ya existe una faq con esa pregunta la base de datos.";
  }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js">
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe contener un email correcto.\n';
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
<!--<![endif]-->
<head>
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
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script><script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/main.js"></script>
<!--datepicker -->
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script><!-- fin datepicker -->
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
<div class="uno"><a class="fa fa-wrench"></a> NUEVA FAQ</div>
<div class="entero">
<form method="POST" action="<?php echo $editFormAction; ?>" name="formguardar" id="formguardar" onSubmit="MM_validateForm('pregunta','','R','respuesta','','R');return document.MM_returnValue">
  <table width="100%" border="0" cellspacing="0" cellpadding="4">
	<?php if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {  ?>
    <tr>
      <td><?php echo $preguntaexistente;?></td>
    </tr>
    <?php } else { ?>
    <tr>
    <td><strong>Pregunta</strong></td>
    <td><textarea name="pregunta" cols="40" id="pregunta"></textarea></td>
    <td><strong>Respuesta</strong></td>
    <td><textarea name="respuesta" cols="40" id="respuesta"></textarea></td>
    </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnguardar" id="btnguardar" value="Guardar"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php } ?>

  </table>
  <input type="hidden" name="MM_insert" value="formguardar">
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
mysql_close($config);
?>
