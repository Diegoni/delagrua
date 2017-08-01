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
        $this->load->model('m_servicio');
        $this->load->model('m_marca');
        $this->load->model('m_localidad');
        $this->load->model('m_taller');
        
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
$query_registros8 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
$registros8 = mysql_query($query_registros8, $config) or die(mysql_error());
$row_registros8 = mysql_fetch_assoc($registros8);
$totalRows_registros8 = mysql_num_rows($registros8);

mysql_select_db($database_config, $config);
$query_registros9 = "SELECT * FROM dlg_marca ORDER BY marca ASC";
$registros9 = mysql_query($query_registros9, $config) or die(mysql_error());
$row_registros9 = mysql_fetch_assoc($registros9);
$totalRows_registros9 = mysql_num_rows($registros9);

*/

		$db['banners'] = $this->m_banner->getBanner('busqueda arriba');
		$db['banners2'] = $this->m_banner->getBanner('busqueda medio');
		$db['banners3'] = $this->m_banner->getBanner('busqueda abajo');

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
		if (TRUE)	
		{
			$html .= '<h1>FILTRAR RESULTADOS</h1>';
			$html .= '<a href="#" class="button mobileFilterToggle">';
			$html .= 'Filtrar resultados';
			$html .= '<i class="fa fa-chevron-down"></i>';
			$html .= '</a>';
            
            $query =  $_GET['q'];
            $tipovehiculo =  $_GET['v'];
            
            $servicios_results = $this->m_servicio->getServicio($query, $tipovehiculo);
            $servicios_qty = count($servicios_results);
            
            $marcas_results = $this->m_marca->getMarca($query, $tipovehiculo);
            $marcas_qty = count($marcas_results);
            
            $localidades_results = $this->m_localidad->getLocalidad($query, $tipovehiculo);
            $localidades_qty = count($localidades_results);
            
            $urlData = array(
            /*
                'q'         => $_GET['q'],
                'marca'     => $_GET['marca'],
                'localidad' => $_GET['localidad'],
                'servicio'  => $_GET['servicio'],
            */
                'q'         => '',
                'marca'     => '',
                'localidad' => '',
                'servicio'  => '',
            );

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
                if($servicios_results)
                {
                    foreach ($servicios_results as $_row) 
                    {
                        $html .= '<li>';
                        $html .= '<a href="'.base_url().'servicio='.$_row->servicio.'">'.$_row->servicio.'</a> ('.$_row->count.')';
                        $html .= '</li>'; 
                    }
                }
				
				$html .= '</ul>';
				$html .= '</div>';
			}

		
			if ($marcas_qty && !$urlData['marca'])
			{
				$html .= '<h2>Marcas</h2>';
				$html .= '<div class="filterList marcas">';
				$html .= '<ul>';
                if($marcas_results)
                {
                    foreach ($marcas_results as $_row) 
                    {
                        $html .= '<li>';
                        $html .= '<a href="'.base_url().'marca='.$_row->marca.'">'.$_row->marca.'</a> ('.$_row->count.')';
                        $html .= '</li>'; 
                    }
                }
				$html .= '</ul>';
				$html .= '</div>';
			}

	
			if ($localidades_qty && !$urlData['localidad'])
			{
				$html .= '<h2>Localidades</h2>';
				$html .= '<div class="filterList localidades">';
				$html .= '<ul>';
                if($localidades_results)
                {
                    foreach ($localidades_results as $_row) 
                    {
                        $html .= '<li>';
                        $html .= '<a href="'.base_url().'marca='.$_row->locality.'">'.$_row->locality.'</a> ('.$_row->count.')';
                        $html .= '</li>'; 
                    }
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
        
        $registros = $this->m_taller->getTaller('', 'all');
		
		$html = '<div class="results-'.$totalRows_registros.' centro">';

		if ($registros) 
		{ 
			foreach ($registros as $_row) 
			{
                $_servicios = $this->m_taller->getTaller($_row->idtaller, 'servicios');
                $_cantidades = $this->m_taller->getTaller($_row->idtaller, 'cantidades');

				$html .= '<div class="box-centro">';
				$html .= '<h2>';
				//$html .= '<a href="'.$url_relativa . "taller/" . url2seo($row_registros['nombre']) . "-" . $row_registros['idtaller'] .  "/".'">';
				$html .= '<a href="'.base_url(). "taller/" . $_row->nombre. "-" . $_row->idtaller .  "/".'">';
                $html .= $_row->nombre;
				$html .= '<i class="fa fa-plus-square"></i>';
				$html .= '</a>';
				$html .= '</h2>';
        		$html .= '<p>';
           		$html .= '<i class="fa fa-map-marker"></i>';
            	$html .= '<span class="gris">';
                //$html .= getAddress($row_registros);
            	$html .= '</span>';
				$html .= '</p>';

				$html .= '<h3>&nbsp;</h3>';
				$html .= '<div class="box-iconos2"><i class="fa fa-wrench"></i>';
				if ($_servicios ) 
				{
        			foreach ($_servicios as $_ser) 
        			{
        			    $html .= '<a class="b1">';
                        $html .= $_ser->servicio;
                        $html .= '</a>';
					}
				}
    			$html .= '</div>';

    			$html .= '<div class="box-iconos">';
    			$html .= '<i class="fa fa-star-half-empty"></i>';
    			$html .= '<p>ATENCION&nbsp';
                
                $estrellas = 0; 
                
    		    if($_cantidades)
                {
                    foreach ($_cantidades as $_can) 
                    {
                        if($_can->atencionvotos > 0)
                        {
                            $estrellas = round($_can->atencionvalor/$_can->atencionvotos);    
                        }   
                    }
                }
                
    			switch ($estrellas) 
    			{
	    			case 0:
	    			$html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 1:
	    			$html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"i" .  base_url() . "mg/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 2:
	    			$html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 3:
	    			$html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 4:
	    			$html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
	    			break;
	    			case 5:
	    			$html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/>";
	    			break;
    			}
    		
    			$html .= '<span class="gris">&nbsp;&nbsp;'. $_can->atencionvotos.' VOTOS</span>';
    			$html .= '</p>';
    			$html .= '</div>';
    			
    			$html .= '<div class="box-iconos">';
    			$html .= '<i class="fa fa-star-half-empty"></i>';
    			$html .= '<p>PRECIO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                
                $estrellas = 0; 
                if($_cantidades)
                {
                    foreach ($_cantidades as $_can) 
                    {
                        if($_can->preciovotos > 0)
                        {
                            $estrellas = round($_can->preciovalor/$_can->preciovotos);    
                        }   
                    }
                }
				
    			switch ($estrellas) 
    			{
	    			case 0:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 1:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"i" .  base_url() . "mg/iconos/estrellita-gris.png\"/>";
                    break;
                    case 2:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 3:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 4:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 5:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/>";
                    break;
    			}
    		
    			$html .= '<span class="gris">&nbsp;&nbsp;'. $_can->preciovotos.' VOTOS</span>';
    			$html .= '</p>';
    			$html .= '</div>';
    			$html .= '<div class="box-iconos">';
    			$html .= '<i class="fa fa-star-half-empty"></i>';
    			$html .= '<p>SERVICIO&nbsp;&nbsp;&nbsp;&nbsp;';
                
                $estrellas = 0; 
                if($_cantidades)
                {
                    foreach ($_cantidades as $_can) 
                    {
                        if($_can->serviciovotos > 0)
                        {
                            $estrellas = round($_can->serviciovalor/$_can->serviciovotos);    
                        }   
                    }
                }
				
    			switch ($estrellas) 
    			{
                    case 0:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 1:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"i" .  base_url() . "mg/iconos/estrellita-gris.png\"/>";
                    break;
                    case 2:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 3:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 4:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-gris.png\"/>";
                    break;
                    case 5:
                    $html .= "<img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/><img src=\"" .  base_url() . "assets/img/iconos/estrellita-amarilla.png\"/>";
                    break;
    			}

    			$html .= '<span class="gris">&nbsp;&nbsp;'.$_can->serviciovotos.' VOTOS</span>';
    			$html .= '</p>';
    			$html .= '</div>';
				$html .= '</div>';

			} ;
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