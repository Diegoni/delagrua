
<div class="cont960">
  <div class="resultados-busquedas">
    <!--rb-->
    <div class="uno">
    	<a class="fa fa-search"></a> 
    	<?php echo $totalRows_registros ?> RESULTADOS PARA <?php echo strtoupper($query) ?>
    </div>

	<?php echo $searchForm; ?>
    <div class="izquierda mobile">
      <?php echo $searchLeft; ?>
    </div>
    <div class="izquierda screen">
     <?php echo $searchLeft; ?>
    </div>

    <?php echo $searchCenter; ?>


    <div class="derecha">
      <!--derecha-->
      <div class="box2">
        <?php 
        if ($banners) 
        {
			foreach ($banners as $banner) 
			{
				echo '<a href="http://'.$banner->enlace.'"><img src="'.base_url().'/img/banner/'.$banner->imagen.'" width="280" height="210" alt=""/></a>';
			}
		} // Show if recordset not empty 
		?>
      </div>
      <div class="box2">
        <?php 
        if ($banners2) 
        {
			foreach ($banners2 as $banner) 
			{
				echo '<a href="http://'.$banner->enlace.'"><img src="'.base_url().'/img/banner/'.$banner->imagen.'" width="280" height="210" alt=""/></a>';
			}
		} // Show if recordset not empty 
		?>
      </div>
      <div class="box2">
       <?php 
        if ($banners3) 
        {
			foreach ($banners3 as $banner) 
			{
				echo '<a href="http://'.$banner->enlace.'"><img src="'.base_url().'/img/banner/'.$banner->imagen.'" width="280" height="210" alt=""/></a>';
			}
		} // Show if recordset not empty 
		?>
      </div>


      <hr>

    </div>
    <!--derecha-->
  </div>
  <!--rb-->