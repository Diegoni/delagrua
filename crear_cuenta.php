<?php require_once('Connections/config.php'); ?>
<?php require_once('class.inputfilter.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {
	
  $ifilter = new InputFilter();
  $_POST = $ifilter->process($_POST);		
  
  $colname_registro = $_POST['email'];
  mysql_select_db($database_config, $config);
  $query_registro = sprintf("SELECT * FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_registro, "text"), GetSQLValueString($colname2_registro, "text"));
  $registro = mysql_query($query_registro, $config) or die(mysql_error());
  $row_registro = mysql_fetch_assoc($registro);
  $totalRows_registro = mysql_num_rows($registro);

  if($totalRows_registro == 0){
	  
	  $colname_registro = $_POST['nick'];
	  mysql_select_db($database_config, $config);
	  $query_registro = sprintf("SELECT * FROM dlg_usuario WHERE nick = %s", GetSQLValueString($colname_registro, "text"), GetSQLValueString($colname2_registro, "text"));
	  $registro = mysql_query($query_registro, $config) or die(mysql_error());
	  $row_registro = mysql_fetch_assoc($registro);
	  $totalRows_registro = mysql_num_rows($registro);

	  if($totalRows_registro == 0){
		  $insertSQL = sprintf("INSERT INTO dlg_usuario (idgrupo, nombreyapellido, email, clave, fechanacimiento, telefonocodarea, telefono, pais, provincia, localidad, nick, activo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							   GetSQLValueString($_POST['idgrupo'], "int"),
							   GetSQLValueString($_POST['nombreyapellido'], "text"),
							   GetSQLValueString($_POST['email'], "text"),
							   GetSQLValueString(md5($_POST['clave']), "text"),
						   	   GetSQLValueString(formato_fecha_mysql($_POST['fechanacimiento']), "date"),
							   GetSQLValueString($_POST['telefonocodarea'], "text"),
							   GetSQLValueString($_POST['telefono'], "text"),
							   GetSQLValueString($_POST['pais'], "text"),
							   GetSQLValueString($_POST['provincia'], "text"),
							   GetSQLValueString($_POST['localidad'], "text"),
							   GetSQLValueString($_POST['nick'], "text"),
							   GetSQLValueString($_POST['activo'], "int"));
		
		   mysql_select_db($database_config, $config);
		  $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());
		  $insertGoTo = "crear_cuenta_ok.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
	  } else {
		  $error = "Tu cuenta no se pudo agregar porque ya existe una cuenta con ese nick.";
	  }

  } else {
	  $error = "Tu cuenta no se pudo agregar porque ya existe una cuenta con ese email.";
  }
}
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
<!--datepicker -->
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui.datepicker-es.js"></script>
<script src="jQueryAssets/i18n/jquery.ui.datepicker-es.js" type="text/javascript"></script>
<script>
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

