<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="description" content="De la Grúa | Guía colectiva de talleres para autos y motos.">
  <meta name="keywords" content="mecanico,llanta,ford,cristales,inyeccion">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    <?php if (isset($titulo) && $titulo): ?>
      <?php echo $titulo ?>
    <?php else : ?>
      DE LA GRUA | Guía colectiva de talleres para autos y motos
    <?php endif ?>
  </title>
  <link rel="icon" href="<?php echo $url_relativa;?>favicon.png" type="image/png" />
  <link rel="icon" href="<?php echo $url_relativa;?>favicon.ico" type="image/vnd.microsoft.icon" />
  <link rel="shortcut icon" href="<?php echo $url_relativa;?>favicon.ico" /><meta name="description" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $_config['libraries'];?>css/normalize.min.css">
  <link rel="stylesheet" href="<?php echo $_config['libraries'];?>css/main.css">
  <link href="<?php echo $_config['libraries'];?>css/grua.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $_config['libraries'];?>fonts/fuentes.css" rel="stylesheet" type="text/css">


  <link href="<?php echo $_config['libraries'];?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-54692324-1', 'auto');
    ga('send', 'pageview');
  </script>
  <script src="<?php echo $_config['libraries'];?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script></head>
  <script src="<?php echo $_config['libraries'];?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script></head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $_config['libraries'];?>js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
  <script src="<?php echo $_config['libraries'];?>js/main.js"></script>


  <script src="<?php echo $_config['libraries'];?>js/vendor/jquery.geocomplete.min.js"></script>

  <!-- fancyapps -->
  <!-- <script type="text/javascript" src="js/fancyapps/jquery-1.10.1.min.js"></script>-->
  <script type="text/javascript" src="<?php echo $_config['libraries'];?>js/fancyapps/jquery.fancybox.js?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo $_config['libraries'];?>css/fancyapps/jquery.fancybox.css?v=2.1.5" media="screen" />
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
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}

function actualizar(){
	f=document.formbuscar;
	if(f.provincia.value == 'Provincia'){
		alert("Debe seleccionar una provincia");
		f.provincia.focus;
		return(0);
	}
	window.location='<?php echo $url_relativa;?>talleres/' + f.tipovehiculo.value +  "/" + f.marca.value +  "/" + f.provincia.value +  "/" + f.localidad.value +  "/" + f.servicio.value +  "/"+ f.ordenarpor.value +  "/"+ f.orden.value +  "/";
}

function actualizar2(){
	f=document.formbuscar2;
	if(f.provincia.value == 'Provincia'){
		alert("Debe seleccionar una provincia");
		f.provincia.focus;
		return(0);
	}
	window.location='<?php echo $url_relativa;?>talleres/' + f.tipovehiculo.value +  "/" + f.marca.value +  "/" + f.provincia.value +  "/" + f.localidad.value +  "/" + f.servicio.value +  "/"+ f.ordenarpor.value +  "/"+ f.orden.value +  "/";
}

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
    <?php
    if($_SERVER['PHP_SELF'] == '/delagrua/index.php' || $_SERVER['PHP_SELF'] == '/delagrua/faq.php')
    {
        echo '<div class="nav-barra sombra-XX">';    
    }else
    {
        echo '<div class="nav-barra sombra">';
    }
    ?>    
     <ul>
      <li><a href="<?php echo $url_relativa;?>#busca_taller">BUSCA UN TALLER</a></li>
      <?php if (!isset($_SESSION['MM_Username'])) { ?>
      <li><a class="fancybox fancybox.iframe" href="<?php echo $url_relativa;?>login.php">CALIFICA UN TALLER</a></li>
      <?php } else { ?>
      <li><a href="<?php echo $url_relativa;?>#busca_taller">CALIFICA UN TALLER</a></li>
      <?php } ?>
      <li><a href="<?php echo $url_relativa;?>#agrega_taller">AGREGA TU TALLER</a></li>
    </ul>
  </div><!--barra-->



