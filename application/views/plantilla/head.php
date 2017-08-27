<?php 
//header("Access-Control-Allow-Origin", "*");
//header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
$_config['libraries'] = base_url().'librerias/';
?>
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
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
	<?php 
	if (isset($titulo) && $titulo)
	{
		echo $titulo;
	}else{
		echo 'DE LA GRUA | Guía colectiva de talleres para autos y motos';
	} 
	?>
  	</title>

  	<link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/vnd.microsoft.icon" />
  	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" /><meta name="description" content="">
 
	<?php
  		echo setCss('css/normalize.min.css');
		echo setCss('css/main.css');
		echo setCss('css/grua.css');
		echo setCss('css/fancyapps/jquery.fancybox.css');
		echo setCss('fonts/fuentes.css');
		echo setCss('font-awesome/css/font-awesome.min.css');
				
		if($_SERVER['SCRIPT_URL'] != '/index.php/terminos/')
		{
			echo setCss('bootstrap/css/bootstrap.css');
		}
		
  	?>

  	<script>
	    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	    ga('create', 'UA-54692324-1', 'auto');
	    ga('send', 'pageview');
  	</script>
  	<?php
  		echo setJs('js/jquery.min.js');
  		echo setJs('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"');
		echo setJs('js/vendor/jquery.geocomplete.min.js');
		echo setJs('js/fancyapps/jquery.fancybox.js');
		echo setJs('js/main.js');
		
		if($_SERVER['SCRIPT_URL'] != '/index.php/terminos/')
		{
			echo setJs('bootstrap/js/bootstrap.js'); 
		}
		
  	?>

	<script type="text/javascript">
	    
	</script>
  	<!-- fin fancyapps -->
<script>
function MM_callJS(jsStr) 
{
  return eval(jsStr)
}

function actualizar()
{
	f=document.formbuscar;
	if(f.provincia.value == 'Provincia'){
		alert("Debe seleccionar una provincia");
		f.provincia.focus;
		return(0);
	}
	window.location='<?php echo base_url();?>talleres/' + f.tipovehiculo.value +  "/" + f.marca.value +  "/" + f.provincia.value +  "/" + f.localidad.value +  "/" + f.servicio.value +  "/"+ f.ordenarpor.value +  "/"+ f.orden.value +  "/";
}

