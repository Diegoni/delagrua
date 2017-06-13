<?php
  require_once ('Connections/config.php'); ?>
<?php
  require_once ('funciones.php'); ?>
<?php
  //initialize the session
  if (!isset($_SESSION)) {
      session_start();
  }

  // ** Logout the current user. **
  $logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
  if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")) {
      $logoutAction.= "&" . htmlentities($_SERVER['QUERY_STRING']);
  }

  if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")) {

      //to fully log out a visitor we need to clear the session varialbles
      $_SESSION['MM_Username'] = NULL;
      $_SESSION['MM_UserGroup'] = NULL;
      $_SESSION['PrevUrl'] = NULL;
      unset($_SESSION['MM_Username']);
      unset($_SESSION['MM_UserGroup']);
      unset($_SESSION['PrevUrl']);

      $logoutGoTo = $url_relativa;
      if ($logoutGoTo) {
          header("Location: $logoutGoTo");
          exit;
      }
  }
  ?>
<?php
  $colname_usuario_sesion = "-1";
  if (isset($_SESSION['MM_Username'])) {
      $colname_usuario_sesion = $_SESSION['MM_Username'];
  }
  mysql_select_db($database_config, $config);
  $query_usuario_sesion = sprintf("SELECT nick, fblogin FROM dlg_usuario WHERE email = %s", GetSQLValueString($colname_usuario_sesion, "text"));
  $usuario_sesion = mysql_query($query_usuario_sesion, $config) or die(mysql_error());
  $row_usuario_sesion = mysql_fetch_assoc($usuario_sesion);
  $totalRows_usuario_sesion = mysql_num_rows($usuario_sesion);

  mysql_select_db($database_config, $config);
  $query_registros = "SELECT * FROM dlg_marca ORDER BY marca ASC";
  $registros = mysql_query($query_registros, $config) or die(mysql_error());
  $row_registros = mysql_fetch_assoc($registros);
  $totalRows_registros = mysql_num_rows($registros);

  mysql_select_db($database_config, $config);
  $query_registros2 = "SELECT * FROM dlg_provincia ORDER BY provincia ASC";
  $registros2 = mysql_query($query_registros2, $config) or die(mysql_error());
  $row_registros2 = mysql_fetch_assoc($registros2);
  $totalRows_registros2 = mysql_num_rows($registros2);

  $colname_registros3 = $row_registros2['provincia'];
  if (isset($_GET['provincia'])) {
      $colname_registros3 = $_GET['provincia'];
  }
  mysql_select_db($database_config, $config);
  $query_registros3 = sprintf("SELECT dlg_localidad.localidad FROM dlg_localidad LEFT JOIN dlg_provincia ON dlg_localidad.idprovincia = dlg_provincia.idprovincia WHERE dlg_provincia.provincia LIKE %s ORDER BY localidad ASC", GetSQLValueString($colname_registros3, "text"));
  $registros3 = mysql_query($query_registros3, $config) or die(mysql_error());
  $row_registros3 = mysql_fetch_assoc($registros3);
  $totalRows_registros3 = mysql_num_rows($registros3);

  mysql_select_db($database_config, $config);
  $query_registros4 = "SELECT * FROM dlg_servicio ORDER BY servicio ASC";
  $registros4 = mysql_query($query_registros4, $config) or die(mysql_error());
  $row_registros4 = mysql_fetch_assoc($registros4);
  $totalRows_registros4 = mysql_num_rows($registros4);

  mysql_select_db($database_config, $config);
  $query_registros5 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home izquierda' AND publicar = 1 ORDER BY rand() LIMIT 1";
  $registros5 = mysql_query($query_registros5, $config) or die(mysql_error());
  $row_registros5 = mysql_fetch_assoc($registros5);
  $totalRows_registros5 = mysql_num_rows($registros5);

  mysql_select_db($database_config, $config);
  $query_registros6 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home centro' AND publicar = 1 ORDER BY rand() LIMIT 1";
  $registros6 = mysql_query($query_registros6, $config) or die(mysql_error());
  $row_registros6 = mysql_fetch_assoc($registros6);
  $totalRows_registros6 = mysql_num_rows($registros6);

  mysql_select_db($database_config, $config);
  $query_registros7 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home derecha' AND publicar = 1 ORDER BY rand() LIMIT 1";
  $registros7 = mysql_query($query_registros7, $config) or die(mysql_error());
  $row_registros7 = mysql_fetch_assoc($registros7);
  $totalRows_registros7 = mysql_num_rows($registros7);

  mysql_select_db($database_config, $config);
  $query_registros8 = "SELECT imagen, enlace FROM dlg_banner WHERE ubicacion = 'home abajo' AND publicar = 1 ORDER BY rand() LIMIT 1";
  $registros8 = mysql_query($query_registros8, $config) or die(mysql_error());
  $row_registros8 = mysql_fetch_assoc($registros8);
  $totalRows_registros8 = mysql_num_rows($registros8);

  if ((isset($_POST["MM_send"])) && ($_POST["MM_send"] == "formcontacto")) {
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
      if ($mail->Send()) {
          $mensaje = $_POST['nombreyapellido'] . '<br><br>Nos contactaremos para agregar el taller ' . $_POST['taller'] . ' al sitio De la grua.';
      }
      else {
          $mensaje = 'No se pudieron enviar los datos para agregar tu taller, por favor, intentalo más tarde.';
      }
  }

  include_once 'partials/header.php';
  ?>
