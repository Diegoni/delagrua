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
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper"><!--wrapper-->
<div class="cont-pop"><!--pop-->
	<div class="sup">
		<img src="<?php echo base_url();?>assets/img/iconos/auto-negro-up.png">
	</div>
	<div class="cen">
		<div class="box-pop">
			<h1>CAMBIA TU CLAVE</h1>
		</div>
		<form action="login_cambia_clave/" method="post" id="formsesion" name="formsesion">   
		<div class="box-pop">
			<?php 
			if($mensaje)
			{
            	echo '<div class="login-pop">'.$mensaje.'</div>';
            } else 
            {
            ?>
         	<div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="<?php if(isset($_POST['clave'])){ echo ''; }?>" maxlength="50"></div>
          	<div class="login-pop"><input name="confirmarclave" type="password" class="input" id="confirmarclave" placeholder="Confirmar Contraseña" title="Confirmar Contraseña" value="<?php if(isset($_POST['confirmarclave'])){ echo ''; }?>" maxlength="50"></div>
         	<div class="login-pop">
	            <input name="MM_update" type="hidden" id="MM_update" value="formguardar">
	            <div class="boton-b">
	            	<a href="#" onClick="
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
					">CAMBIAR CLAVE</a>
				</div>
         	</div>
		</div>
		<?php } ?>
		</form>
	</div><!--pop-->
</div><!--wrapper-->