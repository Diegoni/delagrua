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
        $this->load->model('m_usuario');			
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
		$db['mensaje'] = '';
		
		if ((isset($_POST["MM_send"])) && ($_POST["MM_send"] == "formcontacto")) {
			require_once('class.phpmailer.php');
			require_once('mailTemplate.php');
	
			$mail = new PHPMailer();
		    $paragraphs[] = 'Nombre: ' .  $_POST['nombre'] ;
			$paragraphs[] = 'Mail o teléfono: ' .  $_POST['mailotelefono'] ;
			$paragraphs[] = 'Consulta: ' .  $_POST['consulta'] ;
		
			$mail = new PHPMailer();
			$mail->IsHTML(true);
			$mail->FromName = 'DE LA GRUA';
			$mail->From = $email_admin_taller;
			$mail->AddAddress($email_contacto);
			$mail->Subject = utf8_decode("DE LA GRUA - Contactanos");
			$mail->Body = mailTemplate('Consulta desde el sitio', $paragraphs );
	
			 if ($mail->Send()){
				$mensaje = $_POST['nombre'] . '<br>Gracias por contactarnos. ';
			 } else {
				$mensaje = 'No se puddo enviar tu consulta, por favor, intentalo más tarde.';
			 }
		}

        $this->armarVista('contactanos', $db);
    }
}
?>