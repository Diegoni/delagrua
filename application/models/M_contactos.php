<?php 
class m_contactos extends MY_Model 
{		
	protected $_tablename	= 'dlg_contactos';
	protected $_id_table	= 'idcontacto';
	protected $_order		= 'date_add';
	protected $_relation    =  '';
		
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