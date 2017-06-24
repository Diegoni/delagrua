
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



      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont620">
      <div class="uno"><a class="fa fa-file-text"></a>CONTACTANOS!</div>

      <div class="contactanos"><!--contactanos-->
      <div class="left">
      <p class="titulo">Tus dudas no nos dejan dormir en la noche, permitinos aclarartelas!</p>
      <p>Te vamos a responder lo más rápido que podamos!</p>
      </div>

     <form ACTION="contactos.php" METHOD="POST" id="formcontacto" name="formcontacto">
      <div class="right">
	 <?php if($mensaje != '') { ?>
     <li><?php echo $mensaje; ?></li>
     <?php } else { ?>
          <li><input name="nombre" type="text" id="nombre" placeholder="Nombre" title="Nombre" maxlength="250"></li>
          <li><input name="mail_telefono" type="text" id="mailotelefono" placeholder="Mail o Teléfono" title="Mail o Teléfono" maxlength="250"></li>
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