</script>
<!-- fin datepicker -->
<script>
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+= nm+' debe contener un email correcto.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += nm+' es requerido.\n'; }
    } if (errors) alert(errors);
    document.MM_returnValue = (errors == '');
} }
function calcular_edad(fecha) {
var fechaActual = new Date()
var diaActual = fechaActual.getDate();
var mmActual = fechaActual.getMonth() + 1;
var yyyyActual = fechaActual.getFullYear();
FechaNac = fecha.split("/");
var diaCumple = FechaNac[0];
var mmCumple = FechaNac[1];
var yyyyCumple = FechaNac[2];
//retiramos el primer cero de la izquierda
if (mmCumple.substr(0,1) == 0) {
mmCumple= mmCumple.substring(1, 2);
}
//retiramos el primer cero de la izquierda
if (diaCumple.substr(0, 1) == 0) {
diaCumple = diaCumple.substring(1, 2);
}
var edad = yyyyActual - yyyyCumple;

//validamos si el mes de cumpleaños es menor al actual
//o si el mes de cumpleaños es igual al actual
//y el dia actual es menor al del nacimiento
//De ser asi, se resta un año
if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
edad--;
}
return edad;
};
</script>
</head>
<body>
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
          <h1><span class="amarillo">1.</span> CREÁ TU CUENTA DE USUARIO</h1>
       </div>
       <form action="crear_cuenta.php" method="post" id="formsesion" name="formsesion">   
       <div class="box-pop">
			<?php if($error != ''){?>
            <div class="login-pop"><p><span style="color:#EF0D10"><?php echo $error; ?></span></p></div>
            <?php } ?>	
          <div class="login-pop"><input name="nombreyapellido" type="text" class="input" id="nombreyapellido" placeholder="Nombre y apellido" title="Nombre y apellido" value="<?php if(isset($_POST['nombreyapellido'])){ echo $_POST['nombreyapellido'];}?>" maxlength="250">
            <input name="idgrupo" type="hidden" id="idgrupo" value="2">
            <input name="activo" type="hidden" id="activo" value="1">
          </div>
          <div class="login-pop"><input name="telefonocodarea" type="text" class="input" id="telefonocodarea" placeholder="Código de área del teléfono" title="Código de área del teléfono" value="<?php if(isset($_POST['telefonocodarea'])){ echo $_POST['telefonocodarea']; }?>" maxlength="55"></div>
          <div class="login-pop"><input name="telefono" type="text" class="input" id="telefono" placeholder="Teléfono" title="Teléfono" value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; }?>" maxlength="50"></div>
          <div class="login-pop"><input name="email" type="text" class="input" id="email" placeholder="E-mail" title="E-mail" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }?>" maxlength="250"></div>         
          <div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="<?php if(isset($_POST['clave'])){ echo ''; }?>" maxlength="50"></div>
          <div class="login-pop"><input name="confirmarclave" type="password" class="input" id="confirmarclave" placeholder="Confirmar Contraseña" title="Confirmar Contraseña" value="<?php if(isset($_POST['confirmarclave'])){ echo ''; }?>" maxlength="50"></div>
          <div class="login-pop"><input type="text" class="input" id="fechanacimiento" name="fechanacimiento" placeholder="Fecha de Nacimiento" title="Fecha de Nacimiento" value="<?php if(isset($_POST['fechanacimiento'])){ echo $_POST['fechanacimiento']; }?>">
         </div>
          <div class="login-pop"><input name="pais" type="text" class="input" id="pais" placeholder="País" title="País" value="<?php if(isset($_POST['pais'])){ echo $_POST['pais']; }?>" maxlength="20"></div>         
          <div class="login-pop"><input name="provincia" type="text" class="input" id="provincia" placeholder="Provincia" title="Provincia" value="<?php if(isset($_POST['provincia'])){ echo $_POST['provincia'];}?>" maxlength="20"></div>         
          <div class="login-pop"><input name="localidad" type="text" class="input" id="localidad" placeholder="Localidad" title="Localidad" value="<?php if(isset($_POST['localidad'])){ echo $_POST['localidad']; }?>" maxlength="20"></div>         
          <div class="login-pop"><input name="nick" type="text" class="input" id="nick" placeholder="Nick" title="Nick" value="<?php if(isset($_POST['nick'])){ echo $_POST['nick']; }?>" maxlength="20">
          <br>
          <input name="acepto" type="checkbox" id="acepto" value="1"> Leí y acepto los <a href="terminos_condiciones/">Términos y condiciones</a>
          <input type="hidden" name="MM_insert" value="formguardar">
          </div>
          
          <div class="login-pop">
            <div class="boton-b"><a href="#" onClick="
            MM_validateForm('nombreyapellido','','R','email','','RisEmail','clave','','R','confirmarclave','','R','fechanacimiento','','R','pais','','R','provincia','','R','nick','','R');
if( document.MM_returnValue){
	if(calcular_edad(document.formsesion.fechanacimiento.value) < 18) {
    	alert('Debes ser mayor de edad.');
        document.formsesion.fechanacimiento.focus(); 
        return false;
    } else {
        if (document.formsesion.acepto.checked == false)
        {
            alert('Debes aceptar los términos.');
            document.formsesion.acepto.focus(); 
            return false;
         } else {
            if(document.formsesion.clave.value != document.formsesion.confirmarclave.value) {
                alert('La contraseña y la confirmación no coinciden.');
                document.formsesion.clave.focus(); 
                return false;
            } else {
            	document.formsesion.submit();
            }
         }
	}
} else 
	{
	return document.MM_returnValue;
    }
">CREAR CUENTA</a></div>
         </div>
       </div>
		</form>
    </div>
</div><!--pop-->
</div><!--wrapper-->


<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>-->
<script src="js/main.js"></script>
    </body>
</html>
