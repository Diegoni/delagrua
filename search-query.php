<?php
$query_registros = "SELECT *,
sum(relevance)
FROM (

  SELECT
  100 AS relevance,
  t.idtaller,
  t.nombre,
  s.servicio,
  t.locality,
  t.administrative_area_level_1,
  t.route,
  t.street_number,
  m.marca,
  t.tipovehiculo,
  t.atencion,
  t.precio,
  t.activo,
  t.direction
  FROM dlg_taller t
  LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller
  LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio
  LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca
  WHERE t.nombre = '" . $query . "'

  UNION SELECT
  20 AS relevance,
  t.idtaller,
  t.nombre,
  s.servicio,
  t.locality,
  t.administrative_area_level_1,
  t.route,
  t.street_number,
  m.marca,
  t.tipovehiculo,
  t.atencion,
  t.precio,
  t.activo,
  t.direction
  FROM dlg_taller t
  LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller
  LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio
  LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca
  WHERE t.nombre like '%". $query ."%'


  UNION SELECT
  15 AS relevance,
  t.idtaller,
  t.nombre,
  s.servicio,
  t.locality,
  t.administrative_area_level_1,
  t.route,
  t.street_number,
  m.marca,
  t.tipovehiculo,
  t.atencion,
  t.precio,
  t.activo,
  t.direction
  FROM dlg_taller t
  LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller
  LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio
  LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca
  WHERE s.servicio like '%". $query ."%'

  UNION SELECT
  10 AS relevance,
  t.idtaller,
  t.nombre,
  s.servicio,
  t.locality,
  t.administrative_area_level_1,
  t.route,
  t.street_number,
  m.marca,
  t.tipovehiculo,
  t.atencion,
  t.precio,
  t.activo,
  t.direction
  FROM dlg_taller t
  LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller
  LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio
  LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca
  WHERE t.locality like '%". $query ."%'

  UNION SELECT
  7 AS relevance,
  t.idtaller,
  t.nombre,
  s.servicio,
  t.locality,
  t.administrative_area_level_1,
  t.route,
  t.street_number,
  m.marca,
  t.tipovehiculo,
  t.atencion,
  t.precio,
  t.activo,
  t.direction
  FROM dlg_taller t
  LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller
  LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio
  LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca
  WHERE t.direction like '%". $query ."%'

  UNION SELECT
  7 AS relevance,
  t.idtaller,
  t.nombre,
  s.servicio,
  t.locality,
  t.administrative_area_level_1,
  t.route,
  t.street_number,
  m.marca,
  t.tipovehiculo,
  t.atencion,
  t.precio,
  t.activo,
  t.direction
  FROM dlg_taller t
  LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller
  LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio
  LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca
  WHERE t.direction like '%". $query ."%'


  ) results
WHERE tipovehiculo = '" . $tipovehiculo . "'
AND activo = 1
";