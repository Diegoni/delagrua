<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Backup extends MY_Controller 
{
    protected $_subject = 'terminos'; 
    protected $_model   = 'm_usuario';
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  
        $this->load->model('m_usuario');			
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function do_backup($token = NULL)
    {
    	$_token = md5('0RMHrHDcEfxjoYZgeFONFh7HgQ'.date("dH"));
		
    	if($token == $_token) 
    	{
			$this->load->dbutil();

	        $prefs = array(     
				'format'      => 'zip',             
				'filename'    => date("Ymd-H").'-backup.sql'
			);
	
	        $backup =& $this->dbutil->backup($prefs); 
	        $db_name = date("Ymd_His").'-backup.zip';
	
	        $this->load->helper('download');
	        force_download($db_name, $backup);
		}else
		{
			echo "Error en Token";
		}	
    }
}
?>