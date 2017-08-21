
<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
  $( "#fechanacimiento").datepicker(
		$.extend(
		$.datepicker.regional['es'],
		{
		firstDay:1,
		changeMonth:true,
		changeYear:true,
		yearRange:"1900:2040"
		}
		)
		);  
});

</script>
<!-- fin datepicker -->
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

     <div class="cen">
       <div class="box-pop">
          <h1><span class="amarillo">1.</span> CREÁ TU CUENTA DE USUARIO</h1>
       </div>
       <form action="<?php echo base_url().'index.php/login/crear_cuenta/'?>" method="post" id="formsesion" name="formsesion">   
       <div class="box-pop">
			<?php if($error != ''){?>
            <div class="login-pop"><p><span style="color:#EF0D10"><?php echo $error; ?></span></p></div>
            <?php } ?>	
          <div class="login-pop"><input name="nombreyapellido" type="text" class="input" id="nombreyapellido" placeholder="Nombre y apellido" title="Nombre y apellido" value="<?php if(isset($_POST['nombreyapellido'])){ echo $_POST['nombreyapellido'];}?>" maxlength="250">
            <input name="idgrupo" type="hidden" id="idgrupo" value="2">
            <input name="activo" type="hidden" id="activo" value="1">
          </div>
          <div class="login-pop"><input name="telefonocodarea" type="text" class="input" id="telefonocodarea" placeholder="Código de área del teléfono" title="Código de área del teléfono" value="<?php if(isset($_POST['telefonocodarea'])){ echo $_POST['telefonocodarea']; }?>" maxlength="55"></div>
          <div class="login-pop"><input name="telefono" type="text" class="input" id="telefono" placeholder="Teléfono" title="Teléfono" value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; }?>" maxlength="50"></div>
          <div class="login-pop"><input name="email" type="text" class="input" id="email" placeholder="E-mail" title="E-mail" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; }?>" maxlength="250"></div>         
          <div class="login-pop"><input name="clave" type="password" class="input" id="clave" placeholder="Contraseña" title="Contraseña" value="<?php if(isset($_POST['clave'])){ echo ''; }?>" maxlength="50"></div>
          <div class="login-pop"><input name="confirmarclave" type="password" class="input" id="confirmarclave" placeholder="Confirmar Contraseña" title="Confirmar Contraseña" value="<?php if(isset($_POST['confirmarclave'])){ echo ''; }?>" maxlength="50"></div>
          <div class="login-pop"><input type="text" class="input" id="fechanacimiento" name="fechanacimiento" placeholder="Fecha de Nacimiento" title="Fecha de Nacimiento" value="<?php if(isset($_POST['fechanacimiento'])){ echo $_POST['fechanacimiento']; }?>">
         </div>
          <div class="login-pop"><input name="pais" type="text" class="input" id="pais" placeholder="País" title="País" value="<?php if(isset($_POST['pais'])){ echo $_POST['pais']; }?>" maxlength="20"></div>         
          <div class="login-pop"><input name="provincia" type="text" class="input" id="provincia" placeholder="Provincia" title="Provincia" value="<?php if(isset($_POST['provincia'])){ echo $_POST['provincia'];}?>" maxlength="20"></div>         
          <div class="login-pop"><input name="localidad" type="text" class="input" id="localidad" placeholder="Localidad" title="Localidad" value="<?php if(isset($_POST['localidad'])){ echo $_POST['localidad']; }?>" maxlength="20"></div>         
          <div class="login-pop"><input name="nick" type="text" class="input" id="nick" placeholder="Nick" title="Nick" value="<?php if(isset($_POST['nick'])){ echo $_POST['nick']; }?>" maxlength="20">
          <br>
          <input name="acepto" type="checkbox" id="acepto" value="1"> Leí y acepto los <a href="terminos_condiciones/">Términos y condiciones</a>
          <input type="hidden" name="MM_insert" value="formguardar">
          </div>
          
          <div class="login-pop">
            <div class="boton-b"><a href="#" onClick="
            MM_validateForm('nombreyapellido','','R','email','','RisEmail','clave','','R','confirmarclave','','R','fechanacimiento','','R','pais','','R','provincia','','R','nick','','R');
if( document.MM_returnValue){
	if(calcular_edad(document.formsesion.fechanacimiento.value) < 18) {
    	alert('Debes ser mayor de edad.');
        document.formsesion.fechanacimiento.focus(); 
        return false;
    } else {
        if (document.formsesion.acepto.checked == false)
        {
            alert('Debes aceptar los términos.');
            document.formsesion.acepto.focus(); 
            return false;
         } else {
            if(document.formsesion.clave.value != document.formsesion.confirmarclave.value) {
                alert('La contraseña y la confirmación no coinciden.');
                document.formsesion.clave.focus(); 
                return false;
            } else {
            	document.formsesion.submit();
            }
         }
	}
} else 
	{
	return document.MM_returnValue;
    }
">CREAR CUENTA</a></div>
         </div>
       </div>
		</form>
    </div>
</div><!--pop-->
</div><!--wrapper-->


<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>-->
<script src="js/main.js"></script>
    </body>
</html>
