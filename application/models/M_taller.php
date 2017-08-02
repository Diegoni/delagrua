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
    
    
    function getTaller($idtaller, $consulta, $limit = NULL)
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
            $sql = $this->getSearch($idtaller['q'], $idtaller['v']);
            
            if($limit != NULL)
            {
                $sql .= " 
                GROUP BY 
                    idtaller 
                ORDER BY 
                    sum(relevance) DESC
                LIMIT $limit[de], $limit[hasta]"; 
            }else
            {
                $sql .= " 
                GROUP BY 
                    idtaller 
                ORDER BY 
                    sum(relevance) DESC";
            }    
            
        }
        
        return $this->getQuery($sql);            
    }
} 
?>