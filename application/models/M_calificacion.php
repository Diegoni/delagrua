<?php 
class m_calificacion extends MY_Model 
{		
	protected $_tablename	= 'dlg_calificacion';
	protected $_id_table	= 'idcalificacion';
	protected $_order		= 'fechahora';
	protected $_relation    = array( 
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