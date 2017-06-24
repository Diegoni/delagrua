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
} 
?>