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
              <?php if (!isset($_SESSION['MM_Username'])) { ?>
              <li><a class="fancybox fancybox.iframe" href="/login.php">CALIFICA UN TALLER</a></li>
              <?php } else { ?>
              <li><a href="<?php echo $url_relativa;?>#busca_taller">CALIFICA UN TALLER</a></li>
              <?php } ?>
              <li><a href="<?php echo $url_relativa;?>#agrega_taller">AGREGA TU TALLER</a></li>
           </ul>
      </div><!--barra-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="uno"><a class="fa fa-check"></a>TERMINOS Y CONDICIONES</div>

      <div class="preguntas-frecuentes grandeleft"><!--pregunta-->
      <p class="titulo">Bienvenido a De La Grua. Al utilizar La Guia, el usuario acepta los siguientes términos y condiciones que se detallan:</p>
      <p class="titulo"><strong>Sobre los Contenidos</strong></p>
      <p>Los contenidos de De La Grua que se exhiben -tanto las reseñas como las fotografías- son de exclusiva propiedad de De La Grua. Se encuentra prohibida su reproducción total y/o parcial.<br><br>
      Los datos que se publican están para ser consultados por el usuario final. Se prohibe la descarga masiva o iterativa por cualquier medio de los datos recabados y su posterior utilización con cualquier fin.<br><br></p>      </div><!--pregunta-->

      <div class="preguntas-frecuentes granderight"><!--pregunta-->
      <p>Cada voto representa una licencia no exclusiva, internacional, perpetua, irrevocable, sin retribución alguna y licenciable para mostrar, transmitir y explotar por cualquier medio que De La Grua considere pertinente.</p>
      </div><!--pregunta-->

      </div>
      </div><!--c2-->

<div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="uno"><a class="fa fa-file-text"></a>POLITICA DE PRIVACIDAD</div>

      <div class="preguntas-frecuentes grandeleft"><!--pregunta-->
      <p class="titulo"><strong>Sobre los ránkings y calificaciones</strong></p>
      <p>Las opiniones, votos y/o ránkings que figuran en esta Guía son elaborados y/o emitidos por los usuarios y no constituyen un juicio de valor por parte de De La Grua.<br><br>
<p>De La Grua:<br><br>
1) No asume responsabilidad alguna por las decisiones a las que arribe el receptor de la información ni por los daños que pudiera ocasionar la falta de exactitud de los datos asentados.<br><br>
2) Basándose en sus sistemas automatizados y/o manuales de seguridad, se reserva el derecho de anular los votos que se consideren
</p>
      </div><!--pregunta-->

      <div class="preguntas-frecuentes granderight"><!--pregunta-->
      <p>falsos y/o tengan la intención de favorecer y/o perjudicar en forma deliberada a un establecimiento.<br><br>
      3) Se reserva el derecho de publicar u omitir las opiniones vertidas por los usuarios en sus votos en forma discrecional. El usuario acepta que De La Grua podrá optar por editar parcial o totalmente sus comentarios, con el fin de mejorar la comprensión de éste por parte de los usuarios o para ajustarlos a las políticas que rigen sobre los mismos. <br><br>
Si tenés preguntas adicionales, contactate a delagrua1@gmail.com</p>
      </div><!--pregunta-->

      </div>
      </div><!--c2-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="uno">&nbsp;</div>
      <div class="preguntas-frecuentes grandeleft"><!--pregunta-->
      <p class="titulo"><strong>Comentarios</strong></p>
      <p>Los Usuarios autorizan a De La Grua a publicar,  distribuir, ceder y hacer uso de los comentarios y votos que ingresan al  sistema, renunciando a cualquier derecho de autor que pueda recaer sobre los  mismos. Los Usuarios son responsables por los comentarios y votos, debiendo  mantener indemne a De La Grua ante posibles reclamos por ellos generados. Se  prohíbe la utilización de términos ofensivos y contrarios a la moral y buenas  costumbres. No se aceptarán comentarios a modo de denuncia (ya sean sobre  higiene, salubridad o impositivas) ni comentarios que mencionen nombres de  personas o nombres de otros talleres o negocios distintos al que se está  comentando. De La Grua se reserva el derecho de no publicar, editar o borrar  aquellos comentarios que a su entender violen las disposiciones de la presente  política. <br><br></p>
      </div><!--pregunta-->

      <div class="preguntas-frecuentes granderight"><!--pregunta-->
      <p><ul><li>Está prohibido promocionar, comercializar, vender, publicar y/u ofrecer cualquier clase de productos, servicios y/o actividades por intermedio de o a través de la utilización del servicio incluyendo cualquier tipo de propaganda o publicidad encubierta.</li>
        <li>Está prohibido la publicación de datos personales sin el consentimiento expreso de la persona involucrada.</li>
        </ul><br><br>
