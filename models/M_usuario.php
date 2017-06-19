<?php
include_once 'My_Model.php';

class m_usuarios extends My_Model
{
    protected $_tablename   = 'dlg_usuario';
    protected $_id_table    = 'idusuario';
    protected $_name        = 'nombreyapellido';
    protected $_order       = 'idusuario';
    protected $_data_model  = array(        
    );
    
    function __construct()
    {
        parent::__construct(
                $tablename      = $this->_tablename, 
                $id_table       = $this->_id_table, 
                $name           = $this->_name, 
                $order          = $this->_order, 
                $data_model     = $this->_data_model 
        );
    }
}
?>