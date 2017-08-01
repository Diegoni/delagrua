<?php 
class m_servicio extends MY_Model 
{		
	protected $_tablename	= 'dlg_servicio';
	protected $_id_table	= 'idservicio';
	protected $_order		= 'servicio';
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
    
    function getServicio($name, $tipoauto)
    {
        $query_registros = $this->getSearch($name, $tipoauto);
        //$query_registros .= sprintf(" AND servicio LIKE %s ", GetSQLValueString($_GET['servicio'], "text"));
        $query_registros .= "GROUP BY idtaller ORDER BY sum(relevance) DESC";
        $sql = "SELECT count(*) AS count , servicio  FROM ($query_registros) results GROUP BY servicio ORDER BY count DESC" ;
            
        return $this->getQuery($sql);   
    }
} 
?>