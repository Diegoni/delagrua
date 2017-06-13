<?php require_once('Connections/config.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = $url_relativa;;
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
$colname_usuario_sesion = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usuario_sesion = $_SESSION['MM_Username'];
}
mysql_select_db($database_config, $config);
$query_usuario_sesion = sprintf("SELECT nick, fblogin FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_usuario_sesion, "text"));
$usuario_sesion = mysql_query($query_usuario_sesion, $config) or die(mysql_error());
$row_usuario_sesion = mysql_fetch_assoc($usuario_sesion);
$totalRows_usuario_sesion = mysql_num_rows($usuario_sesion);

if ((isset($_POST["MM_send"])) && ($_POST["MM_send"] == "formcontacto")) {
	 require_once('class.phpmailer.php');
   require_once('mailTemplate.php');

	 $mail = new PHPMailer();
   $paragraphs = [];
	 $paragraphs[] = 'Nombre: ' .  $_POST['nombre'] ;
	 $paragraphs[] = 'Mail o teléfono: ' .  $_POST['mailotelefono'] ;
	 $paragraphs[] = 'Consulta: ' .  $_POST['consulta'] ;

	 $mail = new PHPMailer();
	 $mail->IsHTML(true);
	 $mail->FromName = 'DE LA GRUA';
	 $mail->From = $email_admin_taller;
	 $mail->AddAddress($email_contacto);
	 $mail->Subject = utf8_decode("DE LA GRUA - Contactanos");
	 $mail->Body = mailTemplate('Consulta desde el sitio', $paragraphs );

	 if ($mail->Send()){
		$mensaje = $_POST['nombre'] . '<br>Gracias por contactarnos. ';
	 } else {
		$mensaje = 'No se puddo enviar tu consulta, por favor, intentalo más tarde.';
	 }
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="description" content="De la Grúa | Guía colectiva de talleres para autos y motos.">
<meta name="keywords" content="taller,bateria,auto,fiat,tuning">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>DE LA GRUA | Guía colectiva de talleres para autos y motos</title>
<link rel="icon" href="<?php echo $url_relativa;?>favicon.png" type="image/png" />
<link rel="icon" href="<?php echo $url_relativa;?>favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortcut icon" href="<?php echo $url_relativa;?>favicon.ico" /><meta name="description" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo $url_relativa;?>css/normalize.min.css">
<link rel="stylesheet" href="<?php echo $url_relativa;?>css/main.css">
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
<script src="<?php echo $url_relativa;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script></head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $url_relativa;?>js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/main.js"></script>
<!-- fancyapps -->
<!-- <script type="text/javascript" src="js/fancyapps/jquery-1.10.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo $url_relativa;?>js/fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url_relativa;?>css/fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
$(document).ready(function() {
  $('.fancybox').fancybox({
    type: 'iframe',
    'padding' : 0,
    'autoSize': true,
	'width': '360',
	'height': '100%'
  });
});
</script>
<!-- fin fancyapps -->
<script>
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.title; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+= +nm+' debe contener un email correcto.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += nm+' es requerido.\n'; }
    } if (errors) alert('Error:\n'+errors);
    document.MM_returnValue = (errors == '');
} }

</script>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<div class="wrapper"><!--wrapper-->

