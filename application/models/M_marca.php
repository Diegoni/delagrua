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
} 
?>