<?php 
require_once('Connections/config.php');
require_once('funciones.php');
require_once('partials/header.php');

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

  $logoutGoTo = "index.php";
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
$query_usuario_sesion = sprintf("SELECT nick FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_usuario_sesion, "text"));
$usuario_sesion = mysql_query($query_usuario_sesion, $config) or die(mysql_error());
$row_usuario_sesion = mysql_fetch_assoc($usuario_sesion);
$totalRows_usuario_sesion = mysql_num_rows($usuario_sesion);

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_registros = 10;
$pageNum_registros = 0;
if (isset($_GET['pageNum_registros'])) {
  $pageNum_registros = $_GET['pageNum_registros'];
}
$startRow_registros = $pageNum_registros * $maxRows_registros;

$colname_registros = "";
if (isset($_GET['tipovehiculo'])) {
  $colname_registros = $_GET['tipovehiculo'];
}
$colname2_registros = "";
if (isset($_GET['idmarca'])) {
  $colname2_registros = $_GET['idmarca'];
}
$colname3_registros = "";
if (isset($_GET['idprovincia'])) {
  $colname3_registros = $_GET['idprovincia'];
}
$colname4_registros = "";
if (isset($_GET['idlocalidad'])) {
  $colname4_registros = $_GET['idlocalidad'];
}
$colname5_registros = "";
if (isset($_GET['idservicio'])) {
  $colname5_registros = $_GET['idservicio'];
}
$colname6_registros = "ASC";
if (isset($_GET['orden'])) {
  $colname6_registros = $_GET['orden'];
}
$colname7_registros = "nombre";
if (isset($_GET['ordenarpor'])) {
  $colname7_registros = $_GET['ordenarpor'];
}
mysql_select_db($database_config, $config);
$query_registros = "SELECT dlg_taller.idtaller, dlg_taller.nombre, dlg_taller.tipovehiculo, dlg_taller.atencion, dlg_taller.precio, dlg_taller.servicio, dlg_taller.domicilio, dlg_localidad.localidad, dlg_provincia.provincia FROM dlg_taller LEFT JOIN dlg_marca ON dlg_taller.idmarca = dlg_marca.idmarca LEFT JOIN dlg_tallerservicio ON dlg_tallerservicio.idtaller = dlg_taller.idtaller LEFT JOIN dlg_localidad ON dlg_taller.idlocalidad = dlg_localidad.idlocalidad LEFT JOIN dlg_provincia ON dlg_taller.idprovincia = dlg_provincia.idprovincia WHERE activo = 1 ";
if($colname_registros != ""){
	$query_registros .= sprintf(" AND dlg_taller.tipovehiculo LIKE %s ", GetSQLValueString($colname_registros, "text"));
}
if($colname2_registros != ""){
	$query_registros .= sprintf(" AND dlg_taller.idmarca = %s ", GetSQLValueString($colname2_registros, "int"));
}
if($colname3_registros != ""){
	$query_registros .= sprintf(" AND dlg_taller.idprovincia = %s ", GetSQLValueString($colname3_registros, "int"));
}
if($colname4_registros != ""){
	$query_registros .= sprintf(" AND dlg_taller.idlocalidad = %s ", GetSQLValueString($colname4_registros, "int"));
}
if($colname5_registros != ""){
	$query_registros .= sprintf(" AND dlg_tallerservicio.idservicio = %s ", GetSQLValueString($colname5_registros, "int"));
}
$query_registros .= " GROUP BY idtaller ORDER BY dlg_taller." . $colname7_registros . " " . $colname6_registros;
$query_limit_registros = sprintf("%s LIMIT %d, %d", $query_registros, $startRow_registros, $maxRows_registros);
$registros = mysql_query($query_limit_registros, $config) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);
if (isset($_GET['totalRows_registros'])) {
  $totalRows_registros = $_GET['totalRows_registros'];
} else {
  $all_registros = mysql_query($query_registros);
  $totalRows_registros = mysql_num_rows($all_registros);
}
$totalPages_registros = ceil($totalRows_registros/$maxRows_registros)-1;

