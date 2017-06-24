<?php 
class m_locations extends MY_Model 
{		
	protected $_tablename	= 'dlg_locations';
	protected $_id_table	= 'id';
	protected $_order		= 'name';
	protected $_relation    =  array( 
        'idtaller' => array(
            'table'     => 'dlg_taller',
            'subjet'    => 'nombre'
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
} 
?>