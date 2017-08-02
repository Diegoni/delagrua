
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
    <div class="paginacion">
        <ul>
            <li class="ver">VER MAS RESULTADOS:</li>
            <li>
                <a href="<?php //echo // urlHelper($urlData); ?>">
                    ‹‹
                </a>
            </li>
    
            <li>
                <a href="<?php// echo urlHelper($urlData, ['p' => max(0, $pageNum_registros - 1) ]); ?>">
                    ‹
                </a>
            </li>
            <?php 
            $variables_get = '?';
            foreach ($_GET as $key => $value) 
            {
                if($key != 'p')
                {
                    $variables_get .=  $key.'='.$value.'&';    
                }                
            }
            
            $pageNum_registros = 0;
            if (isset($_GET['p'])) 
            {
                $pageNum_registros = $_GET['p'];
            }
            $totalPages_registros = ceil($totalRows_registros/$maxRows_registros)-1;
            for($i=0; $i <= $totalPages_registros; $i++){?>
            <li>
                <a class="<?php echo $i == $pageNum_registros ? 'active' : '' ?>" href="<?php echo base_url().'index.php/search/'.$variables_get.'p='.$i;?>">
                    <?php echo $i+1?>
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="<?php //echo urlHelper($urlData, ['p' => min($totalPages_registros, $pageNum_registros + 1) ]); ?>">
                    ›
                </a>
            </li>
            <li>
                <a href="<?php //echo urlHelper($urlData, ['p' => $totalPages_registros ]); ?>">
                    ››
                </a>
            </li>
        </ul>
    </div>
    </div>

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