$queryString_registros = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_registros") == false &&
        stristr($param, "totalRows_registros") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_registros = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_registros = sprintf("&totalRows_registros=%d%s", $totalRows_registros, $queryString_registros);

mysql_select_db($database_config, $config);
$query_registros2 = "SELECT * FROM dlg_provincia ORDER BY provincia ASC";
$registros2 = mysql_query($query_registros2, $config) or die(mysql_error());
$row_registros2 = mysql_fetch_assoc($registros2);
$totalRows_registros2 = mysql_num_rows($registros2);

$colname_registros3 = "-1";
if (isset($_GET['idprovincia'])) {
  $colname_registros3 = $_GET['idprovincia'];
}
mysql_select_db($database_config, $config);
$query_registros3 = sprintf("SELECT * FROM dlg_localidad WHERE idprovincia = %s ORDER BY localidad ASC", GetSQLValueString($colname_registros3, "int"));
$registros3 = mysql_query($query_registros3, $config) or die(mysql_error());
$row_registros3 = mysql_fetch_assoc($registros3);
$totalRows_registros3 = mysql_num_rows($registros3);

mysql_select_db($database_config, $config);
$query_registros4 = "SELECT * FROM dlg_servicio ORDER BY servicio ASC";
$registros4 = mysql_query($query_registros4, $config) or die(mysql_error());
$row_registros4 = mysql_fetch_assoc($registros4);
$totalRows_registros4 = mysql_num_rows($registros4);

mysql_select_db($database_config, $config);
$query_registros5 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home izquierda' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros5 = mysql_query($query_registros5, $config) or die(mysql_error());
$row_registros5 = mysql_fetch_assoc($registros5);
$totalRows_registros5 = mysql_num_rows($registros5);

mysql_select_db($database_config, $config);
$query_registros6 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home centro' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros6 = mysql_query($query_registros6, $config) or die(mysql_error());
$row_registros6 = mysql_fetch_assoc($registros6);
$totalRows_registros6 = mysql_num_rows($registros6);

mysql_select_db($database_config, $config);
$query_registros7 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home derecha' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros7 = mysql_query($query_registros7, $config) or die(mysql_error());
$row_registros7 = mysql_fetch_assoc($registros7);
$totalRows_registros7 = mysql_num_rows($registros7);

mysql_select_db($database_config, $config);
$query_registros8 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros8 = mysql_query($query_registros8, $config) or die(mysql_error());
$row_registros8 = mysql_fetch_assoc($registros8);
$totalRows_registros8 = mysql_num_rows($registros8);

mysql_select_db($database_config, $config);
$query_registros9 = "SELECT * FROM dlg_marca ORDER BY marca ASC";
$registros9 = mysql_query($query_registros9, $config) or die(mysql_error());
$row_registros9 = mysql_fetch_assoc($registros9);
$totalRows_registros9 = mysql_num_rows($registros9);

$maxRows_registros10 = 5;
$pageNum_registros10 = 0;
if (isset($_GET['pageNum_registros10'])) {
  $pageNum_registros10 = $_GET['pageNum_registros10'];
}
$startRow_registros10 = $pageNum_registros10 * $maxRows_registros10;

mysql_select_db($database_config, $config);
$query_registros10 = "SELECT * FROM dlg_taller ORDER BY idtaller DESC";
$query_limit_registros10 = sprintf("%s LIMIT %d, %d", $query_registros10, $startRow_registros10, $maxRows_registros10);
$registros10 = mysql_query($query_limit_registros10, $config) or die(mysql_error());
$row_registros10 = mysql_fetch_assoc($registros10);

