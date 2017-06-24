<?php 
class m_banner extends MY_Model 
{		
	protected $_tablename	= 'dlg_banner';
	protected $_id_table	= 'idbanner';
	protected $_order		= 'idbanner';
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