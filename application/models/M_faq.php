<?php 
class m_faq extends MY_Model 
{		
	protected $_tablename	= 'dlg_faq';
	protected $_id_table	= 'idfaq';
	protected $_order		= 'orden';
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