<div class="cuadro-uno">
  <!--c1-->
  <div class="cont960">
    <div class="box">
      <!--box1-->
      <img src="<?php
        echo $url_relativa; ?>img/autos/a1.png">
      <h1>¿MAL DÍA EH?</h1>
      <p>¿Te abollaron la puerta? ¿Se pinchó una rueda? ¿Te agarró la piedra? ¿No arranca el motor?</p>
    </div>
    <!--box1-->
    <div class="box">
      <!--box2-->
      <img src="<?php
        echo $url_relativa; ?>img/autos/a2.png">
      <h1>NO TE PREOCUPES!</h1>
      <p>Acá podrás encontrar talleres profesionales para todos los problemas que tengas con tu vehículo</p>
    </div>
    <!--box2-->
    <div class="box">
      <!--box3--><img src="<?php
        echo $url_relativa; ?>img/autos/a3.png" width="68" height="68" alt=""/>
      <h1>Y LO MEJOR:</h1>
      <p>Calificados por sus clientes. Para que no entres a cambiar el aceite y salgas con un motor nuevo.</p>
    </div>
    <!--box3-->
  </div>
</div>
<!--c1-->


    <div class="cuadro-busq">
      <div class="cont960">
        <p><a name="busca_taller" class="fa fa-search"></a> BUSCÁ UN TALLER A TU MEDIDA</p>
        <?php include_once 'partials/searchForm.php'; ?>
      </div>
    </div>


<div class="cuadro-dos">
  <!--c2-->
  <div class="cont960">
    <div class="box2">
      <?php
        if ($totalRows_registros5 > 0) {

            // Show if recordset not empty

        ?>
      <a href="<?php
        echo $row_registros5['enlace']; ?>" target="_blank"><img src="<?php
        echo $url_relativa; ?>img/banner/<?php
        echo $row_registros5['imagen']; ?>" alt=""/></a>
      <?php
        }

        // Show if recordset not empty

        ?>
    </div>
    <div class="vertical"></div>
    <div class="box2">
      <?php
        if ($totalRows_registros6 > 0) {

            // Show if recordset not empty

        ?>
      <a href="<?php
        echo $row_registros6['enlace']; ?>" target="_blank"><img src="<?php
        echo $url_relativa; ?>img/banner/<?php
        echo $row_registros6['imagen']; ?>" alt=""/></a>
      <?php
        }

        // Show if recordset not empty

        ?>
    </div>
    <div class="vertical"></div>
    <div class="box2">
      <?php
        if ($totalRows_registros7 > 0) {

            // Show if recordset not empty

        ?>
      <a href="<?php
        echo $row_registros7['enlace']; ?>" target="_blank"><img src="<?php
        echo $url_relativa; ?>img/banner/<?php
        echo $row_registros7['imagen']; ?>" alt=""/></a>
      <?php
        }

        // Show if recordset not empty

        ?>
    </div>
  </div>
</div>
<!--c2-->
<div class="cuadro-tres">
  <!--c3-->
  <div class="cont960">
    <div class="box">
      <!--box1-->
      <img src="<?php
        echo $url_relativa; ?>img/iconos/estrella.png">
      <h1>YO LO RECOMIENDO!</h1>
      <p>Si calificas el taller que te dio un servicio, ayudas a otros clientes a que elijan lo mejor de lo mejor.</p>
    </div>
    <!--box1-->
    <div class="box">
      <!--box2-->
      <img src="<?php
        echo $url_relativa; ?>img/iconos/list.png">
      <h1>NO HAY MAS TURNOS!</h1>
      <p>Inscribí tu taller, gana reputación con las calificaciones y que crezca tu negocio, gratis para siempre.</p>
    </div>
    <!--box2-->
    <div class="box">
      <!--box3-->
      <img src="<?php
        echo $url_relativa; ?>img/iconos/cel.png">
      <h1>EXITO!</h1>
      <p>Gana el cliente y su vehículo, gana el buen tallerista, ganamos todos!</p>
    </div>
    <!--box3-->
  </div>
