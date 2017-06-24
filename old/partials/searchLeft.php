<?php if ($totalRows_registros): ?>
	<h1>FILTRAR RESULTADOS</h1>
	<a href="#" class="button mobileFilterToggle">
		Filtrar resultados
		<i class="fa fa-chevron-down"></i>
	</a>
	<?php
      // filter queries
	$servicios_results = mysql_query($servicios, $config) or die(mysql_error());
	$servicios_qty = mysql_num_rows($servicios_results);

	$marcas_results = mysql_query($marcas, $config) or die(mysql_error());
	$marcas_qty = mysql_num_rows($marcas_results);

	$localidades_results = mysql_query($localidades, $config) or die(mysql_error());
	$localidades_qty = mysql_num_rows($localidades_results);

	?>

	<div class="filtering">

		<?php if ($urlData['servicio'] || $urlData['localidad'] || $urlData['marca']): ?>

			<div class="activefilters">

				<ul>
					<li class="reset">
						<a href="<?php echo urlHelper($urlData, ['servicio' => null, 'localidad' => null, 'marca' => null]) ?>">Resetear todos los filtros</a>
					</li>

					<?php if ($urlData['servicio']): ?>
						<li class="activeFilter">
							<?php echo $urlData['servicio'] ?>
							<a href="<?php echo urlHelper($urlData, ['servicio' => null]) ?>">
								<i class="fa fa-times"></i>
							</a>
						</li>
					<?php endif ?>

					<?php if ($urlData['localidad']): ?>
						<li class="activeFilter">
							<?php echo $urlData['localidad'] ?>
							<a href="<?php echo urlHelper($urlData, ['localidad' => null]) ?>">
								<i class="fa fa-times"></i>
							</a>
						</li>
					<?php endif ?>

					<?php if ($urlData['marca']): ?>
						<li class="activeFilter">
							<?php echo $urlData['marca'] ?>
							<a href="<?php echo urlHelper($urlData, ['marca' => null]) ?>">
								<i class="fa fa-times"></i>
							</a>
						</li>
					<?php endif ?>

				</ul>
				<hr>

			</div>
		<?php endif ?>

		<div class="filterSelect">
			<?php
			if ($servicios_qty && !$urlData['servicio']): ?>
			<h2>Servicios</h2>
			<div class="filterList servicios">
				<ul>
					<?php while ($servicio = mysql_fetch_array($servicios_results, MYSQL_NUM)) { ?>
					<li>
						<a href="<?php echo urlHelper($urlData, ['servicio' => $servicio[1] ]) ?>"><?php echo $servicio[1] ?></a> (<?php echo $servicio[0] ?>)
					</li>
					<?php } ?>
				</ul>
			</div>
		<?php endif ?>


		<?php
		if ($marcas_qty && !$urlData['marca']): ?>
		<h2>Marcas</h2>
		<div class="filterList marcas">
			<ul>
				<?php while ($marca = mysql_fetch_array($marcas_results, MYSQL_NUM)) { ?>
				<li>
					<a href="<?php echo urlHelper($urlData, ['marca' => $marca[1] ]) ?>"><?php echo $marca[1] ?></a> (<?php echo $marca[0] ?>)
				</li>
				<?php } ?>
			</ul>
		</div>
	<?php endif ?>

	<?php
	if ($localidades_qty && !$urlData['localidad']): ?>
	<h2>Localidades</h2>
	<div class="filterList localidades">
		<ul>
			<?php while ($localidad = mysql_fetch_array($localidades_results, MYSQL_NUM)) { ?>
			<li>
				<a href="<?php echo urlHelper($urlData, ['localidad' => $localidad[1] ]) ?>"><?php echo $localidad[1] ?></a> (<?php echo $localidad[0] ?>)
			</li>
			<?php } ?>
		</ul>
	</div>
<?php endif ?>
</div>

</div>
<?php endif ?>