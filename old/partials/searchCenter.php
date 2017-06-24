
<div class="results-<?php echo $totalRows_registros ?> centro">
	<!--cento-->
	<?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
	<?php do { ?>
	<?php
	$colname_registros11 = $row_registros['idtaller'];
	mysql_select_db($database_config, $config);
	$query_registros11 = sprintf("SELECT dlg_servicio.servicio FROM dlg_tallerservicio LEFT JOIN dlg_servicio ON dlg_tallerservicio.idservicio = dlg_servicio.idservicio WHERE dlg_tallerservicio.idtaller = %s ORDER BY dlg_servicio.servicio ASC", GetSQLValueString($colname_registros11, "int"));
	$registros11 = mysql_query($query_registros11, $config) or die(mysql_error());
	$row_registros11 = mysql_fetch_assoc($registros11);
	$totalRows_registros11 = mysql_num_rows($registros11);

	$colname_registro2 = $row_registros['idtaller'];
	mysql_select_db($database_config, $config);
	$query_registro2 = sprintf("SELECT COUNT(atencion) AS atencionvotos, SUM(atencion) AS atencionvalor, COUNT(precio) AS preciovotos, SUM(precio) AS preciovalor, COUNT(servicio) AS serviciovotos, SUM(servicio) AS serviciovalor FROM dlg_calificacion WHERE publicar = '1' AND idtaller = %s", GetSQLValueString($colname_registro2, "int"));
	$registro2 = mysql_query($query_registro2, $config) or die(mysql_error());
	$row_registro2 = mysql_fetch_assoc($registro2);
	$totalRows_registro2 = mysql_num_rows($registro2);
	?>
	<div class="box-centro">
		<!--box resultado-->
		<h2>

			<a href="<?php echo $url_relativa . "taller/" . url2seo($row_registros['nombre']) . "-" . $row_registros['idtaller'] .  "/"; ?>">
                <?php echo $row_registros['nombre']; ?>
				<i class="fa fa-plus-square"></i>
			</a>
		</h2>
        <p>
            <i class="fa fa-map-marker"></i>
            <span class="gris">
                <?php echo getAddress($row_registros); ?>
            </span>
        </p>

		<h3>&nbsp;</h3>
		<div class="box-iconos2"><i class="fa fa-wrench"></i>
			<?php if ($totalRows_registros11 > 0) {
        // Show if recordset not empty ?>
        <?php do { ?>
        <a class="b1">
        	<?php echo $row_registros11['servicio']; ?>
        </a>
        <?php }
        while ($row_registros11 = mysql_fetch_assoc($registros11)); ?>
        <?php mysql_free_result($registros11);?><?php } // Show if recordset not empty ?>
    </div>


    <div class="box-iconos">
    	<i class="fa fa-star-half-empty"></i>
    	<p>ATENCION&nbsp;
    		<?php
    		if($row_registro2['atencionvotos'] > 0){
    			$estrellas = round($row_registro2['atencionvalor']/$row_registro2['atencionvotos']);
    		} else {
    			$estrellas = 0;
    		}
    		switch ($estrellas) {
    			case 0:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 1:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"i" .  $url_relativa . "mg/iconos/estrellita-gris.png\"/>";
    			break;
    			case 2:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 3:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 4:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 5:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
    			break;
    		}
    		?>
    		<span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['atencionvotos']; ?> VOTOS</span>
    	</p>
    </div>
    <div class="box-iconos">
    	<i class="fa fa-star-half-empty"></i>
    	<p>PRECIO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
    		if($row_registro2['preciovotos'] > 0){
    			$estrellas = round($row_registro2['preciovalor']/$row_registro2['preciovotos']);
    		} else {
    			$estrellas = 0;
    		}
    		switch ($estrellas) {
    			case 0:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 1:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 2:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 3:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 4:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 5:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/>";
    			break;
    		}
    		?>
    		<span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['preciovotos']; ?> VOTOS</span>
    	</p>
    </div>
    <div class="box-iconos">
    	<i class="fa fa-star-half-empty"></i>
    	<p>SERVICIO&nbsp;&nbsp;&nbsp;&nbsp;<?php
    		if($row_registro2['serviciovotos'] > 0){
    			$estrellas = round($row_registro2['serviciovalor']/$row_registro2['serviciovotos']);
    		} else {
    			$estrellas = 0;
    		}
    		switch ($estrellas) {
    			case 0:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 1:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 2:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 3:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 4:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"/><img src=\"" .  $url_relativa . "img/iconos/estrellita-gris.png\"/>";
    			break;
    			case 5:
    			echo "<img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\"><img src=\"" .  $url_relativa . "img/iconos/estrellita-amarilla.png\">";
    			break;
    		}
    		?>
    		<span class="gris">&nbsp;&nbsp;<?php echo $row_registro2['serviciovotos']; ?> VOTOS</span>
    	</p>
    </div>
</div>
<!--box resultado-->
<?php } while ($row_registros = mysql_fetch_assoc($registros)); ?>
<?php } // Show if recordset not empty ?>
<?php if ($totalRows_registros > 0) { // Show if recordset not empty ?>
<?php
if(!isset($_GET['ordenarpor'])) {
	$ordenarpor = 'nombre';
} else {
	$ordenarpor = $_GET['ordenarpor'];
}
if(!isset($_GET['orden'])) {
	$orden = 'ASC';
} else {
	$orden = $_GET['orden'];
}
?>






<?php include_once 'partials/searchPagination.php'; ?>







<?php } else { ?>

<h2>No hay resultados para «<?php echo $query ?>»</h2>

<?php } ?>

</div>