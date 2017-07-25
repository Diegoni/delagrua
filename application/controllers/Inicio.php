<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Inicio extends MY_Controller 
{
    protected $_subject = 'inicio'; 
    protected $_model   = 'm_usuario';
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  
        $this->load->model('m_usuario');
		$this->load->model('m_marca');
		$this->load->model('m_provincia');	
		$this->load->model('m_localidad');
		$this->load->model('m_servicio');
		$this->load->model('m_banner');	
		$this->load->model('m_taller');	
		$this->load->model('m_tallerservicio');	
				
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function index()
    {
    	$colname_usuario_sesion = "-1";
		if (isset($_SESSION['MM_Username'])) 
	  	{
	      $colname_usuario_sesion = $_SESSION['MM_Username'];
	  	}
		$where = array(
			'email' => $colname_usuario_sesion,
		);
	    $db['row_usuario_sesion'] = $this->m_usuario->getRegistros($where);
	    $db['row_registros']      = $this->m_marca->getRegistros();
	    $db['row_registros2']     = $this->m_provincia->getRegistros();
		
		foreach ($db['row_registros2'] as $row) 
		{
			$colname_registros3 = $row->provincia;
		}
		
	    if (isset($_GET['provincia'])) {
	        $colname_registros3 = $_GET['provincia'];
	    }
		
		$where = array(
			'dlg_provincia.provincia' => $colname_registros3,
		);	
		$db['row_registros3']     = $this->m_localidad->getRegistros();
		$db['row_registros4']     = $this->m_servicio->getRegistros();
		
		$where = array(
			'ubicacion' => 'home izquierda',
			'publicar' => '1'
			
		);
		$db['row_registros5']     = $this->m_banner->getRegistros();
		
		$where = array(
			'ubicacion' => 'home centro',
			'publicar' => '1'	
		);
		$db['row_registros6']     = $this->m_banner->getRegistros();
	
		$where = array(
			'ubicacion' => 'home derecha',
			'publicar' => '1'	
		);
		$db['row_registros7']     = $this->m_banner->getRegistros();
		
		$where = array(
			'ubicacion' => 'home abajo',
			'publicar' => '1'	
		);
		$db['row_registros7']     = $this->m_banner->getRegistros();
		
		$db['talleres']     = $this->m_taller->getRegistros();
		$db['talleres_s']   = $this->m_tallerservicio->getRegistros();

    	                           
        $db['mensaje']  = '';
		
        $this->armarVista('inicio', $db);
    }
}
?>