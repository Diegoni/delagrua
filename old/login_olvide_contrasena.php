<?php require_once('Connections/config.php'); ?>
<?php require_once('class.inputfilter.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {
	$colname_registro = '-1';
	if (isset($_POST['email'])) {
		$colname_registro = $_POST['email'];
	}
	mysql_select_db($database_config, $config);
	$query_registro = sprintf("SELECT email, nick, fblogin FROM dlg_usuario WHERE activo = 1 AND email = %s", GetSQLValueString($colname_registro, "text"));
	$registro = mysql_query($query_registro, $config) or die(mysql_error());
	$row_registro = mysql_fetch_assoc($registro);
	$totalRows_registro = mysql_num_rows($registro);

	if($totalRows_registro > 0){

		if($row_registro['fblogin'] != 1) {
			//Crea una clave aleatoria
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$numerodeletras=10;
			$cadena = "";
			for($i=0;$i<$numerodeletras;$i++)
			{
				$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
			}

			$updateSQL = sprintf("UPDATE dlg_usuario SET clave=%s WHERE email=%s",
							   GetSQLValueString(md5($cadena), "text"),
							   GetSQLValueString($_POST['email'], "text"));

			mysql_select_db($database_config, $config);
			$Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

			 require_once('class.phpmailer.php');
			 require_once('mailTemplate.php');

			 $mail = new PHPMailer();
			 $paragraphs = [];
			 $paragraphs[] = "Hola " . $row_registro['nick'	] . ':';
			 $paragraphs[] = 'Tu nueva contrase&ntilde;a para acceder es: ' . $cadena;
			 $paragraphs[] = 'Atentamente<br>El equipo de Delagrua';


			 $mail = new PHPMailer();
			 $mail->IsHTML(true);
			 $mail->FromName = 'DE LA GRUA';
			 $mail->From = $email_admin_cuentas;
			 $mail->AddAddress($row_registro['email']);
			 $mail->Subject = utf8_decode("DE LA GRUA - Olvidé mi contraseña");
			 $mail->Body = mailTemplate('Nueva contraseña', $paragraphs) ;

			 if ($mail->Send()){
				$mensaje = 'Recibirás un email tu cuenta de e-mail, con tu nueva contraseña';
			 } else {
				$mensaje = 'No se puedo enviar a tu cuenta de e-mail un email con tu nueva contraseña';
			 }
		} else {
			$mensaje = 'La cuenta de e-mail ingresada inicia sesión con facebook.';
		}
	} else {
		$mensaje = 'La cuenta de e-mail ingresada no existe.';
	}
	mysql_free_result($registro);
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
<script src="<?php echo $url_relativa;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
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
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $url_relativa;?>js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php echo $url_relativa;?>js/main.js"></script>
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
          <h1>OLVIDE MI CONTRASEÑA</h1>
       </div>
       <?php if($mensaje != ''){ ?>
       <div class="box-pop">
          <h2><?php echo $mensaje;?></h2>
	   </div>
       <?php } else { ?>
       <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" id="formsesion" name="formsesion">
       <div class="box-pop">
          <h2>Por favor, ingresa tu cuenta de e-mail para que te enviemos una nueva contraseña.</h2>

          <div class="login-pop"><input name="email" type="text" class="input" id="email" value="E-mail" maxlength="255" onClick="this.value='';"><br>
          </div>
          <div class="login-pop">
            <input type="hidden" name="MM_insert" value="formguardar">
            <div class="boton-b"><a href="#" onClick="MM_validateForm('email','','RisEmail');if( document.MM_returnValue){document.formsesion.submit();}">SOLICITAR CONTRASEÑA</a></div>
         </div>
       </div>
		</form>
        <?php }  ?>
    </div>
  </div><!--pop-->

</div><!--wrapper-->

</body>
</html>