function actualizar2()
{
	f=document.formbuscar2;
	if(f.provincia.value == 'Provincia'){
		alert("Debe seleccionar una provincia");
		f.provincia.focus;
		return(0);
	}
	window.location='<?php echo base_url();?>talleres/' + f.tipovehiculo.value +  "/" + f.marca.value +  "/" + f.provincia.value +  "/" + f.localidad.value +  "/" + f.servicio.value +  "/"+ f.ordenarpor.value +  "/"+ f.orden.value +  "/";
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
         			<?php 
         			if (!isset($_SESSION['MM_Username'])) 
         			{
         			?>
         				<p class="user">&nbsp;</p>
         				<p class="log">
         					<a class="fancybox fancybox.iframe" data-toggle="modal" data-target="#myModal">Inicia sesión</a> 
         					<a class="fancybox fancybox.iframe fa fa-power-off" href="<?php echo base_url();?>login.php"></a>
         				</p>
         			<?php 
					} else 
					{ ?>
         				<p class="user">
          					HOLA <?php echo $_SESSION['nick']; ?>
						</p>
        				<?php 
        				//if(isset($logoutAction))
        				if (isset($_SESSION['MM_Username'])) 
        				{ ?>
        					<p class="log">
        						<a href="<?php echo base_url().'index.php/login/logout/' ?>">Cerra sesión</a> 
        						<a class="fancybox fancybox.iframe fa fa-power-off" href="<?php echo base_url().'index.php/login/logout/' ?>"></a>
        					
        				<?php 
						}
         				
         				if($_SESSION['fblogin'] == 0)
         				{?>
         				<br>
         				<a class="fancybox fancybox.iframe" data-toggle="modal"  data-target="#cambiarClaveModal">Cambia tu clave</a> 
         				<a class="fancybox fancybox.iframe fa fa-wrench" href="<?php echo base_url();?>index.php/login/login_cambia_clave/.php"></a>
         				</p>
        				 <?php 
						} 
					} ?>
				</div>
				
				<div class="logo">
					<a href="<?php echo base_url();?>">
						<img src="<?php echo base_url();?>assets/img/logos/delagrua.png" title="DE LA GRÚA">
					</a>
         			<p>Guía colectiva de talleres para autos y motos</p>
       			</div>

       			<div class="buscanos">
       				CORRE LA VOZ! <br> 
       				<a href="https://www.facebook.com/guiadelagrua" target="_blank" class="fa fa-facebook-square"></a> 
       				<a href="https://plus.google.com/103267201251041877547/about" target="_blank"  class="fa fa-google-plus-square"></a>
       			</div>
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
	      		<li><a href="<?php echo base_url();?>#busca_taller">BUSCA UN TALLER</a></li>
	      		<?php //if (!isset($_SESSION['MM_Username'])) { 
	      		if (TRUE) { 
	      		?>
	      		<li><a class="fancybox fancybox.iframe" href="<?php echo base_url();?>index.php/login/">CALIFICA UN TALLER</a></li>
	      		<?php } else { ?>
	      		<li><a href="<?php echo base_url();?>#busca_taller">CALIFICA UN TALLER</a></li>
	      		<?php } ?>
	      		<li><a href="<?php echo base_url();?>#agrega_taller">AGREGA TU TALLER</a></li>
	    	</ul>
		</div><!--barra-->


<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
?>



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

<?php
if($_SERVER['SCRIPT_URL'] != '/index.php/terminos/')
{
?>
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog" style="width: 400px;">

    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Inicio Sessión</h4>
		</div>
		<div class="modal-body">
			<div class="wrapper"><!--wrapper-->
				<div class="cont-pop" style="width: 100%;"><!--pop-->
	     			<div class="sup">
	          			<img src="<?php echo base_url();?>/admin_toolkit/img/iconos/auto-negro-up.png">
	     			</div>
	
	     			<div class="cen">
		       			<div class="box-pop">
		          			<h1>
		          				<span class="amarillo">1.</span>CONECTATE AL SITIO CON TU CUENTA DE FACEBOOK O TU CUENTA DE DE LA GRUA
		          			</h1>
				  			<!-- facebook login -->
		          			<a href="#">
		          				<img src="<?php echo base_url();?>/assets/img/facebook-connect.png" alt="Fb Connect" title="Login with facebook" onclick="FBLogin();"/>
		          			</a>
		          		</div>
				  		<!-- fin facebook login -->
		       			<form ACTION="<?php echo base_url().'index.php/login/'; ?>" METHOD="POST" id="formsesion" name="formsesion">
			       			<div class="box-pop">
						         <!--<h2>Para calificar, tenes que loguearte al sitio.</h2>-->
								<div class="login-pop">
						        	<input name="email" type="text" class="input" id="email" placeholder="E-mail" title="E-mail" value="" maxlength="255"><br>
						        </div>
			
						        <div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="" maxlength="20"><br>
						          	<a href="<?php echo base_url()?>index.php/login/login_olvide_contrasena/">Olvidé mi contraseña</a>
						        </div>
						       
			       			</div>
						</form>
		       			<div class="box-pop">
		         			<h2>Creá una cuenta en <a href="<?php echo base_url().'index.php/login/crear_cuenta/'?>">delagrua.com</a></h2>
		         			<h2><a href="<?php echo base_url()?>index.php/terminos/">Términos y Condiciones</a></h2>
						</div>			
					</div>
				</div><!--pop-->
			</div><!--wrapper-->
		</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button class="btn btn-primary" href="#" onClick="MM_validateForm('email','','RisEmail','clave','','R');if( document.MM_returnValue){document.formsesion.submit();}">INGRESAR</button>
      	</div>
    </div>
  	</div>
</div>		
		
		
		
	



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-54692324-1', 'auto');
  ga('send', 'pageview');
</script>
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
		
		
		
		
<div id="cambiarClaveModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 400px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        
		<div class="wrapper"><!--wrapper-->
		<div class="cont-pop" style="width: 100%;"><!--pop-->
			<div class="sup">
				<img src="<?php echo base_url();?>assets/img/iconos/auto-negro-up.png">
			</div>
				<form action="login_cambia_clave/" method="post" id="formsesion" name="formsesion">   
					<div class="box-pop">
						<center>
			         	<div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="<?php if(isset($_POST['clave'])){ echo ''; }?>" maxlength="50"></div>
			          	<div class="login-pop"><input name="confirmarclave" type="password" class="input" id="confirmarclave" placeholder="Confirmar Contraseña" title="Confirmar Contraseña" value="<?php if(isset($_POST['confirmarclave'])){ echo ''; }?>" maxlength="50"></div>
			         	<div class="login-pop">
				            <input name="MM_update" type="hidden" id="MM_update" value="formguardar">
				            
			         	</div>
			         	</center>
					</div>
				</form>
			</div><!--pop-->
		</div><!--wrapper-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onClick="
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
								" >CAMBIAR CLAVE</button>
							</div>
      </div>
    </div>

  </div>
</div>
		<?php
		}
?>
