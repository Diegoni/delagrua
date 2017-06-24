<?php 
class m_usuario extends MY_Model 
{		
	protected $_tablename	= 'dlg_usuario';
	protected $_id_table	= 'idusuario';
	protected $_order		= 'idusuario';
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