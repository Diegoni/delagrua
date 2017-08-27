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
<body>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<div class="wrapper"><!--wrapper-->
<div class="cont-pop"><!--pop-->
         <div class="cen">
       <div class="box-pop">
          <h1>OLVIDE MI CONTRASEÑA</h1>
       </div>
       <?php if($mensaje != ''){ ?>
       <div class="box-pop">
          <h2><?php echo $mensaje;?></h2>
	   </div>
       <?php } else { ?>
       <form ACTION="<?php echo base_url().'index.php/login/login_olvide_contrasena/'; ?>" METHOD="POST" id="formsesion" name="formsesion">
       <div class="box-pop">
          <h2>Por favor, ingresa tu cuenta de e-mail para que te enviemos una nueva contraseña.</h2>

          <div class="login-pop"><input name="email" type="email" class="input" id="email" value="E-mail" maxlength="255" onClick="this.value='';" required style="color: #000"><br>
          </div>
          <div class="login-pop">
            <input type="hidden" name="MM_insert" value="formguardar">
            <button type="submit" class="btn btn-sm btn-default" >SOLICITAR CONTRASEÑA</button>
         </div>
       </div>
		</form>
        <?php }  ?>
    </div>
  </div><!--pop-->

</div><!--wrapper-->

</body>
</html>

<script>
	function validar_form()
	{
		var formsesion = document.getElementById("formsesion");
		MM_validateForm('email','','RisEmail');if( document.MM_returnValue){document.formsesion.submit();}
	}
	
</script>
