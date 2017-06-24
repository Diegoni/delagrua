<div class="cuadro-uno">
  <!--c1-->
  <div class="cont960">
    <div class="box">
      <!--box1-->
      <img src="<?php
        echo base_url(); ?>assets/img/autos/a1.png">
      <h1>¿MAL DÍA EH?</h1>
      <p>¿Te abollaron la puerta? ¿Se pinchó una rueda? ¿Te agarró la piedra? ¿No arranca el motor?</p>
    </div>
    <!--box1-->
    <div class="box">
      <!--box2-->
      <img src="<?php
        echo base_url(); ?>assets/img/autos/a2.png">
      <h1>NO TE PREOCUPES!</h1>
      <p>Acá podrás encontrar talleres profesionales para todos los problemas que tengas con tu vehículo</p>
    </div>
    <!--box2-->
    <div class="box">
      <!--box3--><img src="<?php
        echo base_url(); ?>assets/img/autos/a3.png" width="68" height="68" alt=""/>
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
        <?php// include_once 'partials/searchForm.php'; ?>
      </div>
    </div>


<div class="cuadro-dos">
  <!--c2-->
  <div class="cont960">
    <div class="box2">
      <?php
        if ($row_registros5) 
        {
        	foreach ($row_registros5 as $row_5) 
        	{
				echo '<a href="'.$row_5->enlace.'target="_blank">';
				echo '<img src="'.base_url().'assets/img/banner/'.$row_5->imagen.' alt=""/>';
				echo '</a>';
			}
		}
        ?>
    </div>
    <div class="vertical"></div>
    <div class="box2">
       <?php
        if ($row_registros6) 
        {
        	foreach ($row_registros6 as $row_6) 
        	{
				echo '<a href="'.$row_6->enlace.'target="_blank">';
				echo '<img src="'.base_url().'assets/img/banner/'.$row_6->imagen.' alt=""/>';
				echo '</a>';
			}
		}
        ?>
    </div>
    <div class="vertical"></div>
    <div class="box2">
      <?php
        if ($row_registros7) 
        {
        	foreach ($row_registros7 as $row_7) 
        	{
				echo '<a href="'.$row_7->enlace.'target="_blank">';
				echo '<img src="'.base_url().'assets/img/banner/'.$row_7->imagen.' alt=""/>';
				echo '</a>';
			}
		}
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
        echo base_url(); ?>assets/img/iconos/estrella.png">
      <h1>YO LO RECOMIENDO!</h1>
      <p>Si calificas el taller que te dio un servicio, ayudas a otros clientes a que elijan lo mejor de lo mejor.</p>
    </div>
    <!--box1-->
    <div class="box">
      <!--box2-->
      <img src="<?php
        echo base_url(); ?>assets/img/iconos/list.png">
      <h1>NO HAY MAS TURNOS!</h1>
      <p>Inscribí tu taller, gana reputación con las calificaciones y que crezca tu negocio, gratis para siempre.</p>
    </div>
    <!--box2-->
    <div class="box">
      <!--box3-->
      <img src="<?php
        echo base_url(); ?>assets/img/iconos/cel.png">
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
        <form ACTION="<?php echo base_url(); ?>contactos.php" METHOD="POST" id="formcontacto" name="formcontacto">
          <div class="rigth">
            <li><input name="nombre" type="text" id="nombre" placeholder="Nombre y Apellido" title="Nombre y Apellido" maxlength="250"></li>
            <li><input name="mail_telefono" type="text" id="mailotelefono" placeholder="Mail o Teléfono" title="Mail o Teléfono" maxlength="250"></li>
            <li><input name="taller" type="text" id="taller" placeholder="Taller" title="Taller" maxlength="250"><br></li>
            <li>
              <span class="login-pop">
                    <button class="boton-b" type="submit" name="MM_send" value="formcontacto">
                    ENVIAR!
                    </button>
              </span>
              <!--
              <div class="boton-b"><a href="#" onClick="MM_validateForm('nombreyapellido','','R','mailotelefono','','R','taller','','R');if( document.MM_returnValue){document.formcontacto.submit();}">ENVIAR!</a></div>
              -->
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
	  
      if (isset($_GET['pageNum_registros10'])) 
      {
        $pageNum_registros10 = $_GET['pageNum_registros10'];
      }
      $startRow_registros10 = $pageNum_registros10 * $maxRows_registros10;
		/*
      mysql_select_db($database_config, $config);
      $query_registros10 = "SELECT * FROM dlg_taller ORDER BY idtaller DESC";
      $query_limit_registros10 = sprintf("%s LIMIT %d, %d", $query_registros10, $startRow_registros10, $maxRows_registros10);
      $registros10 = mysql_query($query_limit_registros10, $config) or die(mysql_error());
      $row_registros10 = mysql_fetch_assoc($registros10);

      if (isset($_GET['totalRows_registros10'])) 
      {
        $totalRows_registros10 = $_GET['totalRows_registros10'];
      }else 
      {
        $all_registros10 = mysql_query($query_registros10);
        $totalRows_registros10 = mysql_num_rows($all_registros10);
      }
      $totalPages_registros10 = ceil($totalRows_registros10/$maxRows_registros10)-1;
	*/
       ?>
      <?php 
      $contador = 0;
      if ($talleres && $talleres_s) 
      { 
	      foreach ($talleres as $row_t) 
	      {
	      	  foreach ($talleres_s as $row_ts) 
	          {
				  if($row_t->idtaller == $row_ts->idtaller)
				  {
				  		$servicios[$row_t->idtaller][] = $row_ts->servicio;
				  }
				  
				  $html_talleres[$row_t->idtaller] = $row_t->nombre;
			  }
			  $contador = $contador + 1;
			  if($contador > 5)
			  {
				break;  	
			  }
	      } 
	  }


	if (isset($html_talleres))
	{ 
		foreach ($html_talleres as $key => $value) 
		{
		?>
		<div class="recientes">
			<h2>
				<a href="<?php echo base_url() . "taller/" . strtolower($value) . "-" . $key . "/"; ?>" >
					<?php echo $value; ?>
					<i class="fa fa-plus-square"></i>
				</a>
			</h2>
			<h3 class="gris">
			<?php 
			foreach ($servicios[$key] as $_key => $_value)
			{
				echo $_value;  
			} 
			?>
			</h3>
        </div>
	<?php 
		} 
	}
	?>
	<hr>


    </div>
    </div>
  </div>
</div>