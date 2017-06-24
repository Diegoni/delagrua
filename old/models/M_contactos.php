<?php
include_once 'My_Model.php';

class m_contactos extends My_Model
{
    protected $_tablename   = 'dlg_contactos';
    protected $_id_table    = 'id_contacto';
    protected $_name        = 'id_contacto';
    protected $_order       = 'id_contacto';
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