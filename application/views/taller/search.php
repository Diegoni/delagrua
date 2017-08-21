<?php 

if($calificaciones)
{
	foreach ($calificaciones as $_row) 
	{
		$row_calificaciones['atencionvotos'] = $_row->atencionvotos;
		$row_calificaciones['atencionvalor'] = $_row->atencionvalor;
		$row_calificaciones['preciovotos'] = $_row->preciovotos;
		$row_calificaciones['preciovalor'] = $_row->preciovalor;	
		$row_calificaciones['serviciovotos'] = $_row->serviciovotos;
		$row_calificaciones['serviciovalor'] = $_row->serviciovalor;		
	}
}else
{
	$row_calificaciones['atencionvotos'] = 0;
	$row_calificaciones['atencionvalor'] = 0;	
	$row_calificaciones['preciovotos'] = 0;
	$row_calificaciones['preciovalor'] = 0;	
	$row_calificaciones['serviciovotos'] = 0;
	$row_calificaciones['serviciovalor'] = 0;	
}


if($registros)
{
foreach ($registros as $row_registro) 
{
?>
	<!-- Inicio del formulario -->
    <div class="cont960">
        <div class="resultados-busquedas"><!--rb-->
            <div class="uno">
                <a class="fa <?php echo ($row_registro->tipovehiculo == 'auto' ? 'fa-car' : 'fa-motorcycle') ?>">
                    
                </a>
                <?php echo $row_registro->nombre; ?>
                <span class="corre">Recomendalo! <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo urlencode('http://www.delagrua.com/taller_info.php?id=' . $row_registro->idtaller); ?>&p[title]=<?php echo $row_registro->nombre; ?>&p[summary]=De la grúa | Guía colectiva de talleres para autos y motos&p[images][0]=http://www.delagrua.com/img/logos/dlg_fc.png" target="_blank" class="fa fa-facebook-square"></a> <a href="https://plus.google.com/share?url=www.delagrua.com/taller_info.php?id=<?php echo $row_registro->idtaller; ?>" class="fa fa-google-plus-square" onclick="javascript:window.open(this.href,
                    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a> <a href="http://twitter.com/home?status=<?php echo urlencode($row_registro->nombre . " http://www.delagrua.com/taller_info.php?id=" . $row_registro->idtaller . " en DE LA GRUA | Guía colectiva de talleres para autos y motos");?>"target="_blank" class="fa fa-twitter-square"></a>
                </span>
            </div>
            
            <div class="izquierda-grande">
                <div class="box">
                    <div class="izq">
                        <div class="box-iconos">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <p>Código de área:
                                <span class="gris">
                                    <?php echo $row_registro->telefonocodarea; ?>
                                </span>&nbsp;Teléfono:
                                <span class="gris"> 
                                    <?php echo $row_registro->telefono; ?>
                                </span><br>
                                <?php if ($row_registro->web != ''): ?>
                                    Web: <span class="gris">
                                    	<a href="http://<?php echo $row_registro->web; ?>" target="_blank" class="link-naranja">
                                    		<?php echo $row_registro->web; ?>
                                    	</a>
                                    </span>
                                <?php endif ?>
                            </p>
                        </div>



          <div class="box-iconos chico"><i class="fa fa-fw fa-wrench"></i>
            <p>
            <?php if ($servicios) 
            { 
            	foreach ($servicios as $_servicio) 
            	{
					echo '<a class="b1">';
           			echo $_servicio->servicio;
           			echo '</a>';
           		}
			} 
			?>
            </p>
            </div>

            <div class="box-iconos chico">
              <i class="fa fa-fw  fa-dot-circle-o"></i>
              <p>
                <span class="gris">
                  
                </span>
              </p>
            </div>

		<div class="box-iconos corridoX"><i class="fa fa-fw  fa-star-half-empty"></i>
             <p>
              	<span class="atpreser">Atención:</span>&nbsp;
                <?php
                if($row_calificaciones['atencionvotos'] > 0)
                {
                 	$estrellas = round($row_calificaciones['atencionvalor']/$row_calificaciones['atencionvotos']);
               	} else {
                 	$estrellas = 0;
               	}
               
			   	echo getEstrellas($estrellas);
              	?>
     			<span class="gris">  
     				<?php echo $row_calificaciones['atencionvotos']; ?> VOTOS
     			</span>
     		</p>
     		
     		
            <p>
            	<span class="atpreser">Precio:</span>&nbsp;
                <?php
                if($row_calificaciones['preciovotos'] > 0)
                {
                	$estrellas = round($row_calificaciones['preciovalor']/$row_calificaciones['preciovotos']);
               	} else {
                	$estrellas = 0;
               	}
               	echo getEstrellas($estrellas);
              	?>
              	<span class="gris">  
              		<?php echo $row_calificaciones['preciovotos']; ?>VOTOS
              	</span>
            </p>
            
             
            <p>
            	<span class="atpreser">Servicio:</span>&nbsp;
                <?php
                if($row_calificaciones['serviciovotos'] > 0)
                {
                 	$estrellas = round($row_calificaciones['serviciovalor']/$row_calificaciones['serviciovotos']);
               	} else {
                 	$estrellas = 0;
               	}
               	echo getEstrellas($estrellas);
              	?>
              	<span class="gris">  
              		<?php echo $row_calificaciones['serviciovotos']; ?>VOTOS
              	</span>
           </p>
		</div>
	</div><!--izq-->
	
	
	
	
	
	
	
	
	
	
	
          <div class="der"><!--der-->
            <div id="map-canvas" style="height: 320px"></div>
          </div><!--der-->
          <div id="fotos-taller">
            <!-- Nivo Slider  -->
            <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <?php if($row_registro->foto1 != ''){ ?>
                <a href="#"><img src="<?php echo base_url();?>assets/img/talleres/<?php echo $row_registro->foto1; ?>" data-thumb="assets/img/talleres/<?php echo $row_registro->foto1; ?>" alt="" title=""/></a>
                <?php } ?>
                <?php if($row_registro->foto2 != ''){ ?>
                <a href="#"><img src="<?php echo base_url();?>assets/img/talleres/<?php echo $row_registro->foto2; ?>" data-thumb="assets/img/talleres/<?php echo $row_registro->foto2; ?>" alt="" title=""/></a>
                <?php } ?>
                <?php if($row_registro->foto3 != ''){ ?>
                <a href="#"><img src="<?php echo base_url();?>assets/img/talleres/<?php echo $row_registro->foto3; ?>" data-thumb="assets/img/talleres/<?php echo $row_registro->foto3; ?>" alt="" title=""/></a>
                <?php } ?>
              </div>
            </div>
            <!-- fin Nivo Slider  -->
          </div>
          
          
          
          <div class="clasificar"><!--clasificar-->
            <a name="califica_taller"></a><h1>CALIFICA ESTE TALLER</h1>
            <?php if($calificaciones_usuario) 
            { 
            	echo '<div class="left">Ya calificaste este taller.</div>';
            } else { ?>
            <form action="<?php echo base_url(); ?>index.php/taller/califica_taller/" method="POST" name="formcalificar" id="formcalificar">
             <div class="left">
               <?php 
               if($mensaje != '') {
               	echo '<p>'.$mensaje.'</p><p>&nbsp;</p>';
               } else { ?>
				<p>
					<span class="atpreser-calif">Que te pareció la Atención?:
                 		<input type="hidden" name="atencion" id="atencion">
               		</span> 
               		<img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris1" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='1';activar('ateestrellagris1');desactivar('ateestrellagris2');desactivar('ateestrellagris3');desactivar('ateestrellagris4');desactivar('ateestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris2" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='2';activar('ateestrellagris1');activar('ateestrellagris2');desactivar('ateestrellagris3');desactivar('ateestrellagris4');desactivar('ateestrellagris5');"  <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris3" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='3';activar('ateestrellagris1');activar('ateestrellagris2');activar('ateestrellagris3');desactivar('ateestrellagris4');desactivar('ateestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris4" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='4';activar('ateestrellagris1');activar('ateestrellagris2');activar('ateestrellagris3');activar('ateestrellagris4');desactivar('ateestrellagris5');" <?php } ?>  onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="ateestrellagris5"  <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.atencion.value='5';activar('ateestrellagris1');activar('ateestrellagris2');activar('ateestrellagris3');activar('ateestrellagris4');activar('ateestrellagris5');" <?php } ?>  onmouseover="JavaScript:this.style.cursor='pointer'"/></p>
               	<p><span class="atpreser-calif">Y el Precio?:
                 <input type="hidden" name="precio" id="precio">
               </span> <img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris1" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?>onClick="document.formcalificar.precio.value='1';activar('preestrellagris1');desactivar('preestrellagris2');desactivar('preestrellagris3');desactivar('preestrellagris4');desactivar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris2" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.precio.value='2';activar('preestrellagris1');activar('preestrellagris2');desactivar('preestrellagris3');desactivar('preestrellagris4');desactivar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris3" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.precio.value='3';activar('preestrellagris1');activar('preestrellagris2');activar('preestrellagris3');desactivar('preestrellagris4');desactivar('preestrellagris5');"  <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris4" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?>  onClick="document.formcalificar.precio.value='4';activar('preestrellagris1');activar('preestrellagris2');activar('preestrellagris3');activar('preestrellagris4');desactivar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="preestrellagris5" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?>  onClick="document.formcalificar.precio.value='5';activar('preestrellagris1');activar('preestrellagris2');activar('preestrellagris3');activar('preestrellagris4');activar('preestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/></p>
               <p><span class="atpreser-calif">Y la calidad del Servicio técnico?:
                 <input type="hidden" name="servicio" id="servicio">
               </span> <img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris1" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='1';activar('serestrellagris1');desactivar('serestrellagris2');desactivar('serestrellagris3');desactivar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris2" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='2';activar('serestrellagris1');activar('serestrellagris2');desactivar('serestrellagris3');desactivar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris3" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='3';activar('serestrellagris1');activar('serestrellagris2');activar('serestrellagris3');desactivar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris4" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='4';activar('serestrellagris1');activar('serestrellagris2');activar('serestrellagris3');activar('serestrellagris4');desactivar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/><img src="<?php echo base_url();?>assets/img/iconos/estrellita-gris.png" alt="" width="12" height="12" id="serestrellagris5" <?php if (!isset($_SESSION['MM_Username'])) { ?> onClick="alert('Tienes que iniciar sesión para poder calificar');" <?php } else { ?> onClick="document.formcalificar.servicio.value='5';activar('serestrellagris1');activar('serestrellagris2');activar('serestrellagris3');activar('serestrellagris4');activar('serestrellagris5');" <?php } ?> onmouseover="JavaScript:this.style.cursor='pointer'"/></p>
             </div>
            
            
            

             <div class="rigth">
               <textarea name="calificacion" rows="3" maxlength="250" id="calificacion" style="width:100%" placeholder="Escribí tu calificación"></textarea>
               <div class="boton-b"> <?php if (!isset($_SESSION['MM_Username'])) { ?><a class="fancybox fancybox.iframe" href="/login.php"><?php } else { ?><a href="#" onClick="MM_validateForm('atencion','','R','precio','','R','servicio','','R','calificacion','','R');if( document.MM_returnValue){if(document.formcalificar.calificacion.value.length < 30) {alert('Debe ingresar al menos 30 caracteres');document.formcalificar.calificacion.focus;return false;} else {document.formcalificar.submit();}}"><?php } ?>ENVIAR!</a></div></li>

               <span class="atpreser-calif">
                 <input name="idusuario" type="hidden" id="idusuario" value="<?php echo $id_usuario; ?>">
                 <input name="idtaller" type="hidden" id="idtaller" value="<?php echo $row_registro->idtaller; ?>">
                 <input name="fechahora" type="hidden" id="fechahora" value="<?php echo date('Y-m-d h:i'); ?>">
               </span></div>
               <input type="hidden" name="MM_insert" value="formcalificar">
             </form>
             <?php } ?>
             <?php } ?>
           </div><!--clasificar-->
           
           
           
           
           
           
           
           
           
           
           <div class="opiniones"><!--opiniones-->
             <h1>OPINIONES DE CLIENTES</h1>
             <?php if ($opiniones) {
             	 // Show if recordset not empty ?>
             <?php foreach ($opiniones as $_opinion) {?>
             <div class="leftXX"><!--left-->
              <div class="opinion">
                <!--op-->
                <img src="<?php echo base_url();?>assets/img/iconos/per.png" width="38" height="38">
                <p> 
                	<span class="persona">
                		<?php echo $_opinion->nick; ?>
                	ç</span><span class="gris"> | <?php echo formatDate($_opinion->fechahora); ?></span>
                  <hr>
                  <?php
                  	if(($_opinion->atencion + $_opinion->precio + $_opinion->servicio) > 0)
                  	{
                   		$estrellas = round(($_opinion->atencion + $_opinion->precio + $_opinion->servicio)/3);
                 	} else {
                   		$estrellas = 0;
                 	}
                  echo getEstrellas($estrellas);
                ?>

                <hr>
              </p>
              <p><?php echo $_opinion->calificacion; ?></p>

            </div>

            <!--op-->
          </div><!--left-->

          <!-- <div style="clear:both;"></div> -->
          <div class="clear"></div>

          <?php } ?>
          <?php } // Show if recordset not empty ?>

        </div><!--opiniones-->
     </div><!--box-->

     <div class="volver-resultados">
       <div class="boton-volver"><a href="<?php echo base_url()?>index.php">VOLVER A LA BUSQUEDA <i class="fa fa-search"></i></a></div>
     </div>

   </div><!--izq-grande-->

   <div class="derecha"><!--derecha-->
    <div class="box2">
      <?php if ($banner_arriba) 
      { 
		foreach ($banner_arriba as $banner) 
		{
			echo '<a href="http:'.$banner->enlace.'">
				<img src="'.base_url().'assets/img/banner/'.$banner->imagen.'" width="280" height="210" alt=""/>
				</a>';
		}
      } // Show if recordset not empty ?>
    </div>
    <div class="box2">
      <?php if ($banner_medio) 
      { 
		foreach ($banner_medio as $banner) 
		{
			echo '<a href="http:'.$banner->enlace.'">
				<img src="'.base_url().'assets/img/banner/'.$banner->imagen.'" width="280" height="210" alt=""/>
				</a>';
		}
      } // Show if recordset not empty ?>
    </div>
    <div class="box2">
      <?php if ($banner_abajo) 
      { 
		foreach ($banner_abajo as $banner) 
		{
			echo '<a href="http:'.$banner->enlace.'">
				<img src="'.base_url().'assets/img/banner/'.$banner->imagen.'" width="280" height="210" alt=""/>
				</a>';
		}
      } // Show if recordset not empty ?>
    </div>
  </div><!--derecha-->

</div><!--rb-->





<script>

  // Get coordinates from db
  var lat = <?php echo $row_registro->lat ?>;
  var lng = <?php echo $row_registro->lng ?>;

  function initialize() {
    var mapOptions = {
      zoom: 15,
      center: new google.maps.LatLng(lat , lng)
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

    var image = '/img/mapicon.png';
    var myLatLng = new google.maps.LatLng(lat , lng);
    var beachMarker = new google.maps.Marker({
      // animation: google.maps.Animation.DROP,
      position: myLatLng,
      map: map,
      icon: image
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>

<?php
}
}
?>
