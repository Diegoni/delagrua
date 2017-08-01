<?php 
class m_marca extends MY_Model 
{		
	protected $_tablename	= 'dlg_marca';
	protected $_id_table	= 'idmarca';
	protected $_order		= 'marca';
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
    
    
    function getServicio($name)
    {
        $query_registros = getSearch($name, $tipoauto);
        $query_registros .= sprintf(" AND marca LIKE %s ", GetSQLValueString($_GET['marca'], "text"));
        $query_registros .= "GROUP BY idtaller ORDER BY sum(relevance) DESC";
        $marcas = "SELECT count(*) AS count , marca  FROM ($query_registros) results GROUP BY marca ORDER BY count DESC" ;
    } 
} 
?>