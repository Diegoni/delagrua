<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Inicio extends MY_Controller 
{
    protected $_subject = 'Inicio';                 // Nombre con el que se va a identificar el modulo
    protected $_model   = 'm_usuario';               // Modelo principal, la vista tabla automatica
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function index()
    {
    	                           
        $db['test']  = 'test';
        $this->armarVista('inicio', $db);
    }
}
?>