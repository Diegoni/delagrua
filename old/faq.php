<?php 
require_once('Connections/config.php');
require_once('funciones.php'); 
include_once 'partials/header.php';

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

      <div class="cuadro-uno"><!--c1-->
      <div class="cont960">

           <div class="box-preguntas"><!--box1-->
             <img src="<?php echo $url_relativa;?>img/autos/a1.png">
<p><span class="titulo">QUIENES SOMOS</span><br>
  <br>
  De La Gr&uacute;a es una guía gratuita, colectiva  e inteligente de talleres de automóviles y motos. En De La Grúa encontrarás  toda la información relacionada con el mundo motor que te ayudará a seleccionar  e informarte a través de calificaciones de los usuarios acerca del mejor  proveedor para tu auto o moto, ya sea por precio, ubicación geográfica o calidad  del servicio. </p>
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
<?php
include_once 'partials/footer.php'; 
mysql_free_result($registros);
mysql_close($config);
?>
