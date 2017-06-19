<?php 
require_once('Connections/config.php');
require_once('class.inputfilter.php');
require_once('funciones.php');
require_once('partials/header.php');
require_once('models/M_usuario.php');

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) {
  $ifilter = new InputFilter();
  $_POST = $ifilter->process($_POST);		
  
  $colname_registro = $_POST['nick'];
  mysql_select_db($database_config, $config);
  $query_registro = sprintf("SELECT * FROM dlg_usuario WHERE nick = %s", GetSQLValueString($colname_registro, "text"), GetSQLValueString($colname_registro, "text"));
  $registro = mysql_query($query_registro, $config) or die(mysql_error());
  $row_registro = mysql_fetch_assoc($registro);
  $totalRows_registro = mysql_num_rows($registro);

  if($totalRows_registro == 0){ 
  
	if($_POST['fechanacimiento'] != ''){
		$fechanacimiento = formato_fecha_mysql($_POST['fechanacimiento']);
	} else {
		$fechanacimiento = '';
	}
    
    $sql_registro = array(
        'idgrupo' => $_POST['idgrupo'], 
        'nombreyapellido' => $_POST['nombreyapellido'], 
        'email' => $_POST['email'], 
        'fechanacimiento' => $fechanacimiento, 
        'pais' => $_POST['pais'], 
        'provincia' => $_POST['provincia'], 
        'localidad' => $_POST['localidad'], 
        'nick' => $_POST['nick'], 
        'fbid' => $_POST['fbid'], 
        'fblogin' => $_POST['fblogin'], 
        'activo' => $_POST['activo']
    );
    
    $m_usuario = new m_usuario();
    $id_usuario = $m_usuario->insert($sql_registro);
    
    if (!isset($_SESSION)) 
    {
	   session_start();
    }
		
		if (isset($_POST['email'])) {
			$loginUsername=$_POST['email'];
			$MM_redirectLoginSuccess = "fb_login_ok.php";
			$loginStrGroup = "";
			
			if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
			//declare two session variables and assign them
			$_SESSION['MM_Username'] = $loginUsername;
			$_SESSION['MM_UserGroup'] = $loginStrGroup;	      
		
			header("Location: " . $MM_redirectLoginSuccess );
		}

  } else { 
	  $error = "Tu cuenta no se pudo agregar porque ya existe una cuenta con ese nick."; 
  }
} else if(isset($_REQUEST["action"]) && ($_REQUEST["action"] != '')){ 
	$action = $_REQUEST["action"];
	if($action == "fblogin"){
		require_once('facebook.php');
		$appid 		= "1444163319141827";
		$appsecret  = "118434fc8fb75b36ba83704e06973445";
		$facebook   = new Facebook(array(
			'appId' => $appid,
			'secret' => $appsecret,
			'cookie' => TRUE,
		));
		$fbuser = $facebook->getUser();
		if ($fbuser) {
			try {
				$user_profile = $facebook->api('/me');
			}
			catch (Exception $e) {
				echo $e->getMessage();
				exit();
			}
			$user_fbid	= $fbuser;
			$user_email = $user_profile["email"];
			$user_first_name = $user_profile["first_name"];
			$user_last_name = $user_profile["last_name"];
			$user_birthday = $user_profile["user_birthday"];
			//$user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";			
		}
		$colname_registro = $user_fbid;
		mysql_select_db($database_config, $config);
		$query_registro = sprintf("SELECT email, activo FROM dlg_usuario WHERE fbid = %s", GetSQLValueString($colname_registro, "int"), GetSQLValueString($colname_registro, "text"));
		$registro = mysql_query($query_registro, $config) or die(mysql_error());
		$row_registro = mysql_fetch_assoc($registro);
		$totalRows_registro = mysql_num_rows($registro);
				
		if($totalRows_registro > 0) {					
			if ($row_registro['activo'] == '1') {
				$loginUsername=$row_registro['email'];
				$MM_redirectLoginSuccess = "fb_login_ok.php";
				$loginStrGroup = "";
				
				if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
				//declare two session variables and assign them
				$_SESSION['MM_Username'] = $loginUsername;
				$_SESSION['MM_UserGroup'] = $loginStrGroup;	      
				header("Location: " . $MM_redirectLoginSuccess );
				
			} else {
				$error_noactivo = "No se puede iniciar sesión.";
			}
		}
	}
}
?>

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


