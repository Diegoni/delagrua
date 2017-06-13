<?php require_once('Connections/config.php'); ?>
<?php require_once('class.inputfilter.php'); ?>
<?php require_once('funciones.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $ifilter = new InputFilter();
  $_POST = $ifilter->process($_POST);

  $loginUsername=$_POST['email'];
  $password=md5($_POST['clave']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "login_ok.php";
  $MM_redirectLoginFailed = "login_error.html";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_config, $config);

  $LoginRS__query=sprintf("SELECT email, clave FROM dlg_usuario WHERE activo = 1 AND email=%s AND clave=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";

	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
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
<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/main.js"></script>

<!-- facebook login -->
<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '1444163319141827', // replace your app id here
	//channelUrl : '//WWW.DELAGRUA.COM/channel.html',
	status     : true,
	cookie     : true,
	xfbml      : true,
    oauth	   : true,
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/es_LA/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			window.location.href = "fb_login.php?action=fblogin";
		}
	}, {scope: 'public_profile,email,user_birthday'});
}
</script>
<!-- fin facebook login -->

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
          <h1><span class="amarillo">1.</span>CONECTATE AL SITIO CON TU CUENTA DE FACEBOOK O TU CUENTA DE DE LA GRUA</h1>
		  <!-- facebook login -->
          <a href="#"><img src="facebook-connect.png" alt="Fb Connect" title="Login with facebook" onclick="FBLogin();"/></a></div>
		  <!-- fin facebook login -->
       <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" id="formsesion" name="formsesion">
       <div class="box-pop">
          <!--<h2>Para calificar, tenes que loguearte al sitio.</h2>-->

          <div class="login-pop"><input name="email" type="text" class="input" id="email" placeholder="E-mail" title="E-mail" value="" maxlength="255"><br>
          </div>

          <div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="" maxlength="20"><br>
          <a href="login_olvide_contrasena/">Olvidé mi contraseña</a>
          </div>
          <div class="login-pop">
            <div class="boton-b"><a href="#" onClick="MM_validateForm('email','','RisEmail','clave','','R');if( document.MM_returnValue){document.formsesion.submit();}">INGRESAR</a></div>
         </div>
       </div>
		</form>
       <div class="box-pop">
         <h2>Creá una cuenta en <a href="crear_cuenta.php">delagrua.com</a></h2>
         <h2><a href="terminos_condiciones.php">Términos y Condiciones</a></h2>
       </div>
</div>
</div><!--pop-->
</div><!--wrapper-->

</body>
</html>
