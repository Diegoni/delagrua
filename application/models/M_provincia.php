<?php 
class m_provincia extends MY_Model 
{		
	protected $_tablename	= 'dlg_provincia';
	protected $_id_table	= 'idprovincia';
	protected $_order		= 'provincia';
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