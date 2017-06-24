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
} 
?>