if (isset($_GET['totalRows_registros10'])) {
  $totalRows_registros10 = $_GET['totalRows_registros10'];
} else {
  $all_registros10 = mysql_query($query_registros10);
  $totalRows_registros10 = mysql_num_rows($all_registros10);
}
$totalPages_registros10 = ceil($totalRows_registros10/$maxRows_registros10)-1;

mysql_select_db($database_config, $config);
$query_registros12 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda arriba' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros12 = mysql_query($query_registros12, $config) or die(mysql_error());
$row_registros12 = mysql_fetch_assoc($registros12);
$totalRows_registros12 = mysql_num_rows($registros12);

mysql_select_db($database_config, $config);
$query_registros13 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda medio' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros13 = mysql_query($query_registros13, $config) or die(mysql_error());
$row_registros13 = mysql_fetch_assoc($registros13);
$totalRows_registros13 = mysql_num_rows($registros13);

mysql_select_db($database_config, $config);
$query_registros14 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros14 = mysql_query($query_registros14, $config) or die(mysql_error());
$row_registros14 = mysql_fetch_assoc($registros14);
$totalRows_registros14 = mysql_num_rows($registros14);

?>
<!-- fin fancyapps -->
<script>
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}

function actualizar(){
	f=document.formbuscar;
	f.method = 'get';
	f.action = 'resultado_busqueda.php#buscar';
	f.submit();
}

function actualizar2(){
	f=document.formbuscar2;
	f.method = 'get';
	f.action = 'resultado_busqueda.php#buscar2';
	f.submit();
}

function buscar(){
	f=document.formbuscar;
	if(f.idprovincia.value == ''){
		alert("Debe seleccionar una provincia.");
		f.idprovincia.focus;
		return(0);
	} else {
		f.method = 'get';
		f.action = 'resultado_busqueda.php';
		f.submit();
	}
}

function buscar2(){
	f=document.formbuscar2;
	if(f.idprovincia.value == ''){
		alert("Debe seleccionar una provincia.");
		f.idprovincia.focus;
		return(0);
	} else {
		f.method = 'get';
		f.action = 'resultado_busqueda.php';
		f.submit();
	}
}
</script>

<div class="cont960">
<div class="resultados-busquedas"><!--rb-->

<div class="uno"><a class="fa fa-search"></a> LOS TALLERES QUE HEMOS ENCONTRADO</div>

