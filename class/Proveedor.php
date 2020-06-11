<?php
require_once 'MySQL.php';
require_once 'Persona.php';

class Proveedor extends Persona{
	protected $_idProveedor;
	protected $_cuit;
	protected $_razonSocial;

	public function __construct($razonsocial) {
			$this->_razonSocial = $razonsocial;
		}
    public function guardar(){
    	parent::guardar();
    	$sql = "INSERT INTO proveedor (id_proveedor,cuit, razon_social, id_persona) VALUES (NULL,'$this->_cuit','$this->_razonSocial','$this->_idPersona')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idProveedor= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE proveedor SET cuit = '$this->_cuit', razon_social = '$this->_razonSocial' WHERE id_proveedor = $this->_idProveedor";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}	
?>