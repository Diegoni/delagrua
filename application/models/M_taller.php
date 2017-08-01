<?php 
class m_taller extends MY_Model 
{		
	protected $_tablename	= 'dlg_taller';
	protected $_id_table	= 'idtaller';
	protected $_order		= 'nombre';
	protected $_relation    = '';
		
	function __construct()
	{
		parent::__construct(
			$tablename		= $this->_tablename, 
			$id_table		= $this->_id_table, 
			$order			= $this->_order,
			$relation		= $this->_relation
		);
	}
    
    
    function getTaller($idtaller, $consulta)
    {
        if($consulta == 'servicios')
        {
            $sql = "
            SELECT 
                dlg_servicio.servicio 
            FROM 
                dlg_tallerservicio 
            LEFT JOIN 
                dlg_servicio ON dlg_tallerservicio.idservicio = dlg_servicio.idservicio 
            WHERE 
                dlg_tallerservicio.idtaller = '$idtaller' 
            ORDER BY 
                dlg_servicio.servicio ASC";
        }else if($consulta == 'cantidades')
        {
            $sql = "   
            SELECT 
                COUNT(atencion) AS atencionvotos, 
                SUM(atencion) AS atencionvalor, 
                COUNT(precio) AS preciovotos, 
                SUM(precio) AS preciovalor, 
                COUNT(servicio) AS serviciovotos, 
                SUM(servicio) AS serviciovalor 
            FROM 
                dlg_calificacion 
            WHERE 
                publicar = '1' AND idtaller = '$idtaller'";            
        }else if('all')
        {
            $sql = "SELECT *, sum(relevance) FROM ( SELECT 100 AS relevance, t.idtaller, t.nombre, s.servicio, t.locality, t.administrative_area_level_1, t.route, t.street_number, m.marca, t.tipovehiculo, t.atencion, t.precio, t.activo, t.direction FROM dlg_taller t LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca WHERE t.nombre = '' UNION SELECT 20 AS relevance, t.idtaller, t.nombre, s.servicio, t.locality, t.administrative_area_level_1, t.route, t.street_number, m.marca, t.tipovehiculo, t.atencion, t.precio, t.activo, t.direction FROM dlg_taller t LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca WHERE t.nombre like '%%' UNION SELECT 15 AS relevance, t.idtaller, t.nombre, s.servicio, t.locality, t.administrative_area_level_1, t.route, t.street_number, m.marca, t.tipovehiculo, t.atencion, t.precio, t.activo, t.direction FROM dlg_taller t LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca WHERE s.servicio like '%%' UNION SELECT 10 AS relevance, t.idtaller, t.nombre, s.servicio, t.locality, t.administrative_area_level_1, t.route, t.street_number, m.marca, t.tipovehiculo, t.atencion, t.precio, t.activo, t.direction FROM dlg_taller t LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca WHERE t.locality like '%%' UNION SELECT 7 AS relevance, t.idtaller, t.nombre, s.servicio, t.locality, t.administrative_area_level_1, t.route, t.street_number, m.marca, t.tipovehiculo, t.atencion, t.precio, t.activo, t.direction FROM dlg_taller t LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca WHERE t.direction like '%%' UNION SELECT 7 AS relevance, t.idtaller, t.nombre, s.servicio, t.locality, t.administrative_area_level_1, t.route, t.street_number, m.marca, t.tipovehiculo, t.atencion, t.precio, t.activo, t.direction FROM dlg_taller t LEFT JOIN dlg_tallerservicio ts ON t.idtaller = ts.idtaller LEFT JOIN dlg_servicio s ON s.idservicio = ts.idservicio LEFT JOIN dlg_marca m ON t.idmarca = m.idmarca WHERE t.direction like '%%' ) results WHERE tipovehiculo = 'auto' AND activo = 1 GROUP BY idtaller ORDER BY sum(relevance) DESC";
        }
        
        return $this->getQuery($sql);            
    }
} 
?>