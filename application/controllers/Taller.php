<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Taller extends MY_Controller 
{
    protected $_subject = 'taller'; 
    protected $_model   = 'm_usuario';
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  	
        $this->load->model('m_taller');
		$this->load->model('m_tallerservicio');
		$this->load->model('m_calificacion');
		$this->load->model('m_banner');
		
        
        $this->load->helpers('url');
        
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function search($id_taller)
    {
        $db['registros'] = $this->m_taller->getRegistros($id_taller);
		$db['servicios'] = $this->m_tallerservicio->getServicios($id_taller);
		$db['calificaciones'] = $this->m_calificacion->getCalificacion($id_taller);
		$id_usuario = 1; //arreglar esta cochinada
		$db['calificaciones_usuario'] = $this->m_calificacion->getServiciosUsuario($id_usuario, $id_taller);
		$db['opiniones'] = $this->m_calificacion->getOpiniones($id_taller);
		
		$where = array(
			'ubicacion' => 'taller arriba',
			'publicar' => '1'
			
		);
		$db['banner_arriba']     = $this->m_banner->getRegistros();
		
		$where = array(
			'ubicacion' => 'taller medio',
			'publicar' => '1'	
		);
		$db['banner_medio']     = $this->m_banner->getRegistros();
	
		$where = array(
			'ubicacion' => 'taller abajo',
			'publicar' => '1'	
		);
		$db['banner_abajo']     = $this->m_banner->getRegistros();
		
		
		$db['id_usuario'] = $id_usuario;
		$db['mensaje'] = '';
        	
        $this->armarVista('search', $db);
    }
}
?>