</div>
<!--c3-->
<div class="cuadro-cuatro">
  <!--c4-->
  <div class="cont960">
    <div class="box3">
      <div class="uno"><a class="fa fa-star"></a> CALIFICÁ UN TALLER</div>
      <div class="dos">
        <?php
          if (!isset($_SESSION['MM_Username'])) { ?>
        <h2>Para calificar, tenes que <a class="fancybox fancybox.iframe" href="/login.php">loguearte</a> al sitio.</h2>
        <p>Podes usar tu perfil de Facebook o crear una cuenta en nuestro sitio. No queremos invadir tu privacidad, solo buscamos mantener la veracidad de las opiniones que reciben los tallleres.</p>
        <?php
          }
          else { ?>
        <h2>Para calificar, tenes que <a href="#busca_taller">buscar el taller</a>.</h2>
        <p>Podes buscar el taller y al ver más información podrás calificarlo.</p>
        <?php
          } ?>
      </div>
    </div>
    <div class="vertical-b"></div>
    <div class="box3">
      <div class="uno"><a name="agrega_taller" class="fa fa-list-alt"></a> AGREGÁ TU TALLER</div>
      <div class="dos">
        <div class="left">
          <span class="queres">¿Querés que agreguemos tu taller?</span>
          Déjanos tus datos y a la brevedad nos estaremos comunicando con vos.
        </div>
        <?php
          if ($mensaje != '') { ?>
        <div class="rigth">
          <li><?php
            echo $mensaje; ?></li>
        </div>
        <?php
          }
          else { ?>
        <form ACTION="<?php
          echo $url_relativa; ?>#agrega_taller" METHOD="POST" id="formcontacto" name="formcontacto">
          <div class="rigth">
            <li><input name="nombreyapellido" type="text" id="nombreyapellido" placeholder="Nombre y Apellido" title="Nombre y Apellido" maxlength="250"></li>
            <li><input name="mailotelefono" type="text" id="mailotelefono" placeholder="Mail o Teléfono" title="Mail o Teléfono" maxlength="250"></li>
            <li><input name="taller" type="text" id="taller" placeholder="Taller" title="Taller" maxlength="250"><br></li>
            <li>
              <span class="login-pop">
              <input type="hidden" name="MM_send" value="formcontacto">
              </span>
              <div class="boton-b"><a href="#" onClick="MM_validateForm('nombreyapellido','','R','mailotelefono','','R','taller','','R');if( document.MM_returnValue){document.formcontacto.submit();}">ENVIAR!</a></div>
            </li>
          </div>
        </form>
        <?php
          } ?>
      </div>
    </div>
    <div class="vertical-b"></div>
    <div class="box3 recienAgregados">
    <div class="uno"><a class="fa fa-arrow-up"></a> RECIEN AGREGADOS:</div>
    <div class="dos">


      <?php
      $maxRows_registros10 = 4;
      $pageNum_registros10 = 0;
      if (isset($_GET['pageNum_registros10'])) {
        $pageNum_registros10 = $_GET['pageNum_registros10'];
      }
      $startRow_registros10 = $pageNum_registros10 * $maxRows_registros10;

      mysql_select_db($database_config, $config);
      $query_registros10 = "SELECT * FROM dlg_taller ORDER BY idtaller DESC";
      $query_limit_registros10 = sprintf("%s LIMIT %d, %d", $query_registros10, $startRow_registros10, $maxRows_registros10);
      $registros10 = mysql_query($query_limit_registros10, $config) or die(mysql_error());
      $row_registros10 = mysql_fetch_assoc($registros10);

      if (isset($_GET['totalRows_registros10'])) {
        $totalRows_registros10 = $_GET['totalRows_registros10'];
      } else {
        $all_registros10 = mysql_query($query_registros10);
        $totalRows_registros10 = mysql_num_rows($all_registros10);
      }
      $totalPages_registros10 = ceil($totalRows_registros10/$maxRows_registros10)-1;

       ?>
      <?php if ($totalRows_registros10 > 0) { // Show if recordset not empty ?>
      <?php do { ?>
      <?php
      $colname_registros11 = $row_registros10['idtaller'];
      mysql_select_db($database_config, $config);
      $query_registros11 = sprintf("SELECT dlg_servicio.servicio FROM dlg_tallerservicio LEFT JOIN dlg_servicio ON dlg_tallerservicio.idservicio = dlg_servicio.idservicio WHERE dlg_tallerservicio.idtaller = %s ORDER BY dlg_servicio.servicio ASC", GetSQLValueString($colname_registros11, "int"));
      $registros11 = mysql_query($query_registros11, $config) or die(mysql_error());
      $row_registros11 = mysql_fetch_assoc($registros11);
      $totalRows_registros11 = mysql_num_rows($registros11);
      ?>


        <div class="recientes">
          <!--recientes-->
          <h2>

          <a href="<?php echo $url_relativa . "taller/" . url2seo($row_registros10['nombre']) . "-" . $row_registros10['idtaller'] . "/"; ?>" >
            <?php echo $row_registros10['nombre']; ?>
            <i class="fa fa-plus-square"></i>
          </a></h2>
          <h3 class="gris"><?php if ($totalRows_registros11 > 0) { // Show if recordset not empty ?><?php do { ?> <?php echo $row_registros11['servicio']; ?>&nbsp;&nbsp;<?php } while ($row_registros11 = mysql_fetch_assoc($registros11)); ?><?php mysql_free_result($registros11);?><?php } // Show if recordset not empty ?></h3>
        </div>

      <!--recientes-->
      <?php } while ($row_registros10 = mysql_fetch_assoc($registros10)); ?>
      <?php } // Show if recordset not empty ?>
      <hr>


    </div>
    </div>
  </div>
</div>
<!--c4-->
<?php
  include_once 'partials/footer.php'; ?>
<?php
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