<?php 
class m_tallerservicio extends MY_Model 
{		
	protected $_tablename	= 'dlg_tallerservicio';
	protected $_id_table	= 'idtallerservicio';
	protected $_order		= 'idtallerservicio';
	protected $_relation    = array( 
        'idtaller' => array(
            'table'     => 'dlg_taller',
            'subjet'    => 'nombre'
        ),
        'idservicio' => array(
            'table'     => 'dlg_servicio',
            'subjet'    => 'servicio'
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