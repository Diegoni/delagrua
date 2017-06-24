<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Fac extends MY_Controller 
{
    protected $_subject = 'fac'; 
    protected $_model   = 'm_usuario';
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  
        $this->load->model('m_usuario');
		$this->load->model('m_faq');				
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function index()
    {
    	$colname_usuario_sesion = "-1";
		if (isset($_SESSION['MM_Username'])) {
  			$colname_usuario_sesion = $_SESSION['MM_Username'];
		}
		
		$where = array(
			'email' => $colname_usuario_sesion,
		);
	    $db['row_usuario_sesion'] = $this->m_usuario->getRegistros($where);
		$db['row_registros'] = $this->m_faq->getRegistros();
		
        $this->armarVista('fac', $db);
    }
}
?>