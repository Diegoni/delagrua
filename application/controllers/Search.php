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
        
        $this->load->helpers('url');
        
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function index()
    {
        $db['banners']  = $this->m_banner->getBanner('busqueda arriba');
		$db['banners2'] = $this->m_banner->getBanner('busqueda medio');
		$db['banners3'] = $this->m_banner->getBanner('busqueda abajo');
		
        $db['maxRows_registros'] = 10;
        
        if (isset($_GET['p'])) 
        {
            $limit = array(
                'de'    => $_GET['p'] * $db['maxRows_registros'],
                'hasta' => $db['maxRows_registros'],
            );
        }else
        {
            $limit = array(
                'de'    => 0,
                'hasta' => $db['maxRows_registros'],
            );
        }
        
        if (isset($_GET['q']))
        {
            $db['query'] = $_GET['q']; 
        }else
        {
            $db['query'] = '';
        }        
        
        if (isset($_GET['v']))
        {
            $v = $_GET['v']; 
        }else
        {
            $v = 'auto';
        }
        
        $querys = array(
            'q' => $db['query'],
            'v' => $v,
        );
        
        $db['registros'] = $this->m_taller->getTaller($querys, 'all', $limit);
        $totalRows_registros = $this->m_taller->getTaller($querys, 'all');
        if($totalRows_registros)
        {
            $db['totalRows_registros'] = count($totalRows_registros);    
        }else{
            $db['totalRows_registros'] = 0; 
        }        
				
		$db['searchLeft']	= $this->searchLeft($db['totalRows_registros']);	
		$db['searchForm']	= $this->searchForm($v);	
		$db['searchCenter']	= $this->searchCenter($db['registros']);	
        	
        $this->armarVista('search', $db);
    }
    
	
	
	function searchLeft($totalRows_registros)
	{
		$html = '';
		if ($totalRows_registros > 0)
		{
			$html .= '<h1>FILTRAR RESULTADOS</h1>';
			$html .= '<a href="#" class="button mobileFilterToggle">';
			$html .= 'Filtrar resultados';
			$html .= '<i class="fa fa-chevron-down"></i>';
			$html .= '</a>';
            
            $query =  $_GET['q'];
            $tipovehiculo =  $_GET['v'];
            
            $servicios_results  = $this->m_servicio->getServicio($query, $tipovehiculo);
            $servicios_qty      = count($servicios_results);
            
            $marcas_results     = $this->m_marca->getMarca($query, $tipovehiculo);
            $marcas_qty         = count($marcas_results);
            
            $localidades_results= $this->m_localidad->getLocalidad($query, $tipovehiculo);
            $localidades_qty    = count($localidades_results);
            
            $urlData = array(
                'q'         => $_GET['q'],
                'marca'     => '',
                'localidad' => '',
                'servicio'  => '',
            );
            
            $url = base_url().'index.php/search?q='.$_GET['q'].'&v='.$tipovehiculo;
            
            if(isset($_GET['servicio']))
            {
                $urlData['servicio'] = $_GET['servicio'];                
            }
            
            if(isset($_GET['marca']))
            {
                $urlData['marca'] = $_GET['marca'];
            }
            
            if(isset($_GET['localidad']))
            {
                $urlData['localidad'] = $_GET['localidad'];
            }
            
			$html .= '<div class="filtering">';

			if ( $urlData['servicio'] != ''|| 
			     $urlData['localidad'] != '' || 
			     $urlData['marca'] != '' ) 
			{
				$html .= '<div class="activefilters">';
				$html .= '<ul>';
				$html .= '<li class="reset">';
				$html .= '<a href="'.$url.'">Resetear todos los filtros</a>';
				$html .= '</li>';

				if ($urlData['servicio'] != '')
				{
					$html .= '<li class="activeFilter">';
					$html .= $_GET['servicio'];
					$html .= '<a href="'.$url.'">';
                    $url .= '&servicio='.$_GET['servicio'];
					$html .= '<i class="fa fa-times"></i>';
					$html .= '</a>';
					$html .= '</li>';
				}

				if ($urlData['localidad'] != '')
				{
					$html .= '<li class="activeFilter">';
					$html .= $_GET['localidad'];
					$html .= '<a href="'.$url.'">';
                    $url .= '&localidad='.$_GET['localidad'];
					$html .= '<i class="fa fa-times"></i>';
					$html .= '</a>';
					$html .= '</li>';
				}

				if ($urlData['marca'] != '')
				{
					$html .= '<li class="activeFilter">';
					$html .= $_GET['marca'];
					$html .= '<a href="'.$url.'">';
                    $url .= '&marca='.$_GET['marca'];
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
                        $html .= '<a href="'.$url.'&servicio='.$_row->servicio.'">'.$_row->servicio.'</a> ('.$_row->count.')';
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
                        $html .= '<a href="'.$url.'&marca='.$_row->marca.'">'.$_row->marca.'</a> ('.$_row->count.')';
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
                        $html .= '<a href="'.$url.'&localidad='.$_row->locality.'">'.$_row->locality.'</a> ('.$_row->count.')';
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


	function searchForm($v = NULL)
	{
		$html = '<form method="get" action="'.base_url().'index.php/search" id="formbuscar" name="formbuscar" >';

        if($v == NULL || $v == 'auto')
        {
            $html .= '<input type="radio" name="v" value="auto" id="vAuto" checked><label for="vAuto"> Auto</label>';
            $html .= '<input type="radio" name="v" value="moto" id="vMoto"><label for="vMoto"> Moto</label>';    
        }else
        {
            $html .= '<input type="radio" name="v" value="auto" id="vAuto" ><label for="vAuto"> Auto</label>';
            $html .= '<input type="radio" name="v" value="moto" id="vMoto" checked><label for="vMoto"> Moto</label>';
        }
		
		$html .= '<br>';

		//$html .= '<input id="search" name="q" type="text" placeholder="Buscá por nombre, tipo de taller o localidad" value="'.isset($query) && $query ? $query : "''" .'">';

		$html .= '<input id="search" name="q" type="text" placeholder="Buscá por nombre, tipo de taller o localidad">';
		
		$html .= '<button class="button secondary large" >Buscar</button>';
		$html .= '</form>';
		
		return $html;
	
	}


	function searchCenter($registros, $totalRows_registros = NULL)
	{
		if($totalRows_registros == NULL)
		{
			$totalRows_registros = 0;
		}
        
		$html = '<div class="results-'.count($registros).' centro">';

		if ($registros) 
		{ 
			foreach ($registros as $_row) 
			{
                $_servicios = $this->m_taller->getTaller($_row->idtaller, 'servicios');
                $_cantidades = $this->m_taller->getTaller($_row->idtaller, 'cantidades');

				$html .= '<div class="box-centro">';
				$html .= '<h2>';
				$html .= '<a href="'.base_url(). "index.php/taller/search/".$_row->idtaller."/".'">';
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