<div class="cabecera"><!--header-->
<div class="cont"><!--cont-->
      <div class="cont960">
       <div class="login">
       <?php if (!isset($_SESSION['MM_Username'])) { ?>
        <p class="user">&nbsp;
       </p>
      <p class="log"><a class="fancybox fancybox.iframe" href="<?php echo $url_relativa;?>login.php">Inicia sesión</a> <a class="fancybox fancybox.iframe fa fa-power-off" href="<?php echo $url_relativa;?>login.php"></a></p>
       <?php } else { ?>
       <p class="user">
        HOLA <?php echo $row_usuario_sesion['nick']; ?>
       </p>
       <p class="log"><a href="<?php echo $logoutAction ?>">Cerra sesión</a> <a class="fancybox fancybox.iframe fa fa-power-off" href="<?php echo $logoutAction ?>"></a>
		   <?php if($row_usuario_sesion['fblogin'] == 0){?>
           <br>
           <a class="fancybox fancybox.iframe" href="<?php echo $url_relativa;?>login_cambia_clave/">Cambia tu clave</a> <a class="fancybox fancybox.iframe fa fa-wrench" href="<?php echo $url_relativa;?>login_cambia_clave/"></a></p>
           <?php } ?>
       <?php } ?>
       </div>

       <div class="logo"><a href="<?php echo $url_relativa;?>"><img src="<?php echo $url_relativa;?>img/logos/delagrua.png" title="DE LA GRÚA"></a>
       <p>Guía colectiva de talleres para autos y motos</p>
       </div>

       <div class="buscanos">CORRE LA VOZ! <br> <a href="https://www.facebook.com/guiadelagrua" target="_blank" class="fa fa-facebook-square"></a> <a href="https://plus.google.com/103267201251041877547/about" target="_blank"  class="fa fa-google-plus-square"></a></div>
       </div>
</div><!--cont-->
</div><!--header-->

<div class="contenido"><!--contenido-->
<div class="cont"><!--cont-->

      <div class="nav-barra sombra"><!--barra-->
           <ul>
              <li><a href="<?php echo $url_relativa;?>#busca_taller">BUSCA UN TALLER</a></li>
              <li><a class="fancybox fancybox.iframe" href="/login.php">CALIFICA UN TALLER</a></li>
              <li><a href="<?php echo $url_relativa;?>#agrega_taller">AGREGA TU TALLER</a></li>
           </ul>
      </div><!--barra-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont620">
      <div class="uno"><a class="fa fa-file-text"></a>CONTACTANOS!</div>

      <div class="contactanos"><!--contactanos-->
      <div class="left">
      <p class="titulo">Tus dudas no nos dejan dormir en la noche, permitinos aclarartelas!</p>
      <p>Te vamos a responder lo más rápido que podamos!</p>
      </div>

     <form ACTION="contactanos/" METHOD="POST" id="formcontacto" name="formcontacto">
      <div class="right">
	 <?php if($mensaje != '') { ?>
     <li><?php echo $mensaje; ?></li>
     <?php } else { ?>
          <li><input name="nombre" type="text" id="nombre" placeholder="Nombre" title="Nombre" maxlength="250"></li>
          <li><input name="mailotelefono" type="text" id="mailotelefono" placeholder="Mail o Teléfono" title="Mail o Teléfono" maxlength="250"></li>
          <li><textarea name="consulta" rows="4" id="consulta" placeholder="Consulta" title="Consulta"></textarea></li>
          <li><span class="login-pop">
            <input type="hidden" name="MM_send" value="formcontacto">
          </span>
            <div class="boton-b"><a href="#" onClick="MM_validateForm('nombre','','R','mailotelefono','','R','consulta','','R');if( document.MM_returnValue){document.formcontacto.submit();}">ENVIAR!</a></div></li>
      <?php } ?>
      </div>
      </form>
      </div><!--contactanos-->

      </div>
      </div><!--c2-->

</div><!--cont-->
</div><!--contenido-->

<div class="pie"><!--contenido-->
     <div class="cont">
       <div class="centro">
       <p class="l"><a href="<?php echo $url_relativa;?>faq/">ACERCA DE LA GRUA</a> |<a href="<?php echo $url_relativa;?>terminos/"> TÉRMINOS Y CONDICIONES</a><br>
         <a href="<?php echo $url_relativa;?>faq/">PREGUNTAS FRECUENTES</a> | <a href="#">CONTACTANOS</a></p>
       <div class="c"><img src="<?php echo $url_relativa;?>img/iconos/auto-negro.png"></div>
       <p class="r">Copyright De la Grua 2014<br>
         Design by <a href="http://www.kalidoscopio-d.com/" target="_blank">kalidoscopio</a></p>
       </div>
    </div>
</div><!--contenido-->

</div><!--wrapper-->
</body>
</html>
