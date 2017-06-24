<?php
require_once ('Connections/config.php');
require_once ('funciones.php');
require_once ('models/M_contactos.php');
require_once ('partials/header.php');

$m_contactos = new m_contactos();

if(!isset($_POST['nombre']))
{
    header("Location: $url_relativa ");
    die();
}

$registro = array(
    'nombre'        => $_POST['nombre'],
    'mail_telefono' => $_POST['mail_telefono'],
    'taller'        => $_POST['taller'],
    'consulta'        => $_POST['consulta'],
    'id_estado'     => 1,
);
$m_contactos->insert($registro);
      
?>



      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont620">
      <div class="uno"><a class="fa fa-check"></a>MENSAJE ENVIADO!</div>

      <div class="contactanos"><!--contactanos-->
      <div class="left">
      <p class="titulo">Gracias por contactarnos, en breve nos comunicamos con usted!!</p>
      </div>

    
      </div><!--contactanos-->

      </div>
      </div><!--c2-->

<?php
include_once 'partials/footer.php'; 
?>