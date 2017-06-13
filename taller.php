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
  // to fully log out a visitor we need to clear the session varialbles
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
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formcalificar")) {
	$colname_registro3 = $_POST['idusuario'];
	$colname2_registro3 = $_POST['idtaller'];
	mysql_select_db($database_config, $config);
	$query_registro3 = sprintf("SELECT idtaller FROM dlg_calificacion WHERE idusuario = %s AND idtaller = %s ", GetSQLValueString($colname_registro3, "int"), GetSQLValueString($colname2_registro3, "int"));
	$registro3 = mysql_query($query_registro3, $config) or die(mysql_error());
	$row_registro3 = mysql_fetch_assoc($registro3);
	$totalRows_registro3 = mysql_num_rows($registro3);


   $insertSQL = sprintf("INSERT INTO dlg_calificacion (fechahora, calificacion, idtaller, idusuario, atencion, precio, servicio, publicar) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
     GetSQLValueString($_POST['fechahora'], "date"),
     GetSQLValueString($_POST['calificacion'], "text"),
     GetSQLValueString($_POST['idtaller'], "int"),
     GetSQLValueString($_POST['idusuario'], "int"),
     GetSQLValueString($_POST['atencion'], "int"),
     GetSQLValueString($_POST['precio'], "int"),
     GetSQLValueString($_POST['servicio'], "int"),
     GetSQLValueString('0', "int"));

   mysql_select_db($database_config, $config);
   $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());
   if($Result1) {
    $mensaje = "Muchas gracias por enviarmos tu calificación. Ya quedó registrada y está pendiente de aprobación.";
  }

mysql_free_result($registro3);
}

$colname_usuario_sesion = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_usuario_sesion = $_SESSION['MM_Username'];
}
mysql_select_db($database_config, $config);
$query_usuario_sesion = sprintf("SELECT idusuario, nick, fblogin FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_usuario_sesion, "text"));
$usuario_sesion = mysql_query($query_usuario_sesion, $config) or die(mysql_error());
$row_usuario_sesion = mysql_fetch_assoc($usuario_sesion);
$totalRows_usuario_sesion = mysql_num_rows($usuario_sesion);

$colname_registro = "-1";
if (isset($_GET['id'])) {
  $nombre_id = explode("-",$_GET['id']);
  $indice = count($nombre_id) - 1;
  $colname_registro = $nombre_id[$indice];
}

mysql_select_db($database_config, $config);
$query_registro = sprintf("SELECT * from dlg_taller WHERE idtaller = %s", GetSQLValueString($colname_registro, "int"));
$registro = mysql_query($query_registro, $config) or die(mysql_error());
$row_registro = mysql_fetch_assoc($registro);
$totalRows_registro = mysql_num_rows($registro);

$colname_registro2 = "-1";
if (isset($_GET['id'])) {
  $nombre_id = explode("-",$_GET['id']);
  $indice = count($nombre_id) - 1;
  $colname_registro2 = $nombre_id[$indice];
}
mysql_select_db($database_config, $config);
$query_registro2 = sprintf("SELECT COUNT(atencion) AS atencionvotos, SUM(atencion) AS atencionvalor, COUNT(precio) AS preciovotos, SUM(precio) AS preciovalor, COUNT(servicio) AS serviciovotos, SUM(servicio) AS serviciovalor FROM dlg_calificacion WHERE publicar = '1' AND idtaller = %s", GetSQLValueString($colname_registro2, "int"));
$registro2 = mysql_query($query_registro2, $config) or die(mysql_error());
$row_registro2 = mysql_fetch_assoc($registro2);
$totalRows_registro2 = mysql_num_rows($registro2);

$colname_registros = "-1";
if (isset($_GET['id'])) {
  $nombre_id = explode("-",$_GET['id']);
  $indice = count($nombre_id) - 1;
  $colname_registros = $nombre_id[$indice];
}
mysql_select_db($database_config, $config);
$query_registros = sprintf("SELECT dlg_servicio.servicio FROM dlg_tallerservicio LEFT JOIN dlg_servicio ON dlg_tallerservicio.idservicio = dlg_servicio.idservicio WHERE dlg_tallerservicio.idtaller = %s ORDER BY dlg_servicio.servicio ASC", GetSQLValueString($colname_registros, "int"));
$registros = mysql_query($query_registros, $config) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);
$totalRows_registros = mysql_num_rows($registros);

