<form method="get" action="<?php echo $_config['url']?>search.php" id="formbuscar" name="formbuscar" >

	<input type="radio" name="v" value="auto" id="vAuto" checked><label for="vAuto"> Auto</label>
	<input type="radio" name="v" value="moto" id="vMoto" <?php echo isset($_GET['v']) && $_GET['v'] == 'moto' ? 'checked' : '' ?> ><label for="vMoto"> Moto</label>
	<br>

	<input id="search" name="q" type="text" placeholder="Buscá por nombre, tipo de taller o localidad" value="<?php echo isset($query) && $query ? $query : '' ?>">

	<button class="button secondary large" >Buscar</button>

</form>
