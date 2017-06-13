<?php
function formato_fecha($fecha) {
	$fecha = new DateTime($fecha);
	$fecha =  $fecha->format('d/m/Y');
	return($fecha);
}
function formato_fecha_mysql($fecha) {
	$fecha = str_replace("/","-",$fecha);
	$fecha = new DateTime($fecha);
	$fecha =  $fecha->format('Y-m-d');
	return($fecha);
}



/**
 * Get Url
 * Add or delete parameters to current url
 * @return link
 * @juan
 **/
function urlHelper($urlData, $newData = array()) {
  $currentUri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  return strtok($currentUri, '&') . '&' . http_build_query( array_merge($urlData,$newData));
}

/**
 * Get Address
 *
 * @return formatted Adress
 * @juan
 **/
function getAddress($taller)
{
  return $taller['route'] . ' ' . $taller['street_number'] . ', ' . $taller['locality'] . ', ' . $taller['administrative_area_level_1'];
}
?>