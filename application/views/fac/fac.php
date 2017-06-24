   <div class="cuadro-uno"><!--c1-->
      <div class="cont960">

           <div class="box-preguntas"><!--box1-->
             <img src="<?php echo base_url();?>assets/img/autos/a1.png">
<p><span class="titulo">QUIENES SOMOS</span><br>
  <br>
  De La Gr&uacute;a es una guía gratuita, colectiva  e inteligente de talleres de automóviles y motos. En De La Grúa encontrarás  toda la información relacionada con el mundo motor que te ayudará a seleccionar  e informarte a través de calificaciones de los usuarios acerca del mejor  proveedor para tu auto o moto, ya sea por precio, ubicación geográfica o calidad  del servicio. </p>
</div><!--box1-->

      </div>
      </div><!--c1-->

      <div class="cuadro-preguntas"><!--c2-->
      <div class="cont960">
      <div class="uno"><a class="fa fa-question"></a> PREGUNTAS FRECUENTES</div>
      <?php if ($row_registros > 0) { // Show if recordset not empty ?>
        <?php foreach ($row_registros as $row) { ?>
          <div class="preguntas-frecuentes"><!--pregunta-->
            <p class="titulo"><?php echo $row->pregunta; ?></p>
            <p><?php echo $row->respuesta; ?></p>
          </div><!--pregunta-->
          <?php }?>
        <?php } // Show if recordset not empty ?>
      </div>
      </div><!--c2-->