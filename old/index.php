<?php
  require_once ('Connections/config.php');
  require_once ('funciones.php');
  require_once ('models/M_taller.php');
  require_once ('models/M_usuario.php');
  require_once ('models/M_marca.php');
  require_once ('models/M_provincia.php');
  require_once ('models/M_localidad.php');
  
  //initialize the session
  if (!isset($_SESSION)) {
      session_start();
  }

  // ** Logout the current user. **
  $logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
  if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")) {
      $logoutAction.= "&" . htmlentities($_SERVER['QUERY_STRING']);
  }

  if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")) 
  {
      //to fully log out a visitor we need to clear the session varialbles
      $_SESSION['MM_Username']  = NULL;
      $_SESSION['MM_UserGroup'] = NULL;
      $_SESSION['PrevUrl']      = NULL;
      unset($_SESSION['MM_Username']);
      unset($_SESSION['MM_UserGroup']);
      unset($_SESSION['PrevUrl']);

      $logoutGoTo = $url_relativa;
      if ($logoutGoTo) 
      {
          header("Location: $logoutGoTo");
          exit;
      }
  }


  

  if ((isset($_POST["MM_send"])) && ($_POST["MM_send"] == "formcontacto")) 
  {
      require_once ('class.phpmailer.php');
      $mail = new PHPMailer();
      $body = '<html><body>';
      $body.= 'Nombre y Apellido: ' . $_POST['nombreyapellido'];
      $body.= '<br><br>Mail o tel&eacute;fono: ' . $_POST['mailotelefono'];
      $body.= '<br><br>Taller: ' . $_POST['taller'];
      $body.= '</body></html>';
      $mail = new PHPMailer();
      $mail->IsHTML(true);
      $mail->FromName = 'DE LA GRUA';
      $mail->From = $email_admin_taller;
      $mail->AddAddress($email_admin_taller);
      $mail->Subject = utf8_decode("DE LA GRUA - Agregá tu taller");
      $mail->Body = $body;
      if ($mail->Send()) 
      {
          $mensaje = $_POST['nombreyapellido'] . '<br><br>Nos contactaremos para agregar el taller ' . $_POST['taller'] . ' al sitio De la grua.';
      }else 
      {
          $mensaje = 'No se pudieron enviar los datos para agregar tu taller, por favor, intentalo más tarde.';
      }
  }
    
  include_once 'partials/header.php';
  ?>

<!--c4-->
<?php
  include_once 'partials/footer.php'; 

  mysql_free_result($registros);
  mysql_free_result($registros2);
  mysql_free_result($registros3);
  mysql_free_result($registros4);
  mysql_free_result($registros5);
  mysql_free_result($registros6);
  mysql_free_result($registros7);
  mysql_free_result($registros8);
  mysql_close($config);
  ?>