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
    
    
    function search($id_taller)
    {
        $db['registros'] = $this->m_taller->getRegistros($id_taller);
        	
        $this->armarVista('search', $db);
    }
}
?>