<div class="izquierda screen"><!--izq-->
     <h1>ORDENAR POR:</h1>
     <div class="navega-izq">
          <ul>
          <li><a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&ordenarpor=atencion&orden=DESC">Mejor Atención</a></li>
          <li><a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&ordenarpor=precio&orden=DESC">Mejor Precio</a></li>
          <li><a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&ordenarpor=servicio&orden=DESC">Mejor Servicio</a></li>
          <li>Por nombre:<a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&orden=ASC&ordenarpor=nombre"> A-Z</a> | <a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&orden=DESC&ordenarpor=nombre">Z-A</a></li>
          </ul>
     </div><a name="buscar2"></a>
     <div class="cuadro-busq">
            <form action="resultado_busqueda.php" id="formbuscar2" name="formbuscar2" method="get">
            <h1>NADA INTERESANTE?<br>BUSCA DE NUEVO!</h1>
            <li>
              <select name="tipovehiculo" id="tipovehiculo" onChange="MM_callJS('actualizar2();')">
                <option value="" <?php if (!(strcmp("", $_GET['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>Vehículo</option>
                <option value="auto" <?php if (!(strcmp("auto", $_GET['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>Auto</option>
<option value="moto" <?php if (!(strcmp("moto", $_GET['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>Moto</option>
              </select>
            </li>
            <li>
              <select name="idmarca" id="idmarca" onChange="MM_callJS('actualizar2();')">
                <option value="" <?php if (!(strcmp("", $_GET['idmarca']))) {echo "selected=\"selected\"";} ?>>Marca</option>
              <?php
do {
?>
                <option value="<?php echo $row_registros9['idmarca']?>"<?php if (!(strcmp($row_registros9['idmarca'], $_GET['idmarca']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros9['marca']?></option>
                <?php
} while ($row_registros9 = mysql_fetch_assoc($registros9));
  $rows = mysql_num_rows($registros9);
  if($rows > 0) {
      mysql_data_seek($registros9, 0);
	  $row_registros9 = mysql_fetch_assoc($registros9);
  }
?>
              </select>
            </li>
            <li>
              <select name="idprovincia" id="idprovincia" onChange="MM_callJS('actualizar2();')">
                <option value="" <?php if (!(strcmp("", $_GET['idprovincia']))) {echo "selected=\"selected\"";} ?>>Provincia</option>
                <?php
do {
?>
<option value="<?php echo $row_registros2['idprovincia']?>"<?php if (!(strcmp($row_registros2['idprovincia'], $_GET['idprovincia']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros2['provincia']?></option>
<?php
} while ($row_registros2 = mysql_fetch_assoc($registros2));
  $rows = mysql_num_rows($registros2);
  if($rows > 0) {
      mysql_data_seek($registros2, 0);
	  $row_registros2 = mysql_fetch_assoc($registros2);
  }
?>
              </select>
            </li>
            <li>
              <select name="idlocalidad" id="idlocalidad" onChange="MM_callJS('actualizar2();')">
                <option value="">Localidad</option>
				<?php if($totalRows_registros3 > 0) {?>
				<?php
                do {
                ?>
                <option value="<?php echo $row_registros3['idlocalidad']?>"<?php if(isset($_GET['idlocalidad'])){  if (!(strcmp($row_registros3['idlocalidad'], $_GET['idlocalidad']))) {echo "selected=\"selected\"";} } else { if (!(strcmp($row_registros3['idlocalidad'], $row_registro['idlocalidad']))) {echo "selected=\"selected\"";} } ?>><?php echo $row_registros3['localidad']?></option>
                <?php
                } while ($row_registros3 = mysql_fetch_assoc($registros3));
                $rows = mysql_num_rows($registros3);
                if($rows > 0) {
                mysql_data_seek($registros3, 0);
                $row_registros3 = mysql_fetch_assoc($registros3);
                }
				}
                ?>
              </select>
            </li>
            <li><select name="idservicio" id="idservicio" onChange="MM_callJS('actualizar2();')">
            <?php if(isset($_GET['tipovehiculo']) && ($_GET['tipovehiculo'] == 'moto')) {?>
            <option value="">Todos</option>
            <?php  } else { ?>
            <option value="" <?php if (!(strcmp("", $_GET['idservicio']))) {echo "selected=\"selected\"";} ?>>Servicio</option>
              <?php
do {
?>
<option value="<?php echo $row_registros4['idservicio']?>"<?php if (!(strcmp($row_registros4['idservicio'], $_GET['idservicio']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros4['servicio']?></option>
<?php
} while ($row_registros4 = mysql_fetch_assoc($registros4));
  $rows = mysql_num_rows($registros4);
  if($rows > 0) {
      mysql_data_seek($registros4, 0);
	  $row_registros4 = mysql_fetch_assoc($registros4);
  }
?>
			<?php  } ?>
            </select></li>
            <input name="ordenarpor" type="hidden" id="ordenarpor" value="<?php if(isset($_GET['ordenarpor'])) { echo $_GET['ordenarpor'];} else { echo "nombre"; }?>">
            <input name="orden" type="hidden" id="orden" value="<?php if(isset($_GET['orden'])) { echo $_GET['orden'];} else { echo "ASC"; }?>">
            <li class="boton-b"><a href="#" onClick="MM_callJS('buscar2();')">BUSCAR</a></li>
            </form>
            </div>
</div><!--izq-->

<div class="centro"><!--cento-->
     <h1>TALLERES ENCONTRADOS:</h1>
<?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
<?php do { ?>
<?php
$colname_registros11 = $row_registros['idtaller'];
mysql_select_db($database_config, $config);
$query_registros11 = sprintf("SELECT dlg_servicio.servicio FROM dlg_tallerservicio LEFT JOIN dlg_servicio ON dlg_tallerservicio.idservicio = dlg_servicio.idservicio WHERE dlg_tallerservicio.idtaller = %s ORDER BY dlg_servicio.servicio ASC", GetSQLValueString($colname_registros11, "int"));
$registros11 = mysql_query($query_registros11, $config) or die(mysql_error());
$row_registros11 = mysql_fetch_assoc($registros11);
$totalRows_registros11 = mysql_num_rows($registros11);

$colname_registro2 = $row_registros['idtaller'];
mysql_select_db($database_config, $config);
$query_registro2 = sprintf("SELECT COUNT(atencion) AS atencionvotos, SUM(atencion) AS atencionvalor, COUNT(precio) AS preciovotos, SUM(precio) AS preciovalor, COUNT(servicio) AS serviciovotos, SUM(servicio) AS serviciovalor FROM dlg_calificacion WHERE publicar = '1' AND idtaller = %s", GetSQLValueString($colname_registro2, "int"));
$registro2 = mysql_query($query_registro2, $config) or die(mysql_error());
$row_registro2 = mysql_fetch_assoc($registro2);
$totalRows_registro2 = mysql_num_rows($registro2);
?>
<div class="box-centro"><!--box resultado-->
          <h2><?php echo $row_registros['nombre']; ?> <a href="taller_info.php?id=<?php echo $row_registros['idtaller']; ?>" class="fa fa-plus-square"></a></h2>
          <h3>&nbsp;</h3>
          <div class="box-iconos"><i class="fa fa-wrench"></i> <?php if ($totalRows_registros11 > 0) { // Show if recordset not empty ?><?php do { ?><a class="b1"><?php echo $row_registros11['servicio']; ?></a><?php } while ($row_registros11 = mysql_fetch_assoc($registros11)); ?><?php mysql_free_result($registros11);?><?php } // Show if recordset not empty ?></div>
          <div class="box-iconos"><i class="fa fa-dot-circle-o"></i> <p><span class="gris"><?php echo $row_registros['domicilio']; ?> <?php echo $row_registros['localidad']; ?> <?php echo $row_registros['provincia']; ?></span></p></div>
          <div class="box-iconos"><i class="fa fa-star-half-empty"></i> <p>ATENCION&nbsp;
          <?php
				if($row_registro2['atencionvotos'] > 0){
					$estrellas = round($row_registro2['atencionvalor']/$row_registro2['atencionvotos']);
				} else {
					$estrellas = 0;
				}
                switch ($estrellas) {
                    case 0:
                        echo "<img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 1:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 2:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 3:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 4:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 5:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/>";
                        break;
                }
                ?>
<span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['atencionvotos']; ?> VOTOS</span></p></div>
          <div class="box-iconos"><i class="fa fa-star-half-empty"></i>
            <p>PRECIO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
				if($row_registro2['preciovotos'] > 0){
					$estrellas = round($row_registro2['preciovalor']/$row_registro2['preciovotos']);
				} else {
					$estrellas = 0;
				}
                switch ($estrellas) {
                    case 0:
                        echo "<img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 1:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 2:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 3:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 4:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 5:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/>";
                        break;
                }
                ?>
<span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['preciovotos']; ?> VOTOS</span></p>
          </div>
          <div class="box-iconos"><i class="fa fa-star-half-empty"></i>
            <p>SERVICIO&nbsp;&nbsp;&nbsp;&nbsp;<?php
				if($row_registro2['serviciovotos'] > 0){
					$estrellas = round($row_registro2['serviciovalor']/$row_registro2['serviciovotos']);
				} else {
					$estrellas = 0;
				}
                switch ($estrellas) {
                    case 0:
                        echo "<img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 1:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 2:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 3:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-gris.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 4:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-amarilla.png\"/><img src=\"img/iconos/estrellita-gris.png\"/>";
                        break;
                    case 5:
                        echo "<img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\"><img src=\"img/iconos/estrellita-amarilla.png\">";
                        break;
                }
                ?>
<span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['serviciovotos']; ?> VOTOS</span></p>
          </div>
</div><!--box resultado-->
<?php } while ($row_registros = mysql_fetch_assoc($registros)); ?>
<?php } // Show if recordset not empty ?>

<?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
<div class="paginacion"><!--pag-->
     <ul>
     <li class="ver">VER MAS RESULTADOS:</li>
     <li><a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, 0, $queryString_registros); ?>">‹‹</a></li>
     <li><a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, max(0, $pageNum_registros - 1), $queryString_registros); ?>">‹</a></li>
	<?php for($i=0;$i<=$totalPages_registros;$i++){?>
     <li><a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, $i, $queryString_registros); ?>"><?php echo $i+1?>,</a></li>
 	 <?php } ?>
     <li><a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, min($totalPages_registros, $pageNum_registros + 1), $queryString_registros); ?>">›</a></li>
     <li><a href="<?php printf("%s?pageNum_registros=%d%s", $currentPage, $totalPages_registros, $queryString_registros); ?>">››</a></li>
     </ul>
</div><!--pag-->
<?php } // Show if recordset not empty ?>

</div><!--centro-->

<div class="izquierda mobile"><!--izq-->
     <h1>ORDENAR POR:</h1>
     <div class="navega-izq">
          <ul>
          <li><a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&ordenarpor=atencion&orden=DESC">Mejor Atención</a></li>
          <li><a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&ordenarpor=precio&orden=DESC">Mejor Precio</a></li>
          <li><a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&ordenarpor=servicio&orden=DESC">Mejor Servicio</a></li>
          <li>Por nombre:<a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&orden=ASC&ordenarpor=nombre"> A-Z</a> | <a href="resultado_busqueda.php?tipovehiculo=<?php echo $_GET['tipovehiculo'];?>&idmarca=<?php echo $_GET['idmarca'];?>&idprovincia=<?php echo $_GET['idprovincia'];?>&idlocalidad=<?php echo $_GET['idlocalidad'];?>&idservicio=<?php echo $_GET['idservicio'];?>&orden=DESC&ordenarpor=nombre">Z-A</a></li>
          </ul>
     </div>
	<?php
    mysql_select_db($database_config, $config);
    $query_registros2 = "SELECT * FROM dlg_provincia ORDER BY provincia ASC";
    $registros2 = mysql_query($query_registros2, $config) or die(mysql_error());
    $row_registros2 = mysql_fetch_assoc($registros2);
    $totalRows_registros2 = mysql_num_rows($registros2);

    $colname_registros3 = "-1";
    if (isset($_GET['idprovincia'])) {
      $colname_registros3 = $_GET['idprovincia'];
    }
    mysql_select_db($database_config, $config);
    $query_registros3 = sprintf("SELECT * FROM dlg_localidad WHERE idprovincia = %s ORDER BY localidad ASC", GetSQLValueString($colname_registros3, "int"));
    $registros3 = mysql_query($query_registros3, $config) or die(mysql_error());
    $row_registros3 = mysql_fetch_assoc($registros3);
    $totalRows_registros3 = mysql_num_rows($registros3);
    ?>
     <a name="buscar"></a>
     <div class="cuadro-busq">
            <form action="resultado_busqueda.php" id="formbuscar" name="formbuscar" method="get">
            <h1>NADA INTERESANTE?<br>BUSCA DE NUEVO!</h1>
            <li>
              <select name="tipovehiculo" id="tipovehiculo" onChange="MM_callJS('actualizar();')">
                <option value="" <?php if (!(strcmp("", $_GET['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>Vehículo</option>
                <option value="auto" <?php if (!(strcmp("auto", $_GET['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>Auto</option>
<option value="moto" <?php if (!(strcmp("moto", $_GET['tipovehiculo']))) {echo "selected=\"selected\"";} ?>>Moto</option>
              </select>
            </li>
            <li>
              <select name="idmarca" id="idmarca" onChange="MM_callJS('actualizar();')">
                <option value="" <?php if (!(strcmp("", $_GET['idmarca']))) {echo "selected=\"selected\"";} ?>>Marca</option>
                <?php
do {
?>
                <option value="<?php echo $row_registros9['idmarca']?>"<?php if (!(strcmp($row_registros9['idmarca'], $_GET['idmarca']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros9['marca']?></option>
                <?php
} while ($row_registros9 = mysql_fetch_assoc($registros9));
  $rows = mysql_num_rows($registros9);
  if($rows > 0) {
      mysql_data_seek($registros9, 0);
	  $row_registros9 = mysql_fetch_assoc($registros9);
  }
?>
              </select>
            </li>
            <li>
              <select name="idprovincia" id="idprovincia" onChange="MM_callJS('actualizar();')">
                <option value="" <?php if (!(strcmp("", $_GET['idprovincia']))) {echo "selected=\"selected\"";} ?>>Provincia</option>
                <?php
do {
?>
<option value="<?php echo $row_registros2['idprovincia']?>"<?php if (!(strcmp($row_registros2['idprovincia'], $_GET['idprovincia']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros2['provincia']?></option>
<?php
} while ($row_registros2 = mysql_fetch_assoc($registros2));
  $rows = mysql_num_rows($registros2);
  if($rows > 0) {
      mysql_data_seek($registros2, 0);
	  $row_registros2 = mysql_fetch_assoc($registros2);
  }
?>
              </select>
            </li>
            <li>
              <select name="idlocalidad" id="idlocalidad" onChange="MM_callJS('actualizar();')">
                <option value="">Localidad</option>
				<?php if($totalRows_registros3 > 0) {?>
				<?php
                do {
                ?>
                <option value="<?php echo $row_registros3['idlocalidad']?>"<?php if(isset($_GET['idlocalidad'])){  if (!(strcmp($row_registros3['idlocalidad'], $_GET['idlocalidad']))) {echo "selected=\"selected\"";} } else { if (!(strcmp($row_registros3['idlocalidad'], $row_registro['idlocalidad']))) {echo "selected=\"selected\"";} } ?>><?php echo $row_registros3['localidad']?></option>
                <?php
                } while ($row_registros3 = mysql_fetch_assoc($registros3));
                $rows = mysql_num_rows($registros3);
                if($rows > 0) {
                mysql_data_seek($registros3, 0);
                $row_registros3 = mysql_fetch_assoc($registros3);
                }
				}
                ?>
              </select>
            </li>
            <li><select name="idservicio" id="idservicio" onChange="MM_callJS('actualizar();')">
            <?php if(isset($_GET['tipovehiculo']) && ($_GET['tipovehiculo'] == 'moto')) {?>
            <option value="">Todos</option>
            <?php  } else { ?>
            <option value="" <?php if (!(strcmp("", $_GET['idservicio']))) {echo "selected=\"selected\"";} ?>>Servicio</option>
              <?php
do {
?>
<option value="<?php echo $row_registros4['idservicio']?>"<?php if (!(strcmp($row_registros4['idservicio'], $_GET['idservicio']))) {echo "selected=\"selected\"";} ?>><?php echo $row_registros4['servicio']?></option>
<?php
} while ($row_registros4 = mysql_fetch_assoc($registros4));
  $rows = mysql_num_rows($registros4);
  if($rows > 0) {
      mysql_data_seek($registros4, 0);
	  $row_registros4 = mysql_fetch_assoc($registros4);
  }
?>
            <?php } ?>
            </select></li>
            <input name="ordenarpor" type="hidden" id="ordenarpor" value="<?php if(isset($_GET['ordenarpor'])) { echo $_GET['ordenarpor'];} else { echo "nombre"; }?>">
            <input name="orden" type="hidden" id="orden" value="<?php if(isset($_GET['orden'])) { echo $_GET['orden'];} else { echo "ASC"; }?>">
            <li class="boton-b"><a href="#" onClick="MM_callJS('buscar();')">BUSCAR</a></li>
            </form>
            </div>
</div><!--izq-->

<div class="derecha"><!--derecha-->
<div class="box2">
  <?php if ($totalRows_registros12 > 0) { // Show if recordset not empty ?>
    <a href="http://<?php echo $row_registros12['enlace']; ?>"><img src="img/banner/<?php echo $row_registros12['imagen']; ?>" width="280" height="210" alt=""/></a>
  <?php } // Show if recordset not empty ?>
</div>
<div class="box2">
  <?php if ($totalRows_registros13 > 0) { // Show if recordset not empty ?>
    <a href="http://<?php echo $row_registros13['enlace']; ?>"><img src="img/banner/<?php echo $row_registros13['imagen']; ?>" width="280" height="210" alt=""/></a>
  <?php } // Show if recordset not empty ?>
</div>
<div class="box2">
  <?php if ($totalRows_registros14 > 0) { // Show if recordset not empty ?>
    <a href="http://<?php echo $row_registros14['enlace']; ?>"><img src="img/banner/<?php echo $row_registros14['imagen']; ?>" width="280" height="210" alt=""/></a>
  <?php } // Show if recordset not empty ?>
</div>

<div class="uno"><a class="fa fa-arrow-up"></a> RECIEN AGREGADOS:</div>
<?php if ($totalRows_registros10 > 0) { // Show if recordset not empty ?>
  <?php do { ?>
 	<?php
    $colname_registros11 = $row_registros10['idtaller'];
    mysql_select_db($database_config, $config);
    $query_registros11 = sprintf("SELECT dlg_servicio.servicio FROM dlg_tallerservicio LEFT JOIN dlg_servicio ON dlg_tallerservicio.idservicio = dlg_servicio.idservicio WHERE dlg_tallerservicio.idtaller = %s ORDER BY dlg_servicio.servicio ASC", GetSQLValueString($colname_registros11, "int"));
    $registros11 = mysql_query($query_registros11, $config) or die(mysql_error());
    $row_registros11 = mysql_fetch_assoc($registros11);
    $totalRows_registros11 = mysql_num_rows($registros11);
    ?>
   <div class="recientes">
      <!--recientes-->
      <h2><?php echo $row_registros10['nombre']; ?> <a href="taller_info.php?id=<?php echo $row_registros10['idtaller']; ?>" class="fa fa-plus-square"></a></h2>
      <h3 class="gris"><?php if ($totalRows_registros11 > 0) { // Show if recordset not empty ?><?php do { ?> <?php echo $row_registros11['servicio']; ?>&nbsp;&nbsp;<?php } while ($row_registros11 = mysql_fetch_assoc($registros11)); ?><?php mysql_free_result($registros11);?><?php } // Show if recordset not empty ?></h3>
    </div>
    <!--recientes-->
    <?php } while ($row_registros10 = mysql_fetch_assoc($registros10)); ?>
  <?php } // Show if recordset not empty ?>
<hr>


</div><!--derecha-->

</div><!--rb-->

<?php
include_once 'partials/footer.php'; 

mysql_free_result($usuario_sesion);
mysql_free_result($registros);
mysql_free_result($registros2);
mysql_free_result($registros3);
mysql_free_result($registros4);
mysql_free_result($registros5);
mysql_free_result($registros6);
mysql_free_result($registros7);
mysql_free_result($registros8);
mysql_free_result($registros9);
mysql_free_result($registros10);
mysql_free_result($registros12);
mysql_free_result($registros13);
mysql_free_result($registros14);
mysql_close($config);
?>
