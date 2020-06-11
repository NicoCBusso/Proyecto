<?php
require_once 'MySQL.php';
class Provincia{
	private $_idProvincia;
	private $_descripcion;
    private $_idPais;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
        $this->_idPais = 1 ;
	}
    public function guardar(){
        $sql = "INSERT INTO provincia (id_provincia,nombre,id_pais) VALUES (NULL,'$this->_descripcion',$this->_idPais)";
    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idProvincia= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {
        $sql = "UPDATE provincia SET nombre = '$this->_descripcion' WHERE id_provincia= $this->_idProvincia";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}
?>