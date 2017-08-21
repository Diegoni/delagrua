<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Login extends MY_Controller 
{
    protected $_subject = 'login'; 
    protected $_model   = 'm_usuario';
    
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
		if (isset($_POST['email'])) {
			$loginUsername	= $this->input->post('email');
			$password		= md5($this->input->post('clave'));
		  	$MM_fldUserAuthorization = "";
		  	$MM_redirectLoginSuccess = "login_ok";
		  	$MM_redirectLoginFailed = "login_error";
		  	$MM_redirecttoReferrer = false;
		  	
		  	$LoginRS__query = $this->model->getUsuario($loginUsername, $password);
		  	if ($LoginRS__query) {
				$loginStrGroup = "";
		
				if (PHP_VERSION >= 5.1) 
				{
					session_regenerate_id(true);
				} 
				else {
					session_regenerate_id();
				}
				//declare two session variables and assign them
				
				foreach ($LoginRS__query as $usuario) 
				{
					$_SESSION['nick'] = $usuario->nick;
					$_SESSION['fblogin'] = $usuario->fblogin;					
				}
				$_SESSION['MM_Username']	= $loginUsername;
				$_SESSION['MM_UserGroup']	= $loginStrGroup;
		
				if (isset($_SESSION['PrevUrl']) && false) {
					$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
				}
		    	header("Location: " . $MM_redirectLoginSuccess );
		  	}
		  	else 
		  	{
		    	header("Location: ". $MM_redirectLoginFailed );
		  	}
		}
    	$db['test'] = 1;
    	$this->load->view($this->_subject.'/inicio', $db);
    }


	function login_ok()
	{
		if (!isset($_SESSION)) {
		  session_start();
		}
		
		$MM_authorizedUsers = "";
		$MM_donotCheckaccess = "true";
		
		$MM_restrictGoTo = "login_error.php";
		if (!((isset($_SESSION['MM_Username'])) && ($this->isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
			$MM_qsChar = "?";
			$MM_referrer = $_SERVER['PHP_SELF'];
			if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
			if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0)
			$MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
			$MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
			header("Location: ". $MM_restrictGoTo);
			exit;
		}
		
		$colname_usuario_sesion = "-1";
		if (isset($_SESSION['MM_Username'])) {
		  $colname_usuario_sesion = $_SESSION['MM_Username'];
		}
		
		$db['usuarios'] = $this->model->getRegistros($colname_usuario_sesion, 'email');

		header("Location: ".base_url().'index.php');
	}

	function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
		  // For security, start by assuming the visitor is NOT authorized.
		  $isValid = False;
		
		  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
		  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
		  if (!empty($UserName)) {
		    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
		    // Parse the strings into arrays.
		    $arrUsers = Explode(",", $strUsers);
		    $arrGroups = Explode(",", $strGroups);
		    if (in_array($UserName, $arrUsers)) {
		      $isValid = true;
		    }
		    // Or, you may restrict access to only certain users based on their username.
		    if (in_array($UserGroup, $arrGroups)) {
		      $isValid = true;
		    }
		    if (($strUsers == "") && true) {
		      $isValid = true;
		    }
		  }
		  return $isValid;
	}
	
	
	function logout()
	{
		foreach ($_SESSION as $key => $value) 
		{
			unset($_SESSION[$key]);
		}	
		
		header("Location: ".base_url().'index.php');
		exit;
	}
	
	
	
	function login_cambia_clave()
	{
		if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formguardar")) 
		{
			$update = array(
				'clave'	=> $_POST['clave']
			);
			
			$where = array(
				'email'	=> $_SESSION['MM_Username']
			);
			
			$this->model->update($update, $where);

  			header("Location: ".base_url().'index.php');
			exit;
		}else
		{
			echo 'test';
			$db['mensaje']	= FALSE;
			$this->load->view($this->_subject.'/login_cambia_clave', $db);
		}
	}
	
	
	
	function crear_cuenta()
	{
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formguardar")) 
		{
			$usuarios = $this->model->getRegistros($_POST['email'], 'email');
			if(!$usuarios)
			{
				$nicks = $this->model->getRegistros($_POST['nick'], 'nick');
		    	if(!$nicks)
				{
			        $sql_registro = array(
			            'idgrupo'           => $_POST['idgrupo'],
			            'nombreyapellido'   => $_POST['nombreyapellido'], 
			            'email'             => $_POST['email'], 
			            'clave'             => md5($_POST['clave']), 
			            'fechanacimiento'   => formatDate($_POST['fechanacimiento']), 
			            'telefonocodarea'   => $_POST['telefonocodarea'], 
			            'telefono'          => $_POST['telefono'], 
			            'pais'              => $_POST['pais'], 
			            'provincia'         => $_POST['provincia'], 
			            'localidad'         => $_POST['localidad'], 
			            'nick'              => $_POST['nick'], 
			            'activo'            => $_POST['activo']
			        );
			        
			        $m_usuario = new m_usuario();
			        $m_usuario->insert($sql_registro); 
			        
			        $this->load->view($this->_subject.'/crear_cuenta_ok');
				} else 
				{
					$db['error'] = "Tu cuenta no se pudo agregar porque ya existe una cuenta con ese nick.";
					$this->load->view($this->_subject.'/crear_cuenta', $db);
				}
			} else {
				$db['error'] = "Tu cuenta no se pudo agregar porque ya existe una cuenta con ese email.";
				$this->load->view($this->_subject.'/crear_cuenta', $db);
			}
		}else
		{
			$db['error'] = FALSE;
			$this->load->view($this->_subject.'/crear_cuenta', $db);
		}
	}
	
}
?>