$maxRows_registros2 = 4;
$pageNum_registros2 = 0;
if (isset($_GET['pageNum_registros2'])) {
  $pageNum_registros2 = $_GET['pageNum_registros2'];
}
$startRow_registros2 = $pageNum_registros2 * $maxRows_registros2;

$colname_registros2 = "-1";
if (isset($_GET['id'])) {
  $nombre_id = explode("-",$_GET['id']);
  $indice = count($nombre_id) - 1;
  $colname_registros2 = $nombre_id[$indice];
}
mysql_select_db($database_config, $config);
$query_registros2 = sprintf("SELECT dlg_calificacion.fechahora, dlg_calificacion.calificacion, dlg_calificacion.atencion, dlg_calificacion.precio, dlg_calificacion.servicio, dlg_usuario.nick FROM dlg_calificacion LEFT JOIN dlg_usuario ON dlg_usuario.idusuario = dlg_calificacion.idusuario WHERE publicar = '1' AND  idtaller = %s ORDER BY fechahora DESC", GetSQLValueString($colname_registros2, "int"));
$query_limit_registros2 = sprintf("%s LIMIT %d, %d", $query_registros2, $startRow_registros2, 400000000);
$registros2 = mysql_query($query_limit_registros2, $config) or die(mysql_error());
$row_registros2 = mysql_fetch_assoc($registros2);

if (isset($_GET['totalRows_registros2'])) {
  $totalRows_registros2 = $_GET['totalRows_registros2'];
} else {
  $all_registros2 = mysql_query($query_registros2);
  $totalRows_registros2 = mysql_num_rows($all_registros2);
}
$totalPages_registros2 = ceil($totalRows_registros2/$maxRows_registros2)-1;

$queryString_registros2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_registros2") == false &&
      stristr($param, "totalRows_registros2") == false) {
      array_push($newParams, $param);
  }
}
if (count($newParams) != 0) {
  $queryString_registros2 = "&" . htmlentities(implode("&", $newParams));
}
}
$queryString_registros2 = sprintf("&totalRows_registros2=%d%s", $totalRows_registros2, $queryString_registros2);

mysql_select_db($database_config, $config);
$query_registros3 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'taller arriba' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros3 = mysql_query($query_registros3, $config) or die(mysql_error());
$row_registros3 = mysql_fetch_assoc($registros3);
$totalRows_registros3 = mysql_num_rows($registros3);

mysql_select_db($database_config, $config);
$query_registros4 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'taller medio' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros4 = mysql_query($query_registros4, $config) or die(mysql_error());
$row_registros4 = mysql_fetch_assoc($registros4);
$totalRows_registros4 = mysql_num_rows($registros4);

mysql_select_db($database_config, $config);
$query_registros5 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'taller abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros5 = mysql_query($query_registros5, $config) or die(mysql_error());
$row_registros5 = mysql_fetch_assoc($registros5);
$totalRows_registros5 = mysql_num_rows($registros5);

$colname_registro4 = $row_usuario_sesion['idusuario'];
$colname2_registro4 = $_GET['id'];
mysql_select_db($database_config, $config);
$query_registro4 = sprintf("SELECT idtaller FROM dlg_calificacion WHERE idusuario = %s AND idtaller = %s ", GetSQLValueString($colname_registro4, "int"), GetSQLValueString($colname2_registro4, "int"));
$registro4 = mysql_query($query_registro4, $config) or die(mysql_error());
$row_registro4 = mysql_fetch_assoc($registro4);
$totalRows_registro4 = mysql_num_rows($registro4);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="description" content="De la Grúa | Guía colectiva de talleres para autos y motos.">
  <meta name="keywords" content="rectificacion,electricidad,reparacion,chaperia">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta property="og:title" content="<?php echo $row_registro['nombre']; ?>" />
  <meta property="og:description" content="DE LA GRUA | Guía colectiva de talleres para autos y motos" />
  <meta property="og:image" content="http://www.delagrua.com/img/logos/dlg_fc.png" />

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
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
<script src="<?php echo $url_relativa;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="<?php echo $url_relativa;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $url_relativa;?>js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php echo $url_relativa;?>js/main.js"></script>
<!-- fancyapps -->
<!-- <script type="text/javascript" src="js/fancyapps/jquery-1.10.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo $url_relativa;?>js/fancyapps/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url_relativa;?>css/fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

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
<!-- Nivo Slider  -->
<link rel="stylesheet" href="<?php echo $url_relativa;?>css/nivo-slider/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $url_relativa;?>css/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<!--<script type="text/javascript" src="js/nivo-slider/jquery-1.9.0.min.js"></script>-->
<script type="text/javascript" src="<?php echo $url_relativa;?>js/nivo-slider/jquery.nivo.slider.js"></script>
<script type="text/javascript">
  $(window).load(function() {
    $('#slider').nivoSlider({manualAdvance: true});
  });
