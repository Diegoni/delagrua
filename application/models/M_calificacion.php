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
	
	
	function getCalificacion($id)
	{
		$sql = "
		SELECT 
			COUNT(atencion) AS atencionvotos, 
			SUM(atencion) AS atencionvalor, 
			COUNT(precio) AS preciovotos, 
			SUM(precio) AS preciovalor, 
			COUNT(servicio) AS serviciovotos, 
			SUM(servicio) AS serviciovalor 
		FROM 
			dlg_calificacion 
		WHERE 
			publicar = '1' AND 
			idtaller = '$id'";
		return $this->getQuery($sql);
	}
	
	
	
	
	function getOpiniones($id)
	{
		$sql = "
		SELECT 
			dlg_calificacion.fechahora, 
			dlg_calificacion.calificacion, 
			dlg_calificacion.atencion, 
			dlg_calificacion.precio, 
			dlg_calificacion.servicio, 
			dlg_usuario.nick 
		FROM 
			dlg_calificacion 
		LEFT JOIN 
			dlg_usuario ON dlg_usuario.idusuario = dlg_calificacion.idusuario 
		WHERE 
			publicar = '1' AND  
			idtaller = '$id' 
		ORDER BY 
			fechahora DESC";
		return $this->getQuery($sql);
	}
	
	
	
	
	function getServiciosUsuario($id_usuario, $id_taller)
	{
		$sql = "
		SELECT 
			idtaller 
		FROM 
			dlg_calificacion 
		WHERE 
			idusuario = '$id_usuario' AND 
			idtaller = '$id_taller' ";
		return $this->getQuery($sql);
	}
} 
?>