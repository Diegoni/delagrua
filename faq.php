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

  $logoutGoTo = $url_relativa;
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

mysql_select_db($database_config, $config);
$query_registros = "SELECT * FROM dlg_faq ORDER BY orden ASC";
$registros = mysql_query($query_registros, $config) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);
$totalRows_registros = mysql_num_rows($registros);
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
<script src="<?php echo $url_relativa;?>js/main.js"></script>
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

      <div class="nav-barra"><!--barra-->
           <ul>
              <li><a href="<?php echo $url_relativa;?>#busca_taller">BUSCA UN TALLER</a></li>
              <?php if (!isset($_SESSION['MM_Username'])) { ?>
              <li><a class="fancybox fancybox.iframe" href="/login.php">CALIFICA UN TALLER</a></li>
              <?php } else { ?>
              <li><a href="<?php echo $url_relativa;?>#busca_taller">CALIFICA UN TALLER</a></li>
              <?php } ?>
              <li><a href="<?php echo $url_relativa;?>#agrega_taller">AGREGA TU TALLER</a></li>
           </ul>
      </div><!--barra-->

      <div class="cuadro-uno"><!--c1-->
      <div class="cont960">

           <div class="box-preguntas"><!--box1-->
             <img src="<?php echo $url_relativa;?>img/autos/a1.png">
<p><span class="titulo">QUIENES SOMOS</span><br>
  <br>
  De La Grúa es una guía gratuita, colectiva  e inteligente de talleres de automóviles y motos. En De La Grúa encontrarás  toda la información relacionada con el mundo motor que te ayudará a seleccionar  e informarte a través de calificaciones de los usuarios acerca del mejor  proveedor para tu auto o moto, ya sea por precio, ubicación geográfica o calidad  del servicio. </p>
</div><!--box1-->

      </div>
      </div><!--c1-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="uno"><a class="fa fa-question"></a> PREGUNTAS FRECUENTES</div>
      <?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
        <?php do { ?>
          <div class="preguntas-frecuentes"><!--pregunta-->
            <p class="titulo"><?php echo $row_registros['pregunta']; ?></p>
            <p><?php echo $row_registros['respuesta']; ?></p>
          </div><!--pregunta-->
          <?php } while ($row_registros = mysql_fetch_assoc($registros)); ?>
        <?php } // Show if recordset not empty ?>
      </div>
      </div><!--c2-->

</div><!--cont-->
</div><!--contenido-->

<div class="pie"><!--contenido-->
     <div class="cont">
       <div class="centro">
       <p class="l"><a href="#">ACERCA DE LA GRUA</a> |<a href="<?php echo $url_relativa;?>terminos/"> TÉRMINOS Y CONDICIONES</a><br>
         <a href="#">PREGUNTAS FRECUENTES</a> | <a href="<?php echo $url_relativa;?>contactanos/">CONTACTANOS</a></p>
       <div class="c"><img src="<?php echo $url_relativa;?>img/iconos/auto-negro.png"></div>
       <p class="r">Copyright De la Grua 2014<br>
         Design by <a href="http://www.kalidoscopio-d.com/" target="_blank">kalidoscopio</a></p>
       </div>
    </div>
</div><!--contenido-->
</div><!--wrapper-->
</body>
</html>
<?php
mysql_free_result($registros);
mysql_close($config);
?>