</script>
<!-- fin Nivo Slider  -->
<script>
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

  function activar(imagen) {
    document.getElementById(imagen).src = "<?php echo $url_relativa;?>img/iconos/estrellita-amarilla.png";
  }
  function desactivar(imagen) {
    document.getElementById(imagen).src = "<?php echo $url_relativa;?>img/iconos/estrellita-gris.png";
  }
</script>
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
         <p class="log"><a class="fancybox fancybox.iframe" href="<?php echo $url_relativa;?>login.php">Inicia sesión</a> <a class="fancybox fancybox.iframe fa fa-power-off" href="/login.php"></a></p>
         <?php } else { ?>
         <p class="user">
          HOLA <?php echo $row_usuario_sesion['nick']; ?>
        </p>
        <p class="log"><a href="<?php echo $logoutAction ?>">Cerra sesión</a> <a class="fancybox fancybox.iframe fa fa-power-off" href="<?php echo $logoutAction ?>"></a>
         <?php if($row_usuario_sesion['fblogin'] == 0){?>
         <br>
         <a class="fancybox fancybox.iframe" href="<?php echo $url_relativa;?>login_cambia_clave.php">Cambia tu clave</a> <a class="fancybox fancybox.iframe fa fa-wrench" href="<?php echo $url_relativa;?>login_cambia_clave.php"></a></p>
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
      <li><a class="fancybox fancybox.iframe" href="<?php echo $url_relativa;?>login.php">CALIFICA UN TALLER</a></li>
      <?php } else { ?>
      <li><a href="<?php echo $url_relativa;?>#califica_taller">CALIFICA UN TALLER</a></li>
      <?php } ?>
      <li><a href="<?php echo $url_relativa;?>#agrega_taller">AGREGA TU TALLER</a></li>
    </ul>
  </div><!--barra-->
  <div class="cont960">
    <div class="resultados-busquedas"><!--rb-->

      <div class="uno"><a class="fa <?php echo ($row_registro['tipovehiculo'] == 'auto' ? 'fa-car' : 'fa-motorcycle') ?>"></a><?php echo $row_registro['nombre']; ?>
        <span class="corre">Recomendalo! <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo urlencode('http://www.delagrua.com/taller_info.php?id=' . $row_registro['idtaller']); ?>&p[title]=<?php echo $row_registro['nombre']; ?>&p[summary]=De la grúa | Guía colectiva de talleres para autos y motos&p[images][0]=http://www.delagrua.com/img/logos/dlg_fc.png" target="_blank" class="fa fa-facebook-square"></a> <a href="https://plus.google.com/share?url=www.delagrua.com/taller_info.php?id=<?php echo $row_registro['idtaller']; ?>" class="fa fa-google-plus-square" onclick="javascript:window.open(this.href,
          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a> <a href="http://twitter.com/home?status=<?php echo urlencode($row_registro['nombre'] . " http://www.delagrua.com/taller_info.php?id=" . $row_registro['idtaller'] . " en DE LA GRUA | Guía colectiva de talleres para autos y motos");?>"target="_blank" class="fa fa-twitter-square"></a>
        </span>
      </div>
      <div class="izquierda-grande"><!--izq-grande-->
       <div class="box"><!--box-->
         <div class="izq"><!--izq-->
          <div class="box-iconos"><i class="fa fa-fw fa-file-text-o"></i>
            <p>Código de área:<span class="gris">
              <?php echo $row_registro['telefonocodarea']; ?></span>&nbsp;Teléfono:<span class="gris"> <?php echo $row_registro['telefono']; ?></span><br>
              <!-- Mail: <span class="gris"><a href="mailto:<?php echo $row_registro['email']; ?>" target="_blank" class="link-gris"><?php echo $row_registro['email']; ?></a></span><br> -->
              <?php if ($row_registro['web']): ?>
                Web: <span class="gris"><a href="http://<?php echo $row_registro['web']; ?>" target="_blank" class="link-naranja"><?php echo $row_registro['web']; ?></a></span>
              <?php endif ?>
            </p>
          </div>

          <div class="box-iconos chico"><i class="fa fa-fw fa-wrench"></i>
            <p>
            <?php if ($totalRows_registros > 0) { // Show if recordset not empty ?><?php do { ?><a class="b1"><?php echo $row_registros['servicio']; ?></a><?php } while ($row_registros = mysql_fetch_assoc($registros)); ?><?php } // Show if recordset not empty ?>
            </p>
            </div>

            <div class="box-iconos chico">
              <i class="fa fa-fw  fa-dot-circle-o"></i>
              <p>
                <span class="gris">
                  <?php echo getAddress($row_registro) ?>.
                </span>
              </p>
            </div>

            <div class="box-iconos corridoX"><i class="fa fa-fw  fa-star-half-empty"></i>
              <p><span class="atpreser">Atención:</span>&nbsp;
                <?php
                if($row_registro2['atencionvotos'] > 0){
                 $estrellas = round($row_registro2['atencionvalor']/$row_registro2['atencionvotos']);
               } else {
                 $estrellas = 0;
               }
               switch ($estrellas) {
                case 0:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 1:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 2:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 3:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 4:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 5:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
                break;
              }
              ?>
              <span class="gris">  <?php echo $row_registro2['atencionvotos']; ?> VOTOS</span></p>
              <p><span class="atpreser">Precio:</span>&nbsp;
                <?php
                if($row_registro2['preciovotos'] > 0){
                 $estrellas = round($row_registro2['preciovalor']/$row_registro2['preciovotos']);
               } else {
                 $estrellas = 0;
               }
               switch ($estrellas) {
                case 0:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 1:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 2:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 3:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 4:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 5:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
                break;
              }
              ?>
              <span class="gris">  <?php echo $row_registro2['preciovotos']; ?>VOTOS</span></p>
              <p><span class="atpreser">Servicio:</span>&nbsp;
                <?php
                if($row_registro2['serviciovotos'] > 0){
                 $estrellas = round($row_registro2['serviciovalor']/$row_registro2['serviciovotos']);
               } else {
                 $estrellas = 0;
               }
               switch ($estrellas) {
                case 0:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 1:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 2:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 3:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 4:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" . $url_relativa . "img/iconos/estrellita-gris.png\"/>";
                break;
                case 5:
                echo "<img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" . $url_relativa . "img/iconos/estrellita-amarilla.png\">";
                break;
              }
              ?>
              <span class="gris">  <?php echo $row_registro2['serviciovotos']; ?>VOTOS</span></p>
            </div>

          </div><!--izq-->

          <div class="der"><!--der-->
            <div id="map-canvas" style="height: 320px"></div>
          </div><!--der-->
          <div id="fotos-taller">
            <!-- Nivo Slider  -->
            <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <?php if($row_registro['foto1'] != ''){ ?>
                <a href="#"><img src="<?php echo $url_relativa;?>img/talleres/<?php echo $row_registro['foto1']; ?>" data-thumb="img/talleres/<?php echo $row_registro['foto1']; ?>" alt="" title=""/></a>
                <?php } ?>
                <?php if($row_registro['foto2'] != ''){ ?>
                <a href="#"><img src="<?php echo $url_relativa;?>img/talleres/<?php echo $row_registro['foto2']; ?>" data-thumb="img/talleres/<?php echo $row_registro['foto2']; ?>" alt="" title=""/></a>
                <?php } ?>
                <?php if($row_registro['foto3'] != ''){ ?>
                <a href="#"><img src="<?php echo $url_relativa;?>img/talleres/<?php echo $row_registro['foto3']; ?>" data-thumb="img/talleres/<?php echo $row_registro['foto3']; ?>" alt="" title=""/></a>
                <?php } ?>
              </div>
            </div>
            <!-- fin Nivo Slider  -->
          </div>
          <div class="clasificar"><!--clasificar-->
            <a name="califica_taller"></a><h1>CALIFICA ESTE TALLER</h1>
            <?php if($totalRows_registro4 > 0) { ?>
            <div class="left">Ya calificaste este taller.</div>
            <?php } else { ?>
            <form action="<?php echo $editFormAction; ?>#califica_taller" method="POST" name="formcalificar" id="formcalificar">
             <div class="left">
               <?php if($mensaje != '') { ?>
               <p><?php echo $mensaje; ?></p><p>&nbsp;</p>
               <?php } else { ?>
               <p><span class="atpreser-calif">Que te pareció la Atención?:
                 <input type="hidden" name="atencion" id="atencion">
               </span> <img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris1" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='1';activar('ateestrellagris1');desactivar('ateestrellagris2');desactivar('ateestrellagris3');desactivar('ateestrellagris4');desactivar('ateestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris2" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='2';activar('ateestrellagris1');activar('ateestrellagris2');desactivar('ateestrellagris3');desactivar('ateestrellagris4');desactivar('ateestrellagris5');"  <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris3" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='3';activar('ateestrellagris1');activar('ateestrellagris2');activar('ateestrellagris3');desactivar('ateestrellagris4');desactivar('ateestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris4" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='4';activar('ateestrellagris1');activar('ateestrellagris2');activar('ateestrellagris3');activar('ateestrellagris4');desactivar('ateestrellagris5');" <?php } ?>  onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris5"  <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='5';activar('ateestrellagris1');activar('ateestrellagris2');activar('ateestrellagris3');activar('ateestrellagris4');activar('ateestrellagris5');" <?php } ?>  onmouseover="JavaScript:this.style.cursor='pointer'"/></p>
               <p><span class="atpreser-calif">Y el Precio?:
                 <input type="hidden" name="precio" id="precio">
               </span> <img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris1" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?>onClick="document.formcalificar.precio.value='1';activar('preestrellagris1');desactivar('preestrellagris2');desactivar('preestrellagris3');desactivar('preestrellagris4');desactivar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris2" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.precio.value='2';activar('preestrellagris1');activar('preestrellagris2');desactivar('preestrellagris3');desactivar('preestrellagris4');desactivar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris3" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.precio.value='3';activar('preestrellagris1');activar('preestrellagris2');activar('preestrellagris3');desactivar('preestrellagris4');desactivar('preestrellagris5');"  <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris4" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?>  onClick="document.formcalificar.precio.value='4';activar('preestrellagris1');activar('preestrellagris2');activar('preestrellagris3');activar('preestrellagris4');desactivar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris5" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?>  onClick="document.formcalificar.precio.value='5';activar('preestrellagris1');activar('preestrellagris2');activar('preestrellagris3');activar('preestrellagris4');activar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/></p>
               <p><span class="atpreser-calif">Y la calidad del Servicio técnico?:
                 <input type="hidden" name="servicio" id="servicio">
               </span> <img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris1" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='1';activar('serestrellagris1');desactivar('serestrellagris2');desactivar('serestrellagris3');desactivar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris2" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='2';activar('serestrellagris1');activar('serestrellagris2');desactivar('serestrellagris3');desactivar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris3" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='3';activar('serestrellagris1');activar('serestrellagris2');activar('serestrellagris3');desactivar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris4" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='4';activar('serestrellagris1');activar('serestrellagris2');activar('serestrellagris3');activar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo $url_relativa;?>img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris5" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='5';activar('serestrellagris1');activar('serestrellagris2');activar('serestrellagris3');activar('serestrellagris4');activar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/></p>
             </div>

             <div class="rigth">
               <textarea name="calificacion" rows="3" maxlength="250" id="calificacion" style="width:100%" placeholder="Escribí tu calificación"></textarea>
               <div class="boton-b"> <?php if (!isset($_SESSION['MM_Username'])) { ?><a class="fancybox fancybox.iframe" href="/login.php"><?php } else { ?><a href="#" onClick="MM_validateForm('atencion','','R','precio','','R','servicio','','R','calificacion','','R');if( document.MM_returnValue){if(document.formcalificar.calificacion.value.length < 30) {alert('Debe ingresar al menos 30 caracteres');document.formcalificar.calificacion.focus;return false;} else {document.formcalificar.submit();}}"><?php } ?>ENVIAR!</a></div></li>

               <span class="atpreser-calif">
                 <input name="idusuario" type="hidden" id="idusuario" value="<?php echo $row_usuario_sesion['idusuario']; ?>">
                 <input name="idtaller" type="hidden" id="idtaller" value="<?php echo $row_registro['idtaller']; ?>">
                 <input name="fechahora" type="hidden" id="fechahora" value="<?php echo date('Y-m-d h:i'); ?>">
               </span></div>
               <input type="hidden" name="MM_insert" value="formcalificar">
             </form>
             <?php } ?>
             <?php } ?>
           </div><!--clasificar-->
           <div class="opiniones"><!--opiniones-->
             <h1>OPINIONES DE CLIENTES</h1>
             <?php if ($totalRows_registros2 > 0) { // Show if recordset not empty ?>
             <?php do { ?>
             <div class="leftXX"><!--left-->
              <div class="opinion">
                <!--op-->
                <img src="<?php echo $url_relativa;?>img/iconos/per.png" width="38" height="38">
                <p> <span class="persona"><?php echo $row_registros2['nick']; ?></span><span class="gris"> | <?php echo formato_fecha($row_registros2['fechahora']); ?></span>
                  <hr>
                  <?php
                  if(($row_registros2['atencion']+$row_registros2['precio']+$row_registros2['servicio']) > 0){
                   $estrellas = round(($row_registros2['atencion']+$row_registros2['precio']+$row_registros2['servicio'])/3);
                 } else {
                   $estrellas = 0;
                 }
                 switch ($estrellas) {
                  case 0:
                  echo '';
                  break;
                  case 1:
                  echo '<i class="fa fa-star"></i>';
                  break;
                  case 2:
                  echo '<i class="fa fa-star"></i><i class="fa fa-star"></i>';
                  break;
                  case 3:
                  echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                  break;
                  case 4:
                  echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                  break;
                  case 5:
                  echo '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                  break;
                }
                ?>

                <hr>
              </p>
              <p><?php echo $row_registros2['calificacion']; ?></p>

            </div>

            <!--op-->
          </div><!--left-->

          <!-- <div style="clear:both;"></div> -->
          <div class="clear"></div>

          <?php } while ($row_registros2 = mysql_fetch_assoc($registros2)); ?>
          <?php } // Show if recordset not empty ?>

        </div><!--opiniones-->
     </div><!--box-->

     <div class="volver-resultados">
       <div class="boton-volver"><a href="<?php echo $url_relativa;?>#busca_taller">VOLVER A LA BUSQUEDA <i class="fa fa-search"></i></a></div>
     </div>

   </div><!--izq-grande-->

   <div class="derecha"><!--derecha-->
    <div class="box2">
      <?php if ($totalRows_registros3 > 0) { // Show if recordset not empty ?>
      <a href="http://<?php echo $row_registros3['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros3['imagen']; ?>" width="280" height="210" alt=""/></a>
      <?php } // Show if recordset not empty ?>
    </div>
    <div class="box2">
      <?php if ($totalRows_registros4 > 0) { // Show if recordset not empty ?>
      <a href="http://<?php echo $row_registros4['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros4['imagen']; ?>" width="280" height="210" alt=""/></a>
      <?php } // Show if recordset not empty ?>
    </div>
    <div class="box2">
      <?php if ($totalRows_registros5 > 0) { // Show if recordset not empty ?>
      <a href="http://<?php echo $row_registros5['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros5['imagen']; ?>" width="280" height="210" alt=""/></a>
      <?php } // Show if recordset not empty ?>
    </div>
  </div><!--derecha-->

</div><!--rb-->

</div><!--cont-->
</div><!--contenido-->

<div class="pie"><!--contenido-->
 <div class="cont">
   <div class="centro">
     <p class="l"><a href="<?php echo $url_relativa;?>faq/">ACERCA DE LA GRUA</a> |<a href="<?php echo $url_relativa;?>terminos/"> TÉRMINOS Y CONDICIONES</a><br>
       <a href="<?php echo $url_relativa;?>faq/">PREGUNTAS FRECUENTES</a> | <a href="<?php echo $url_relativa;?>contactanos/">CONTACTANOS</a></p>
       <div class="c"><img src="<?php echo $url_relativa;?>img/iconos/auto-negro.png"></div>
       <p class="r">Copyright De la Grua 2014<br>
         Design by <a href="#">kalidoscopio</a></p>
       </div>
     </div>
   </div>
 </div><!--contenido-->

</div><!--wrapper-->

<script>

  // Get coordinates from db
  var lat = <?php echo $row_registro['lat'] ?>;
  var lng = <?php echo $row_registro['lng'] ?>;

  function initialize() {
    var mapOptions = {
      zoom: 15,
      center: new google.maps.LatLng(lat , lng)
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

    var image = '/img/mapicon.png';
    var myLatLng = new google.maps.LatLng(lat , lng);
    var beachMarker = new google.maps.Marker({
      // animation: google.maps.Animation.DROP,
      position: myLatLng,
      map: map,
      icon: image
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>

</body>
</html>
<?php
mysql_free_result($usuario_sesion);
mysql_free_result($registros);
mysql_free_result($registros2);
mysql_free_result($registros3);
mysql_free_result($registros4);
mysql_free_result($registros5);
mysql_free_result($registro);
mysql_free_result($registro2);
mysql_free_result($registro4);
mysql_close($config);
?>