<?php if((isset($_REQUEST["action"]) && ($_REQUEST["action"] != '')) || ($error != '') || ($error_noactivo != '')){?>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper"><!--wrapper-->
<div class="cont-pop"><!--pop-->
     <div class="sup"><img src="img/iconos/auto-negro-up.png"></div>
     <div class="cen">
	 <?php if($error_noactivo != ''){?>
     <div class="box-pop">
          <h1><span class="amarillo">2.</span>PARA FINALIZAR EL REGISTRO...</h1> 
     </div>
     <div class="box-pop"><span style="color:#EF0D10"><?php echo $error_noactivo; ?></span></div>
     <?php } else { ?>
     <div class="box-pop">
          <h1><span class="amarillo">2.</span>PARA FINALIZAR EL REGISTRO...</h1>
        <h2>Por favor completá estos datos adicionales.</h2>
       </div>
       <form action="fb_login.php" method="post" id="formsesion" name="formsesion">   
       <div class="box-pop">
			<?php if($error != ''){?>
            <div class="login-pop"><span style="color:#F81014"><?php echo $error; ?></span></div>
            <?php } ?>	
          <div class="login-pop"><?php echo $user_fnmae . " " .$user_lnmae;?> 
            <input name="idgrupo" type="hidden" id="idgrupo" value="2">
            <input name="activo" type="hidden" id="activo" value="1">
            <input name="nombreyapellido" type="hidden" id="nombreyapellido" value="<?php if(isset($_POST['nombreyapellido'])){ echo $_POST['nombreyapellido']; } else { echo $user_first_name . " " .$user_last_name;}?>">
            <input name="email" type="hidden" id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } else { echo $user_email;}?>">
            <input name="fechanacimiento" type="hidden" id="fechanacimiento" value="<?php if(isset($_POST['fechanacimiento'])){ echo $_POST['fechanacimiento']; } else { echo $user_birthday;}?>">
            <input name="fbid" type="hidden" id="fbid" value="<?php if(isset($_POST['fbid'])){ echo $_POST['fbid']; } else { echo $user_fbid;}?>">
            <input name="fblogin" type="hidden" id="fblogin" value="1">
          </div>
<div class="login-pop"><input name="pais" type="text" class="input" id="pais" placeholder="País" title="País" value="<?php if(isset($_POST['pais'])){ echo $_POST['pais']; }?>" maxlength="20"></div>         
          <div class="login-pop"><input name="provincia" type="text" class="input" id="provincia" placeholder="Provincia" title="Provincia" value="<?php if(isset($_POST['provincia'])){ echo $_POST['provincia'];}?>" maxlength="20"></div>         
          <div class="login-pop"><input name="localidad" type="text" class="input" id="localidad" placeholder="Localidad" title="Localidad" value="<?php if(isset($_POST['localidad'])){ echo $_POST['localidad']; }?>" maxlength="20"></div>         
          <div class="login-pop"><input name="nick" type="text" class="input" id="nick" placeholder="Nick" title="Nick" value="<?php if(isset($_POST['nick'])){ echo $_POST['nick']; }?>" maxlength="20">
          <br>
          <input name="acepto" type="checkbox" id="acepto" value="1"> Leí y acepto los <a href="terminos_condiciones.php">Términos y condiciones</a>
          <input type="hidden" name="MM_insert" value="formguardar">
          </div>
          
          <div class="login-pop">
            <div class="boton-b"><a href="#" onClick="

MM_validateForm('pais','','R','provincia','','R','localidad','','R','nick','','R');
if( document.MM_returnValue){
    if (document.formsesion.acepto.checked == false)
    {
        alert('Debes aceptar los términos.');
        document.formsesion.acepto.focus(); 
        return false;
     } else {
        document.formsesion.submit();
     }
} else 
{
	return document.MM_returnValue;
}">CREAR CUENTA</a>            
            </div>
         </div>
       </div>
	   </form>
	   <?php } ?>
    </div>
</div><!--pop-->
</div><!--wrapper-->


<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>-->
<script src="js/main.js"></script>
<?php 
}

require_once('partials/footer.php');
?>

