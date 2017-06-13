<?php require_once('../Connections/config.php'); ?>
<?php require_once('session.php'); ?>
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
$query_usuario_sesion = sprintf("SELECT nick FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_usuario_sesion, "text"));
$usuario_sesion = mysql_query($query_usuario_sesion, $config) or die(mysql_error());
$row_usuario_sesion = mysql_fetch_assoc($usuario_sesion);
$totalRows_usuario_sesion = mysql_num_rows($usuario_sesion);

$currentPage = $url_relativa . "search/";

$maxRows_registros = 10;
$pageNum_registros = 0;
if (isset($_GET['pageNum_registros'])) {
  $pageNum_registros = $_GET['pageNum_registros'];
}
$startRow_registros = $pageNum_registros * $maxRows_registros;











mysql_select_db($database_config, $config);

// Search query
$query =  $_GET['q'];
$tipovehiculo =  $_GET['v'];

include_once 'search-query.php';

// Subfiltering
if(isset($_GET['marca'])){
  $query_registros .= sprintf(" AND marca LIKE %s ", GetSQLValueString($_GET['marca'], "text"));
}

if(isset($_GET['localidad'])){
  $query_registros .= sprintf(" AND localidad LIKE %s ", GetSQLValueString($_GET['localidad'], "text"));
}

if(isset($_GET['servicio'])){
  $query_registros .= sprintf(" AND servicio LIKE %s ", GetSQLValueString($_GET['servicio'], "text"));
}

// Order and sorting
$query_registros .= "GROUP BY idtaller ORDER BY sum(relevance) DESC";


// List subfiltering
$servicios = "SELECT count(*) AS count , servicio  FROM ($query_registros) results GROUP BY servicio ORDER BY count DESC" ;
$marcas = "SELECT count(*) AS count , marca  FROM ($query_registros) results GROUP BY marca ORDER BY count DESC" ;
$localidades = "SELECT count(*) AS count , localidad, provincia  FROM ($query_registros) results GROUP BY localidad, provincia ORDER BY count DESC" ;


  // echo json_encode($_GET);
  // echo $query_registros;
  // echo $marcas;
  //   die();


$servicios_results = mysql_query($servicios, $config) or die(mysql_error());
$servicios_qty = mysql_num_rows($servicios_results);
// echo "$servicios_qty resultados <br>";
while ($servicio = mysql_fetch_array($servicios_results, MYSQL_NUM)) {
    // echo "$servicio[1] ($servicio[0]) <br>";
}




// Default data for url helper
$urlData = [
  'marca'=> $_GET['marca'],
  'localidad'=> $_GET['localidad'],
  'servicio'=> $_GET['servicio'],
  ];


  // echo json_encode($urlData);

// die();







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

$colname_registros3 = $row_registros2['provincia'];
if (isset($_GET['provincia'])) {
  $colname_registros3 = $_GET['provincia'];
}
mysql_select_db($database_config, $config);
$query_registros3 = sprintf("SELECT dlg_localidad.localidad FROM dlg_localidad LEFT JOIN dlg_provincia ON dlg_localidad.idprovincia = dlg_provincia.idprovincia WHERE dlg_provincia.provincia LIKE %s ORDER BY localidad ASC", GetSQLValueString($colname_registros3, "text"));
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




<?php
$titulo = "$query | DE LA GRUA | Guía colectiva de talleres para autos y motos";
include_once 'partials/header.php'; ?>


<div class="cont960">
  <div class="resultados-busquedas">
    <!--rb-->
    <div class="uno"><a class="fa fa-search"></a> LOS TALLERES QUE HEMOS ENCONTRADO</div>

    <div class="izquierda screen">
      <!--izq-->
      <h1>FILTRAR RESULTADOS</h1>

      <?php
      // filter queries
      $servicios_results = mysql_query($servicios, $config) or die(mysql_error());
      $servicios_qty = mysql_num_rows($servicios_results);

      $marcas_results = mysql_query($marcas, $config) or die(mysql_error());
      $marcas_qty = mysql_num_rows($marcas_results);

      $localidades_results = mysql_query($localidades, $config) or die(mysql_error());
      $localidades_qty = mysql_num_rows($localidades_results);

      ?>

      <div class="filtering">

        <?php if ($urlData['servicio'] || $urlData['localidad'] || $urlData['marca']): ?>

          <div class="activefilters">

            <ul>
              <li class="reset">
                <a href="<?php echo urlHelper([]) ?>">Resetear todos los filtros</a>
              </li>

              <?php if ($urlData['servicio']): ?>
                <li class="activeFilter">
                  <?php echo $urlData['servicio'] ?>
                  <a href="<?php echo urlHelper($urlData, ['servicio' => null]) ?>">
                    <i class="fa fa-times"></i>
                  </a>
                </li>
              <?php endif ?>

              <?php if ($urlData['localidad']): ?>
                <li class="activeFilter">
                  <?php echo $urlData['localidad'] ?>
                  <a href="<?php echo urlHelper($urlData, ['localidad' => null]) ?>">
                    <i class="fa fa-times"></i>
                  </a>
                </li>
              <?php endif ?>

              <?php if ($urlData['marca']): ?>
                <li class="activeFilter">
                  <?php echo $urlData['marca'] ?>
                  <a href="<?php echo urlHelper($urlData, ['marca' => null]) ?>">
                    <i class="fa fa-times"></i>
                  </a>
                </li>
              <?php endif ?>

            </ul>
            <hr>

          </div>
        <?php endif ?>


        <?php
        if ($servicios_qty && !$urlData['servicio']): ?>
          <h2>Servicios</h2>
          <div class="filterList servicios">
           <ul>
            <?php while ($servicio = mysql_fetch_array($servicios_results, MYSQL_NUM)) { ?>
            <li>
              <a href="<?php echo urlHelper($urlData, ['servicio' => $servicio[1] ]) ?>"><?php echo $servicio[1] ?></a> (<?php echo $servicio[0] ?>)
            </li>
            <?php } ?>
          </ul>
          </div>
        <?php endif ?>


        <?php
        if ($marcas_qty && !$urlData['marca']): ?>
          <h2>Marcas</h2>
          <div class="filterList marcas">
           <ul>
            <?php while ($marca = mysql_fetch_array($marcas_results, MYSQL_NUM)) { ?>
            <li>
              <a href="<?php echo urlHelper($urlData, ['marca' => $marca[1] ]) ?>"><?php echo $marca[1] ?></a> (<?php echo $marca[0] ?>)
            </li>
            <?php } ?>
          </ul>
          </div>
        <?php endif ?>

        <?php
        if ($localidades_qty && !$urlData['localidad']): ?>
          <h2>Localidades</h2>
          <div class="filterList localidades">
           <ul>
            <?php while ($localidad = mysql_fetch_array($localidades_results, MYSQL_NUM)) { ?>
            <li>
              <a href="<?php echo urlHelper($urlData, ['localidad' => $localidad[1] ]) ?>"><?php echo $localidad[1] ?></a> (<?php echo $localidad[0] ?>)
            </li>
            <?php } ?>
          </ul>
          </div>
        <?php endif ?>


    </div>

  </div>
  <!--izq-->
  <div class="centro">
    <!--cento-->
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
    <div class="box-centro">
      <!--box resultado-->
      <h2>
      <?php echo $row_registros['nombre']; ?>
        <a href="<?php echo $url_relativa . "taller/" . url2seo($row_registros['nombre']) . "-" . $row_registros['idtaller'] .  "/"; ?>">

          <i class="fa fa-plus-square"></i>
        </a>
      </h2>
      <h3>&nbsp;</h3>
      <div class="box-iconos2"><i class="fa fa-wrench"></i> <?php if ($totalRows_registros11 > 0) { // Show if recordset not empty ?><?php do { ?><a class="b1"><?php echo $row_registros11['servicio']; ?></a><?php } while ($row_registros11 = mysql_fetch_assoc($registros11)); ?><?php mysql_free_result($registros11);?><?php } // Show if recordset not empty ?></div>
      <div class="box-iconos">
        <i class="fa fa-dot-circle-o"></i>
        <p><span class="gris"><?php echo $row_registros['domicilio']; ?> <?php echo $row_registros['localidad']; ?> <?php echo $row_registros['provincia']; ?></span></p>
      </div>
      <div class="box-iconos">
        <i class="fa fa-star-half-empty"></i>
        <p>ATENCION&nbsp;
          <?php
          if($row_registro2['atencionvotos'] > 0){
            $estrellas = round($row_registro2['atencionvalor']/$row_registro2['atencionvotos']);
          } else {
            $estrellas = 0;
          }
          switch ($estrellas) {
            case 0:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 1:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"i" .  $url_relativa . "mg/iconos/estrellita-gris.png\"/>";
            break;
            case 2:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 3:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 4:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 5:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
            break;
          }
          ?>
          <span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['atencionvotos']; ?> VOTOS</span>
        </p>
      </div>
      <div class="box-iconos">
        <i class="fa fa-star-half-empty"></i>
        <p>PRECIO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
          if($row_registro2['preciovotos'] > 0){
            $estrellas = round($row_registro2['preciovalor']/$row_registro2['preciovotos']);
          } else {
            $estrellas = 0;
          }
          switch ($estrellas) {
            case 0:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 1:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 2:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 3:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 4:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 5:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
            break;
          }
          ?>
          <span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['preciovotos']; ?> VOTOS</span>
        </p>
      </div>
      <div class="box-iconos">
        <i class="fa fa-star-half-empty"></i>
        <p>SERVICIO&nbsp;&nbsp;&nbsp;&nbsp;<?php
          if($row_registro2['serviciovotos'] > 0){
            $estrellas = round($row_registro2['serviciovalor']/$row_registro2['serviciovotos']);
          } else {
            $estrellas = 0;
          }
          switch ($estrellas) {
            case 0:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 1:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 2:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 3:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 4:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
            break;
            case 5:
            echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\">";
            break;
          }
          ?>
          <span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['serviciovotos']; ?> VOTOS</span>
        </p>
      </div>
    </div>
    <!--box resultado-->
    <?php } while ($row_registros = mysql_fetch_assoc($registros)); ?>
    <?php } // Show if recordset not empty ?>
    <?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
    <?php
    if(!isset($_GET['ordenarpor'])) {
      $ordenarpor = 'nombre';
    } else {
      $ordenarpor = $_GET['ordenarpor'];
    }
    if(!isset($_GET['orden'])) {
      $orden = 'ASC';
    } else {
      $orden = $_GET['orden'];
    }
    ?>
    <div class="paginacion">
      <!--pag-->
      <ul>
        <li class="ver">VER MAS RESULTADOS:</li>
        <li><a href="<?php echo $currentPage . $_GET['tipovehiculo'] . "/" . $_GET['marca'] . "/" . $_GET['provincia'] . "/" . $_GET['localidad'] . "/" . $_GET['servicio'] . "/" . $ordenarpor . "/". $orden . "/0/"  . $totalRows_registros . "/" ; ?>">‹‹</a></li>
        <li><a href="<?php echo $currentPage . $_GET['tipovehiculo'] . "/" . $_GET['marca'] . "/" . $_GET['provincia'] . "/" . $_GET['localidad'] . "/" . $_GET['servicio'] . "/" . $ordenarpor . "/". $orden . "/" . max(0, $pageNum_registros - 1) . "/"  . $totalRows_registros . "/" ; ?>">‹</a></li>
        <?php for($i=0;$i<=$totalPages_registros;$i++){?>
        <li><a href="<?php echo $currentPage . $_GET['tipovehiculo'] . "/" . $_GET['marca'] . "/" . $_GET['provincia'] . "/" . $_GET['localidad'] . "/" . $_GET['servicio'] . "/" . $ordenarpor . "/". $orden . "/" . $i . "/"  . $totalRows_registros . "/" ; ?>"><?php echo $i+1?>,</a></li>
        <?php } ?>
        <li><a href="<?php echo $currentPage . $_GET['tipovehiculo'] . "/" . $_GET['marca'] . "/" . $_GET['provincia'] . "/" . $_GET['localidad'] . "/" . $_GET['servicio'] . "/" . $ordenarpor . "/". $orden . "/". min($totalPages_registros, $pageNum_registros + 1) . "/"  . $totalRows_registros . "/" ; ?>">›</a></li>
        <li><a href="<?php echo $currentPage . $_GET['tipovehiculo'] . "/" . $_GET['marca'] . "/" . $_GET['provincia'] . "/" . $_GET['localidad'] . "/" . $_GET['servicio'] . "/" . $ordenarpor . "/". $orden . "/".$totalPages_registros . "/"  . $totalRows_registros . "/" ; ?>">››</a></li>
      </ul>
    </div>
    <!--pag-->
    <?php } // Show if recordset not empty ?>
  </div>
  <!--centro-->
  <div class="izquierda mobile">
    <!--izq-->

</div>
<!--izq-->
<div class="derecha">
  <!--derecha-->
  <div class="box2">
    <?php if ($totalRows_registros12 > 0) { // Show if recordset not empty ?>
    <a href="http://<?php echo $row_registros12['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros12['imagen']; ?>" width="280" height="210" alt=""/></a>
    <?php } // Show if recordset not empty ?>
  </div>
  <div class="box2">
    <?php if ($totalRows_registros13 > 0) { // Show if recordset not empty ?>
    <a href="http://<?php echo $row_registros13['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros13['imagen']; ?>" width="280" height="210" alt=""/></a>
    <?php } // Show if recordset not empty ?>
  </div>
  <div class="box2">
    <?php if ($totalRows_registros14 > 0) { // Show if recordset not empty ?>
    <a href="http://<?php echo $row_registros14['enlace']; ?>"><img src="<?php echo $url_relativa;?>img/banner/<?php echo $row_registros14['imagen']; ?>" width="280" height="210" alt=""/></a>
    <?php } // Show if recordset not empty ?>
  </div>


  <hr>

</div>
<!--derecha-->
</div>
<!--rb-->


<?php include_once 'partials/footer.php'; ?>


<?php
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