De  La Grua se reserva el derecho de no publicar (o remover luego de ser  publicados) todos aquellos contenidos y/o mensajes propuestos y/o mensajes propuestos y/o publicados  por el Usuario que, a exclusivo criterio de De La Grua, no respondan  estrictamente a las disposiciones contenidas en el presente y/o resulten  impropios y/o inadecuados a las características, finalidad y/o calidad del  servicio, asimismo De La Grua no<br>
<br>
      </p>
      </div><!--pregunta-->

      </div>
      </div><!--c2-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="preguntas-frecuentes grandeleft"><!--pregunta-->
      <p>
      El Usuario expresamente reconoce y acepta que: <br><br>
      <ul type="disc">
        <li>No está permitido utilizar lenguaje vulgar /obsceno, discriminatorio y/u ofensivo.</li>
        <li>Está prohibido todo acto contrario a las leyes, moral y buenas costumbres.</li>
        <li>Está prohibido publicar mensajes agraviante, difamatorios, calumniosos, injuriosos, falsos, dilacerantes, ofensivos, discriminatorios, pornográficos, de contenido violento, insultantes, amenazantes, instigantes a conductas de contenido ilícito o peligrosas para la salud, y la utilización de lenguaje inapropiado y/o que vulneren de cualquier forma la privacidad de cualquier tercero.</li>
       <li>Está prohibido violar directa o indirectamente los derechos intelectuales de propiedad de cualquier persona, cualquier copyright, marcas, derechos de publicidad, u otros derechos de propiedad.</li>
             </ul>
      </p>
      </div><!--pregunta-->

      <div class="preguntas-frecuentes granderight"><!--pregunta-->
      <p> es en ningún caso responsable de la  destrucción, alteración o eliminación del contenido o información que cada  Usuario incluya en sus mensajes. <br><br>
      De La Grua no garantiza ningún plazo de  publicación de los comentarios, ni disponibilidad y continuidad del  funcionamiento del servicio.<br>
<br>
Cada usuario es único y exclusivo responsable de  sus manifestaciones, dichos, opiniones y todo acto que realice, debiendo  mantener indemne a De La Grua por todo daño que genere, ya sea en forma directa  o por terceros que le realicen reclamos.<br>
<br>
El Usuario reconoce los derechos para la  publicación reproducción, o cesión a terceros por cualquier título, de los  contenidos con los que hubiera participado. La publicación de un mensaje,  comentario o cualquier otra forma de participación de un usuario, en el sitio  de De La Grua, no generará ninguna obligación económica para con el usuario,  por parte de De La Grua.
		</p>
      </div><!--pregunta-->

      </div>
      </div><!--c2-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="uno">&nbsp;</div>
      <div class="preguntas-frecuentes grandeleft"><!--pregunta-->
      <p class="titulo"><strong>Jurisdicción y competencia</strong></p>
      <p>Para todas las  cuestiones litigiosas que se susciten en relación con la interpretación,  ejecución y cumplimiento del presente acuerdo, las partes se someten a la  jurisdicción y competencia de los Tribunales Ordinarios en lo Comercial de la  Capital Federal. Renunciando a cualquier otro fuero o jurisdicción que pudiere  corresponderles por cualquier razón presente o futura.<br><br>
        Términos y Condiciones Vigentes desde agosto del año 2014.
      </p>
      </div><!--pregunta-->

      <div class="preguntas-frecuentes granderight"><!--pregunta-->
      </div><!--pregunta-->

      </div>
      </div><!--c2-->


</div><!--cont-->
</div><!--contenido-->

<div class="pie"><!--contenido-->
     <div class="cont">
       <div class="centro">
       <p class="l"><a href="<?php echo $url_relativa;?>faq/">ACERCA DE LA GRUA</a> |<a href="#"> TÉRMINOS Y CONDICIONES</a><br>
         <a href="<?php echo $url_relativa;?>faq/">PREGUNTAS FRECUENTES</a> | <a href="<?php echo $url_relativa;?>contactanos/">CONTACTANOS</a></p>
       <div class="c"><img src="<?php echo $url_relativa;?>img/iconos/auto-negro.png"></div>
       <p class="r">Copyright De la Grua 2014<br>
         Design by <a href="http://www.kalidoscopio-d.com/" target="_blank">kalidoscopio</a></p>
       </div>
    </div>
</div><!--contenido-->

</div><!--wrapper-->
</body>
</html>
