<?php 
class m_localidad extends MY_Model 
{		
	protected $_tablename	= 'dlg_localidad';
	protected $_id_table	= 'idlocalidad';
	protected $_order		= 'localidad';
	protected $_relation    =  array( 
        'idprovincia' => array(
            'table'     => 'dlg_provincia',
            'subjet'    => 'provincia'
        ),
    );
		
	function __construct()
	{
		parent::__construct(
			$tablename		= $this->_tablename, 
			$id_table		= $this->_id_table, 
			$order			= $this->_order,
			$relation		= $this->_relation
		);
	}
    
    function getLocalidad($name)
    {
        $query_registros = getSearch($name, $tipoauto);
        $query_registros .= sprintf(" AND locality LIKE %s ", GetSQLValueString($_GET['localidad'], "text"));
        $query_registros .= "GROUP BY idtaller ORDER BY sum(relevance) DESC";
        $localidades = "SELECT count(*) AS count , locality, administrative_area_level_1  FROM ($query_registros) results GROUP BY locality, administrative_area_level_1 ORDER BY count DESC" ;
    } 
} 
?>