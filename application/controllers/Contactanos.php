<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Contactanos extends MY_Controller 
{
    protected $_subject = 'contactanos'; 
    protected $_model   = 'm_usuario';
    
    function __construct()
    {
        parent::__construct(
            $subject    = $this->_subject,
            $model      = $this->_model 
        );
        
        $this->load->model($this->_model, 'model'); // Linea obligatoria  
        $this->load->model('m_contactos');			
    } 
    
    
/*--------------------------------------------------------------------------------- 
-----------------------------------------------------------------------------------  
            
       Ejemplo de abm
  
----------------------------------------------------------------------------------- 
---------------------------------------------------------------------------------*/   
    
    
    function contact()
    {
    	$colname_usuario_sesion = "-1";
		if (isset($_SESSION['MM_Username'])) {
  			$colname_usuario_sesion = $_SESSION['MM_Username'];
		}
		
		$where = array(
			'email' => $colname_usuario_sesion,
		);
		
	    $db['row_usuario_sesion'] = $this->model->getRegistros($where);
		$db['mensaje'] = '';
		
		if ((isset($_POST["MM_send"])) && ($_POST["MM_send"] == "formcontacto")) 
		{
			$paragraphs  = 'Consulta desde el sitio';
		    $paragraphs .= 'Nombre: ' .  $_POST['nombre'] ;
			if(isset($_POST['mailotelefono']))
			{
				$paragraphs .= 'Mail o teléfono: ' .  $_POST['mailotelefono'] ;
			}
			if(isset($_POST['consulta']))
			{
				$consulta = $_POST['consulta'];
				$paragraphs .= 'Consulta: ' .  $consulta ;
			}else
			{
				$consulta = '';	
			}
			$this->load->library('email');
			
			if(!isset($email_admin_taller))
			{
				$email_admin_taller = 'diego_nieto_1@hotmail.com';
			}
			$this->email->from($email_admin_taller, 'DE LA GRUA');
			if(!isset($email_contacto))
			{
				$email_contacto = 'test@test.com';
			}
			$this->email->to($email_contacto);
			
			
			$this->email->subject(utf8_decode("DE LA GRUA - Contactanos"));
			$this->email->message($paragraphs);
			
			$registro = array(
			    'nombre'        => $_POST['nombre'],
			    'mail_telefono' => $_POST['mail_telefono'],
			    'taller'        => $_POST['taller'],
			    'consulta'      => $consulta,
			    'id_estado'     => 1,
			);
			$this->m_contactos->insert($registro);

	
			if ($this->email->send())
			{
				$db['mensaje'] = $_POST['nombre'] . '<br>Gracias por contactarnos. ';
			}else 
			{
				$db['mensaje'] = 'No se puddo enviar tu consulta, por favor, intentalo más tarde.';
			}
		}

        $this->armarVista('contactanos', $db);
    }
}
?>