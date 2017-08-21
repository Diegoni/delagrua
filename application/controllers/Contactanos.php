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
			// Carga email desde y variables
			if(!isset($email_admin_taller))
			{
				$email_admin_taller = 'no-reply@c0730102.ferozo.com';
			}
			
			if(isset($_POST['taller']))
			{
				$taller = $_POST['taller'];
			}else{
				$taller = '';
			}
			
			// Contenido del correo
			$paragraphs  = "Consulta desde el sitio \n";
		    $paragraphs .= 'Nombre: ' .  $_POST['nombre']."\n" ;
			if (filter_var($_POST['mail_telefono'], FILTER_VALIDATE_EMAIL)) 
			{
				$paragraphs .= 'Mail o teléfono: ' .  $_POST['mailotelefono']."\n" ;
				$email_contacto = $_POST['mail_telefono'];
			}else if(!isset($email_contacto))
			{
				$email_contacto = 'delagrua1@gmail.com';
			}
			
			if(isset($_POST['consulta']))
			{
				$consulta = $_POST['consulta'];
				$paragraphs .= 'Consulta: ' .  $consulta ."\n" ;
			}else
			{
				$consulta = '';	
			}
			// Envio del correo
			$this->load->library('email');
			$this->email->from($email_admin_taller, 'DE LA GRUA');
			$this->email->to($email_contacto);
			$this->email->subject(utf8_decode("DE LA GRUA - Contactanos"));
			$this->email->message($paragraphs);
			if ($this->email->send())
			{
				$db['mensaje'] = $_POST['nombre'] . '<br> Gracias por contactarnos. ';
			}else 
			{
				$db['mensaje'] = 'No se puddo enviar tu consulta, por favor, intentalo más tarde.';
			}
			
			// Guardamos registro en base de datos
			$registro = array(
			    'nombre'        => $_POST['nombre'],
			    'mail_telefono' => $email_contacto,
			    'taller'        => $taller,
			    'consulta'      => $consulta,
			    'id_estado'     => 1,
			);
			$this->m_contactos->insert($registro);
		}

        $this->armarVista('contactanos', $db);
    }
}
?>