<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Search extends MY_Controller 
{
    protected $_subject = 'search'; 
    protected $_model   = 'm_usuario';
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  	
        $this->load->model('m_banner');		
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function index()
    {
    	/*
$maxRows_registros = 10;
$pageNum_registros = 0;
if (isset($_GET['p'])) {
  $pageNum_registros = $_GET['p'];
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
  $query_registros .= sprintf(" AND locality LIKE %s ", GetSQLValueString($_GET['localidad'], "text"));
}

if(isset($_GET['servicio'])){
  $query_registros .= sprintf(" AND servicio LIKE %s ", GetSQLValueString($_GET['servicio'], "text"));
}

// Order and sorting
$query_registros .= "GROUP BY idtaller ORDER BY sum(relevance) DESC";


// List subfiltering
$servicios = "SELECT count(*) AS count , servicio  FROM ($query_registros) results GROUP BY servicio ORDER BY count DESC" ;
$marcas = "SELECT count(*) AS count , marca  FROM ($query_registros) results GROUP BY marca ORDER BY count DESC" ;
$localidades = "SELECT count(*) AS count , locality, administrative_area_level_1  FROM ($query_registros) results GROUP BY locality, administrative_area_level_1 ORDER BY count DESC" ;


  // echo json_encode($_GET);
  // echo $query_registros;
  // echo $marcas;
  //   die();


// $servicios_results = mysql_query($servicios, $config) or die(mysql_error());
// $servicios_qty = mysql_num_rows($servicios_results);
// // echo "$servicios_qty resultados <br>";
// while ($servicio = mysql_fetch_array($servicios_results, MYSQL_NUM)) {
//     // echo "$servicio[1] ($servicio[0]) <br>";
// }




// Default data for url helper
$urlData = array(
'q'=> $_GET['q'],
'marca'=> $_GET['marca'],
'localidad'=> $_GET['localidad'],
'servicio'=> $_GET['servicio'],
);


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
$query_registros12 = "";
$registros12 = mysql_query($query_registros12, $config) or die(mysql_error());
$row_registros12 = mysql_fetch_assoc($registros12);
$totalRows_registros12 = mysql_num_rows($registros12);

 mysql_select_db($database_config, $config);
$query_registros13 = 
$registros13 = mysql_query($query_registros13, $config) or die(mysql_error());
$row_registros13 = mysql_fetch_assoc($registros13);
$totalRows_registros13 = mysql_num_rows($registros13);

mysql_select_db($database_config, $config);
$query_registros14 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros14 = mysql_query($query_registros14, $config) or die(mysql_error());
$row_registros14 = mysql_fetch_assoc($registros14);
$totalRows_registros14 = mysql_num_rows($registros14);
*/

		$sql = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda arriba' AND publicar = 1 ORDER BY rand() LIMIT 1";
		$db['banners'] = $this->m_banner->getBanner($sql);
		$sql = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda medio' AND publicar = 1 ORDER BY rand() LIMIT 1";
		$db['banners2'] = $this->m_banner->getRegistros();
		$sql = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'busqueda abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
		$db['banners3'] = $this->m_banner->getRegistros();

		$db['totalRows_registros']	= FALSE;
		$db['query']	= FALSE;
				
		$db['searchLeft']	= $this->searchLeft();	
		$db['searchForm']	= $this->searchForm();	
		$db['searchCenter']	= $this->searchCenter();	
		
			
        $this->armarVista('search', $db);
    }
    
	
	
	function searchLeft()
	{
		$html = '';
		//if ($totalRows_registros)
		if (FALSE)	
		{
			$html .= '<h1>FILTRAR RESULTADOS</h1>';
			$html .= '<a href="#" class="button mobileFilterToggle">';
			$html .= 'Filtrar resultados';
			$html .= '<i class="fa fa-chevron-down"></i>';
			$html .= '</a>';
	
      		// filter queries
			$servicios_results = mysql_query($servicios, $config) or die(mysql_error());
			$servicios_qty = mysql_num_rows($servicios_results);

			$marcas_results = mysql_query($marcas, $config) or die(mysql_error());
			$marcas_qty = mysql_num_rows($marcas_results);

			$localidades_results = mysql_query($localidades, $config) or die(mysql_error());
			$localidades_qty = mysql_num_rows($localidades_results);


			$html .= '<div class="filtering">';

			if ($urlData['servicio'] || $urlData['localidad'] || $urlData['marca'])
			{
				$html .= '<div class="activefilters">';
				$html .= '<ul>';
				$html .= '<li class="reset">';
				$html .= '<a href="'.urlHelper($urlData, array('servicio' => null, 'localidad' => null, 'marca' => null)).'">Resetear todos los filtros</a>';
				$html .= '</li>';

				if ($urlData['servicio'])
				{
					$html .= '<li class="activeFilter">';
					$html .= $urlData['servicio'];
					$html .= '<a href="'.urlHelper($urlData, array('servicio' => null)).'">';
					$html .= '<i class="fa fa-times"></i>';
					$html .= '</a>';
					$html .= '</li>';
				}

				if ($urlData['localidad'])
				{
					$html .= '<li class="activeFilter">';
					$html .= $urlData['localidad'];
					$html .= '<a href="'.urlHelper($urlData, array('localidad' => null)).'">';
					$html .= '<i class="fa fa-times"></i>';
					$html .= '</a>';
					$html .= '</li>';
				}

				if ($urlData['marca'])
				{
					$html .= '<li class="activeFilter">';
					$html .= $urlData['marca'];
					$html .= '<a href="'.urlHelper($urlData, array('marca' => null)).'">';
					$html .= '<i class="fa fa-times"></i>';
					$html .= '</a>';
					$html .= '</li>';
				}

				$html .= '</ul>';
				$html .= '<hr>';
				$html .= '</div>';
			}

			$html .= '<div class="filterSelect">';

			if ($servicios_qty && !$urlData['servicio'])
			{
				$html .= '<h2>Servicios</h2>';
				$html .= '<div class="filterList servicios">';
				$html .= '<ul>';
				while ($servicio = mysql_fetch_array($servicios_results, MYSQL_NUM)) 
				{
					$html .= '<li>';
					$html .= '<a href="'.urlHelper($urlData, array('servicio' => $servicio[1])).'">'.$servicio[1].'</a> ('.$servicio[0].')';
					$html .= '</li>';
				}
				$html .= '</ul>';
				$html .= '</div>';
			}

		
			if ($marcas_qty && !$urlData['marca'])
			{
				$html .= '<h2>Marcas</h2>';
				$html .= '<div class="filterList marcas">';
				$html .= '<ul>';
				while ($marca = mysql_fetch_array($marcas_results, MYSQL_NUM)) 
				{
					$html .= '<li>';
					$html .= '<a href="'.urlHelper($urlData, array('marca' => $marca[1] )).'">'.$marca[1].'</a> ('.$marca[0].')';
					$html .= '</li>';
				}
				$html .= '</ul>';
				$html .= '</div>';
			}

	
			if ($localidades_qty && !$urlData['localidad'])
			{
				$html .= '<h2>Localidades</h2>';
				$html .= '<div class="filterList localidades">';
				$html .= '<ul>';
				while ($localidad = mysql_fetch_array($localidades_results, MYSQL_NUM)) 
				{
					$html .= '<li>';
					$html .= '<a href="'.urlHelper($urlData, array('localidad' => $localidad[1] )).'">'.$localidad[1].'</a> ('.$localidad[0].')';
					$html .= '</li>';
				} 
				$html .= '</ul>';
				$html .= '</div>';
			}

			$html .= '</div>';

			$html .= '</div>';
		}

		return $html;
	}


	function searchForm()
	{
		$html = '<form method="get" action="'.base_url().'index.php/search" id="formbuscar" name="formbuscar" >';

		$html .= '<input type="radio" name="v" value="auto" id="vAuto" checked><label for="vAuto"> Auto</label>';
		$html .= '<input type="radio" name="v" value="moto" id="vMoto" '.isset($_GET['v']) && $_GET['v'] == "moto" ? "checked" : '' .'><label for="vMoto"> Moto</label>';
		$html .= '<br>';

		//$html .= '<input id="search" name="q" type="text" placeholder="Buscá por nombre, tipo de taller o localidad" value="'.isset($query) && $query ? $query : "''" .'">';

		$html .= '<input id="search" name="q" type="text" placeholder="Buscá por nombre, tipo de taller o localidad">';
		
		$html .= '<button class="button secondary large" >Buscar</button>';
		$html .= '</form>';
		
		return $html;
	
	}


	function searchCenter($totalRows_registros = NULL)
	{
		if($totalRows_registros == NULL)
		{
			$totalRows_registros = 0;
		}
		
		
		$html = '<div class="results-'.$totalRows_registros.' centro">';

		if ($totalRows_registros > 0) 
		{ 
			do 
			{ 
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

				$html .= '<div class="box-centro">';
				$html .= '<h2>';
				$html .= '<a href="'.$url_relativa . "taller/" . url2seo($row_registros['nombre']) . "-" . $row_registros['idtaller'] .  "/".'">';
                $html .= $row_registros['nombre'];
				$html .= '<i class="fa fa-plus-square"></i>';
				$html .= '</a>';
				$html .= '</h2>';
        		$html .= '<p>';
           		$html .= '<i class="fa fa-map-marker"></i>';
            	$html .= '<span class="gris">';
                $html .= getAddress($row_registros);
            	$html .= '</span>';
				$html .= '</p>';

				$html .= '<h3>&nbsp;</h3>';
				$html .= '<div class="box-iconos2"><i class="fa fa-wrench"></i>';
				if ($totalRows_registros11 > 0) 
				{
        			do 
        			{
        				$html .= '<a class="b1">';
        				$html .= $row_registros11['servicio'];
        				$html .= '</a>';
        			}
        			while ($row_registros11 = mysql_fetch_assoc($registros11));
        			mysql_free_result($registros11);
				}
    			$html .= '</div>';

    			$html .= '<div class="box-iconos">';
    			$html .= '<i class="fa fa-star-half-empty"></i>';
    			$html .= '<p>ATENCION&nbsp';
    		
    			if($row_registro2['atencionvotos'] > 0){
    				$estrellas = round($row_registro2['atencionvalor']/$row_registro2['atencionvotos']);
    			} else {
    				$estrellas = 0;
    			}
				
    			switch ($estrellas) 
    			{
	    			case 0:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 1:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"i" .  $url_relativa . "mg/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 2:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 3:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 4:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 5:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
	    			break;
    			}
    		
    			$html .= '<span class="gris">&nbsp;&nbsp;'. $row_registro2['atencionvotos'].' VOTOS</span>';
    			$html .= '</p>';
    			$html .= '</div>';
    			
    			$html .= '<div class="box-iconos">';
    			$html .= '<i class="fa fa-star-half-empty"></i>';
    			$html .= '<p>PRECIO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    			
    			if($row_registro2['preciovotos'] > 0)
    			{
    				$estrellas = round($row_registro2['preciovalor']/$row_registro2['preciovotos']);
    			} else 
    			{
    				$estrellas = 0;
    			}
				
    			switch ($estrellas) 
    			{
	    			case 0:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 1:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 2:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 3:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 4:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 5:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
	    			break;
    			}
    		
    			$html .= '<span class="gris">&nbsp;&nbsp;'. $row_registro2['preciovotos'].' VOTOS</span>';
    			$html .= '</p>';
    			$html .= '</div>';
    			$html .= '<div class="box-iconos">';
    			$html .= '<i class="fa fa-star-half-empty"></i>';
    			$html .= '<p>SERVICIO&nbsp;&nbsp;&nbsp;&nbsp;';
    			
    			if($row_registro2['serviciovotos'] > 0)
    			{
    				$estrellas = round($row_registro2['serviciovalor']/$row_registro2['serviciovotos']);
    			} else 
    			{
    				$estrellas = 0;
    			}
				
    			switch ($estrellas) 
    			{
	    			case 0:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 1:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 2:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 3:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 4:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 5:
	    			$html .= "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\">";
	    			break;
    			}

    			$html .= '<span class="gris">&nbsp;&nbsp;'.$row_registro2['serviciovotos'].' VOTOS</span>';
    			$html .= '</p>';
    			$html .= '</div>';
				$html .= '</div>';

			} while ($row_registros = mysql_fetch_assoc($registros));
		} // Show if recordset not empty 
		
		if ($totalRows_registros > 0) 
		{ // Show if recordset not empty 

			if(!isset($_GET['ordenarpor'])) 
			{
				$ordenarpor = 'nombre';
			}else 
			{
				$ordenarpor = $_GET['ordenarpor'];
			}
			
			if(!isset($_GET['orden'])) 
			{
				$orden = 'ASC';
			} else 
			{
				$orden = $_GET['orden'];
			}
		
			include_once 'partials/searchPagination.php'; 
		} else 
		{
			$html .= '<h2>No hay resultados para «<?php echo $query ?>»</h2>';
		}
		 
		return $html;
	}
}
?>