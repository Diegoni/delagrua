<?php require_once('Connections/config.php'); ?>
<?php require_once('class.inputfilter.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formguardar")) {
	
  $ifilter = new InputFilter();
  $_POST = $ifilter->process($_POST);	
  	
  $updateSQL = sprintf("UPDATE dlg_usuario SET clave=%s WHERE email=%s",
					   GetSQLValueString(md5($_POST['clave']), "text"),
					   GetSQLValueString($_SESSION['MM_Username'], "text"));
	
  mysql_select_db($database_config, $config);
  $Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

  $mensaje = 'Tu nueva clave se acualizó.';
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
<link rel="icon" href="<?php echo $url_relativa;?>favicon.png" type="image/png" />
<link rel="icon" href="<?php echo $url_relativa;?>favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortcut icon" href="<?php echo $url_relativa;?>favicon.ico" /><meta name="description" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">
<link href="<?php echo $url_relativa;?>css/grua.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url_relativa;?>fonts/fuentes.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url_relativa;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-54692324-1', 'auto');
  ga('send', 'pageview');
</script>
<script src="<?php echo $url_relativa;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script></head>
<!--datepicker -->
<link href="<?php echo $url_relativa;?>jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url_relativa;?>jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo $url_relativa;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="<?php echo $url_relativa;?>jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script><!-- fin datepicker -->
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
          <img src="<?php echo $url_relativa;?>img/iconos/auto-negro-up.png">
     </div>
     <div class="cen">
       <div class="box-pop">
          <h1>CAMBIA TU CLAVE</h1>
       </div>
       <form action="login_cambia_clave/" method="post" id="formsesion" name="formsesion">   
       <div class="box-pop">
			<?php if($mensaje != ''){?>
            <div class="login-pop"><?php echo $mensaje; ?></div>
            <?php } else {?>
         <div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="<?php if(isset($_POST['clave'])){ echo ''; }?>" maxlength="50"></div>
          <div class="login-pop"><input name="confirmarclave" type="password" class="input" id="confirmarclave" placeholder="Confirmar Contraseña" title="Confirmar Contraseña" value="<?php if(isset($_POST['confirmarclave'])){ echo ''; }?>" maxlength="50"></div>
          <div class="login-pop">
            <input name="MM_update" type="hidden" id="MM_update" value="formguardar">
            <div class="boton-b"><a href="#" onClick="
            MM_validateForm('clave','','R','confirmarclave','','R');
if( document.MM_returnValue){
    if(document.formsesion.clave.value != document.formsesion.confirmarclave.value) {
        alert('La contraseña y la confirmación no coinciden.');
        document.formsesion.clave.focus(); 
        return false;
    } else {
        document.formsesion.submit();
    }
} else 
{
	return document.MM_returnValue;
}
">CAMBIAR CLAVE</a></div>
         </div>
       </div>
  		<?php } ?>
		</form>
  </div><!--pop-->

</div><!--wrapper-->


<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>-->
<script src="<?php echo $url_relativa;?>js/main.js"></script>
    </body>
</html>
